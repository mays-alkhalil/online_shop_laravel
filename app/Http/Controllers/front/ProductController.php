<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // جلب جميع المنتجات مع التقييمات
        $products = Product::with('reviews')->get();
        
        // حساب التقييم المتوسط لكل منتج
        foreach ($products as $product) {
            $product->averageRating = round($product->reviews->avg('rating') ?? 0, 1);
        }
    
        // جلب آخر 5 منتجات
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


}
