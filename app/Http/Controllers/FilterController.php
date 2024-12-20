<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function showFilters(Request $request)
    {      

        $stores = Store::withCount('products')->where('status', 'active')->get();
        $categories = Category::all();
        $products = Product::all();
        $colors = Product::select('color')->distinct()->pluck('color'); // الألوان المميزة فقط
        $sizes = Product::select('size')->distinct()->pluck('size'); // الأحجام المميزة فقط
    
        return view('front.shop', compact('products', 'colors', 'sizes', 'stores', 'categories'));
    }


    public function showShop(Request $request)
    {
        $perPage = $request->get('perPage', 1); // 10 هو الرقم الافتراضي للمنتجات المعروضة
        $products = Product::paginate($perPage);
        $stores = Store::all();
        $categories = Category::all();
    
        // إذا كان الطلب AJAX، نعيد المنتجات والباجيناشن فقط
        if ($request->ajax()) {
            return response()->json([
                'products' => view('front.shop.products', compact('products'))->render(),
                'pagination' => (string) $products->links()
            ]);
        }
    
        return view('front.shop', compact('products', 'stores', 'categories')); 
    }
    

   
   
}
