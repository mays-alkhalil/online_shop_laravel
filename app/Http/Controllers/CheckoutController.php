<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        // التحقق من إذا كان المستخدم مسجلاً دخوله أم لا
        if (auth()->check()) {
            // إذا كان مسجلاً، استخدم المستخدم المسجل
            $user = auth()->user();
        } else {
            // إذا لم يكن مسجلاً، تعيين المستخدم 3
            $user = User::find(3);
        }

        // الحصول على المنتجات الخاصة بالسلة للمستخدم الحالي
        $cartItems = Cart::where('user_id', $user->id)->get();

        // حساب الإجمالي
        $subtotal = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity; // assuming 'product' relationship is set
        });

        $shipping = 10; // فرضاً الشحن ثابت
        $total = $subtotal + $shipping;

        // تمرير البيانات إلى الـ view
        return view('front.checkout', compact('cartItems', 'subtotal', 'shipping', 'total'));
    }
}
