<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        return view('front.shop'); // أو أي اسم ملف View مرتبط.
    }
    public function shareData()
    {
        // جلب أسماء المحلات
        $stores = Store::select('name')->get();

        // جلب أسماء الكاتيجوريز
        $categories = Category::select('name')->get();

        // أعلى خصم
        $highestDiscount = Coupon::where('expires_at', '>=', now())->max('discount');

        // ثاني أعلى خصم
        $secondHighestDiscount = Coupon::where('expires_at', '>=', now())
            ->orderBy('discount', 'desc')
            ->skip(1)
            ->value('discount');

        // جلب المنتجات مع المراجعات
        $products = Product::with('reviews')->get();

        // جلب الألوان المميزة
        $colors = Product::whereNotNull('color')->distinct()->pluck('color');
        
        // جلب الأحجام المميزة
        $sizes = Product::whereNotNull('size')->distinct()->pluck('size');

        // عرض صفحة front.index مع تمرير البيانات المطلوبة
        return view('front.index', compact('stores', 'categories', 'highestDiscount', 'secondHighestDiscount', 'products', 'colors', 'sizes'));
    }



    public function show(Request $request)
    {
        // جلب المنتجات مع المراجعات
        $products = Product::with('reviews');

        // تصفية المنتجات بناءً على المحلات
        if ($request->has('stores')) {
            $products->whereIn('store_id', $request->input('stores'));
        }

        // تصفية المنتجات بناءً على الفئات
        if ($request->has('categories')) {
            $products->whereIn('category_id', $request->input('categories'));
        }

        // تصفية المنتجات بناءً على الألوان
        if ($request->has('colors')) {
            $products->whereIn('color', $request->input('colors'));
        }

        // تصفية المنتجات بناءً على الأحجام
        if ($request->has('sizes')) {
            $products->whereIn('size', $request->input('sizes'));
        }

        // جلب الألوان المميزة
        $colors = Product::whereNotNull('color')->distinct()->pluck('color');

        // جلب الأحجام المميزة
        $sizes = Product::whereNotNull('size')->distinct()->pluck('size');

        // إرجاع البيانات إلى العرض
        return view('front.shop', compact('products', 'colors', 'sizes'));
    }

    // في ShopController.php
public function filterProducts(Request $request)
{$stores = $request->input('stores', []);
    $categories = $request->input('categories', []);
    $colors = $request->input('colors', []);
    $sizes = $request->input('sizes', []);

    // إحضار المنتجات بناءً على الفلاتر
    $query = Product::query();

    if (!empty($stores)) {
        $query->whereIn('store_id', $stores);
    }

    if (!empty($categories)) {
        $query->whereIn('category_id', $categories);
    }

    if (!empty($colors)) {
        $query->whereIn('color', $colors);
    }

    if (!empty($sizes)) {
        $query->whereIn('size', $sizes);
    }

    // جلب المنتجات
    $products = $query->get();

    // إذا كان الطلب AJAX، إعادة المنتجات فقط
    if ($request->ajax()) {
        return response()->json([
            'products' => view('front.partials.product-list', compact('products'))->render()
        ]);
    }

    // عرض الصفحة كاملة إذا لم يكن AJAX
    return view('front.shop', compact('products', 'stores', 'categories', 'colors', 'sizes'));
}
}

}
