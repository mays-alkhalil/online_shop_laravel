<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();  // لجلب جميع الكوبونات
        return view('admin.coupons.index', compact('coupons'));
    }

    public function create()
    {
        return view('admin.coupons.create');
    }

   // داخل CouponController

   public function store(Request $request)
   {
       // تحقق من صحة البيانات
       $validated = $request->validate([
           'code' => 'required|unique:coupons,code',
           'discount' => 'required|numeric',
           'expires_at' => 'required|date',
       ]);
   
       // إضافة الكوبون
       $coupon = Coupon::create([
           'code' => $validated['code'],
           'discount' => $validated['discount'],
           'expires_at' => $validated['expires_at'],
       ]);
   
       // التوجيه بعد إضافة الكوبون
       return redirect()->route('admin.coupons.index')->with('success', 'Coupon added successfully!');
   }
   

    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        return redirect()->route('admin.coupons.index')->with('success', 'Coupon deleted successfully!');
    }


    public function indexFront()
    {
        // جلب جميع الكوبونات من قاعدة البيانات
        $coupons = Coupon::all();

        // تمرير البيانات إلى الـ View
        return view('front.coupons', compact('coupons'));
    }



    public function applyCoupon(Request $request)
    {
        $request->validate([
            'couponCode' => 'required|string',
        ]);
    
        // تحقق من وجود الكوبون في قاعدة البيانات
        $coupon = Coupon::where('code', $request->couponCode)->first();
    
        if (!$coupon) {
            return redirect()->back()->with('coupon_error', 'Invalid coupon code.');
        }
    
        // تحديث الجلسة بقيمة الخصم ونوع الخصم
        session([
            'coupon_discount_value' => $coupon->discount, // قيمة الخصم
            'coupon_discount_type' => $coupon->discount_type, // نوع الخصم (percentage أو fixed)
            'coupon_code' => $coupon->code, // لتوضيح الكوبون المستخدم
        ]);
    
        return redirect()->back()->with('coupon_success', 'Coupon applied successfully!');
    }
    
    

}
