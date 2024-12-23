<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;

class FrontCategoryController extends Controller
{


    // public function showCategoriesInNavbar()
    // {
    //     dd('tt');
    //     $categories = Category::select('name')->get(); 
    //     return view('front.partials.navbar', compact('categories')); 
    // }



    // public function index(){
    //     dd('tt');

    //     $categories = Category::all();
    //     dd($categories);
    //     return view('front.index', compact('categories'));
    // }
    public function show($id)
    {
        // جلب الكاتيجوري بناءً على الـ ID
        $category = Category::findOrFail($id);

        // جلب المنتجات المرتبطة بهذه الفئة
        $products = Product::where('category_id', $id)->get();
        // dd($products);

        // إرسال البيانات إلى الـ View
        return view('front.categories.show', compact('category', 'products'));
    }
    public function showStoresProducts($id)
    {
        // جلب الكاتيجوري بناءً على الـ ID
        $store = Store::findOrFail($id);

        // جلب المنتجات المرتبطة بهذه الفئة
        $products = Product::where('store_id', $id)->get();
        // dd($products);

        // إرسال البيانات إلى الـ View
        return view('front.stores.showStore', compact('store', 'products'));
    }


}
