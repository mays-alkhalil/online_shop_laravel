<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // تطبيق البحث بناءً على اسم المنتج أو الفئة
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhereHas('category', function ($q) use ($request) {
                      $q->where('name', 'like', '%' . $request->search . '%');
                  });
        }

        // جلب المنتجات مع الباجيناشن
        $products = $query->with('category')->paginate(10);

        return view('admin.products.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        $stores = Store::all(); // استرجاع جميع المتاجر من قاعدة البيانات

        return view('admin.products.create', compact('stores','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'color' => 'nullable|string',  // إضافة التحقق من حقل اللون
            'size' => 'nullable|string',   // إضافة التحقق من حقل الحجم
            'store_id' => 'nullable|numeric', // إضافة التحقق من حقل Store ID
        ]);

        $imagePath = $request->file('image') 
            ? $request->file('image')->store('products', 'public') 
            : null;

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'category_id' => $request->category_id,
            'color' => $request->color,  // حفظ اللون
            'size' => $request->size,    // حفظ الحجم
            'store_id' => $request->store_id ?? 1 // حفظ Store ID
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // لتحميل جميع الكاتيجوريز
        $stores = Store::all(); // لتحميل جميع المتاجر

        return view('admin.products.edit', compact('product', 'categories', 'stores'));
    }
    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id' => 'required|exists:categories,id',
        'color' => 'nullable|string',  // إضافة التحقق من حقل اللون
        'size' => 'nullable|string',   // إضافة التحقق من حقل الحجم
        'store_id' => 'nullable|numeric', // إضافة التحقق من حقل Store ID
    ]);
    // التعامل مع الصورة: إذا تم رفع صورة جديدة
    $imagePath = $request->hasFile('image') 
        ? $request->file('image')->store('products', 'public') 
        : $product->image; // إذا لم يتم رفع صورة جديدة، احتفظ بالصورة القديمة

    // تحديث المنتج
    $product->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'image' => $imagePath,
        'category_id' => $request->category_id,
'color' => $request->color,  // تحديث اللون
            'size' => $request->size,    // تحديث الحجم
            'store_id' => $request->store_id, // تحديث Store ID
        ]);

    return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
}
public function destroy($id)
{
    
    $product = Product::findOrFail($id);

    // حذف الصورة إذا كانت موجودة
    if ($product->image) {
        Storage::disk('public')->delete($product->image);
    }

    // حذف المنتج من قاعدة البيانات
    $product->delete();

    return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
}

public function indexProduct()
{
    // جلب جميع المنتجات مع التقييمات
    $products = Product::with('reviews')->get();
    
    // حساب التقييم المتوسط لكل منتج
    foreach ($products as $product) {
        $product->averageRating = round($product->reviews->avg('rating') ?? 0, 1);
    }

    $LastProducts = Product::orderBy('created_at', 'desc')->limit(5)->get();
    
    // تمرير البيانات إلى صفحة index
    return view('front.index', compact('products', 'LastProducts'));
}

public function shop()
{
    // جلب جميع المنتجات مع التقييمات (التي ستكون خاصة بصفحة الشوب)
    $products = Product::with('reviews')->get();
    
    // حساب التقييم المتوسط لكل منتج
    foreach ($products as $product) {
        $product->averageRating = round($product->reviews->avg('rating') ?? 0, 1);
    }
    
    // تمرير البيانات إلى صفحة shop
    return view('front.shop', compact('products'));
}
// ProductController.php

public function show($id)
{
  // جلب المنتج حسب الـ ID
  $product = Product::findOrFail($id);

  // جلب الأحجام والألوان المتوفرة عبر جميع المنتجات باستخدام distinct
  $sizes = Product::distinct()->pluck('size');
  $colors = Product::distinct()->pluck('color');

  // جلب المنتجات المتعلقة بالمنتج الحالي استنادًا إلى نفس الـ category_id
  $relatedProducts = Product::where('category_id', $product->category_id)
      ->where('id', '!=', $id)  // استبعاد المنتج نفسه
      ->take(5) // عدد المنتجات المعروضة
      ->get();

  // تمرير المنتج مع الأحجام والألوان الفريدة إلى الـ View
  return view('front.details', [
      'product' => $product,
      'sizes' => $sizes,
      'colors' => $colors,
      'relatedProducts' => $relatedProducts, // تمرير المنتجات المتعلقة هنا
  ]);
}


    public function showProduct($id)
{
    $product = Product::with(['images', 'reviews'])->findOrFail($id); // التأكد من جلب العلاقات
    return view('front.product.show', compact('product'));
}


public function indexFront(Request $request)
{
    $query = $request->input('query'); // الكلمة التي يتم إدخالها في شريط البحث

    // إذا كان هناك كلمة بحث، قم بالبحث في جدول المنتجات
    if ($query) {
        $products = Product::where('name', 'like', "%{$query}%")
                           ->orWhere('description', 'like', "%{$query}%")
                           ->get();
    } else {
        // إذا لم تكن هناك كلمة بحث، عرض كل المنتجات
        $products = Product::all();
    }

    return view('front.shop', compact('products', 'query'));
}
    }

