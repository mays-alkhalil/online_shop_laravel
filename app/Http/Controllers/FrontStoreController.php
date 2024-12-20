<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store; // تأكد من استيراد الموديل Store

class FrontStoreController extends Controller
{
    // عرض جميع المتاجر
    public function ShopStore()
    {
        $stores = Store::all(); // جلب جميع المتاجر من قاعدة البيانات
        dd($stores);
        return view('front.shop', compact('stores')); // عرض المتاجر في الـ view
    }

    // عرض أسماء المتاجر فقط
    public function showStores()
    {
        
        $stores = Store::select('name')->get(); // جلب أسماء المتاجر فقط
        return view('front.partials.navbar', compact('stores')); // تمرير المتاجر إلى الـ View
    }
    

    // جلب المتاجر النشطة فقط
    public function getStores()
    {
        $stores = Store::where('status', 'active')->get(); // جلب المتاجر النشطة
        return view('front.index', compact('stores'));
    }
}
