<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // استدعاء الأساسيات
use App\Models\admin\Coupon; // استدعاء موديل الكوبونات

class FrontController extends Controller
{
    public function showOffer()
    {
        // جلب أعلى خصم من جدول الكوبونات
        $highestDiscount = \App\Models\admin\Coupon::max('discount');
        
        // تحقق من القيمة
        dd($highestDiscount);  // تأكد من أن القيمة تظهر بشكل صحيح

        // تمرير المتغير إلى View باستخدام with()
        return view('front.index')->with('highestDiscount', $highestDiscount); // استخدام with
    }
}

