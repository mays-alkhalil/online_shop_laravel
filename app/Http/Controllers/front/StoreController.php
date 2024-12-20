<?php

// namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use App\Models\Store;



// class StoreController extends Controller
// {
//     public function index()
//     {
//         $stores = Store::all(); // هنا يمكن جلب المتاجر من قاعدة البيانات
//         return view('front.shop', compact('stores')); // عرض المتاجر في view
//     }
    // public function showStores()
    // {
    //     $stores = Store::select('name')->get(); // جلب أسماء المحلات فقط
        
    //     return view('front.partials.navbar', compact('stores'));
        
    // }
//  public function getStores()
// {
//     // جلب المتاجر النشطة فقط
//     $stores = Store::where('status', 'active')->get();

//     // إرجاع العرض مع المتاجر
//     return view('front.index', compact('stores'));
// }
// }