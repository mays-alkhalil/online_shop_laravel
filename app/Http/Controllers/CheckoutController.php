<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $user = auth()->user();
        } else {
            $user = User::find(3); // إذا لم يكن المستخدم مسجلاً
        }

        $cartItems = Cart::where('user_id', $user->id)->get();
        $subtotal = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        $shipping = 10; // تكلفة الشحن
        $total = $subtotal + $shipping;

        return view('front.checkout', compact('cartItems', 'subtotal', 'shipping', 'total'));
    }

    public function store(Request $request)
    {
        // تأكد من أن البيانات التي سيتم حفظها هي فقط التي تريدها
        $order = new Order();
        $order->user_id = auth()->id();
        $order->address = $request->address;
        $order->phone_number = $request->phoneNumber;
        $order->payment_method = $request->paymentMethod;
        // لا تخزن الكارت نمبر ولا الكسبير ديت ولا الاسم الأول أو الأخير
    
        // حفظ الطلب
        $order->save();
    
        // إعادة توجيه إلى صفحة الشكر
        return redirect()->route('front.thanks'); // تأكد من أنك قد عرفت هذه الصفحة
    }
    }
