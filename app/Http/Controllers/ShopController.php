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



    public function show(){

        $products = Product::with('reviews')->get();

        $colors = Product::whereNotNull('color')->distinct()->pluck('color');
       

        $sizes = Product::whereNotNull('size')->distinct()->pluck('size');

        return view('front.shop', compact('products', 'colors', 'sizes'));

    }
}
