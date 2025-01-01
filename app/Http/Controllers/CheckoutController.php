<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $user = auth()->user();
        } else {
            $user = User::find(3); 
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
    {  $user = auth()->user(); 
        $order = new Order();
        $order->user_id = auth()->id();
        $order->address = $request->address;
        $order->phone_number = $request->phoneNumber;
        $order->payment_method = $request->paymentMethod;
        $order->total_amount = $request->totalAmount;
        // لا تخزن الكارت نمبر ولا الكسبير ديت ولا الاسم الأول أو الأخير
    
        // حفظ الطلب
        $order->save();
                // جلب العناصر من عربة التسوق الخاصة بالمستخدم
            $cartItems = $user->cart;

            foreach ($cartItems as $item) {
                // إنشاء سجل جديد في order_items
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id; // ربط العنصر بالطلب
                $orderItem->product_id = $item->product_id; // معرف المنتج
                $orderItem->quantity = $item->quantity; // الكمية
                $orderItem->unit_price = $item->product->price; // سعر الوحدة
                $orderItem->total_price = $item->quantity * $item->product->price; // السعر الإجمالي
                $orderItem->save();
            }

                $user->cart()->delete();

                return redirect()->route('front.thanks'); 
    }

    public function showThanksPage(){
        return view('front.thanks'); 

    }
    }
