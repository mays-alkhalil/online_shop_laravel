<?php


namespace App\Http\Controllers;

use Carbon\Carbon; 
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


    public function store(Request $request)
    {
        // تحقق من صحة البيانات
        $validated = $request->validate([
            'code' => 'required|unique:coupons,code',
            'discount' => 'required|numeric',
            'expires_at' => 'required|date',
        ]);
    
        // تحويل التاريخ إلى التنسيق الصحيح باستخدام DateTime
        $expiresAt = new \DateTime($validated['expires_at']);
        $expiresAtFormatted = $expiresAt->format('Y-m-d H:i:s'); 

        // إضافة الكوبون
        $coupon = Coupon::create([
            'code' => $validated['code'],
            'discount' => $validated['discount'],
            'expires_at' => $expiresAtFormatted,
        ]);
    
        return redirect()->route('admin.coupons.index')->with('success', 'Coupon added successfully!');
    }
       
   

    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        return redirect()->route('admin.coupons.index')->with('success', 'Coupon deleted successfully!');
    }


    // public function indexFront()
    // {
    //     $coupons = Coupon::all();

    //     return view('front.coupons', compact('coupons'));
    // }



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
    
        // التحقق من تاريخ الانتهاء
        if (Carbon::parse($coupon->expires_at)->isBefore(Carbon::now())) {
            return redirect()->back()->with('coupon_error', 'This coupon has expired.');
        }
    
        // التحقق من أن الكوبون لم يتم تطبيقه من قبل نفس المستخدم
        if (session()->has('applied_coupons') && in_array($coupon->code, session('applied_coupons'))) {
            return redirect()->back()->with('coupon_error', 'You have already applied this coupon.');
        }
    
        // تحديث الجلسة بقيمة الخصم ونوع الخصم
        session([
            'coupon_discount_value' => $coupon->discount, // قيمة الخصم
            'coupon_discount_type' => $coupon->discount_type, // نوع الخصم (percentage أو fixed)
            'coupon_code' => $coupon->code, // لتوضيح الكوبون المستخدم
        ]);
        
        // إضافة الكوبون إلى الجلسة لتجنب إعادة تطبيقه
        session()->push('applied_coupons', $coupon->code);
    
        return redirect()->back()->with('coupon_success', 'Coupon applied successfully!');
    }
    
}
