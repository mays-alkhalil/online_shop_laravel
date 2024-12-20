<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart as ShoppingCart;

class CartController extends Controller
{
    public function add($id, Request $request)
    {
        // التحقق من إذا كان المستخدم مسجلاً دخوله أم لا
        if (!auth()->check()) {
            // إذا لم يكن المستخدم مسجلاً دخوله، تحويله إلى صفحة تسجيل الدخول
            return redirect()->route('login');
        }
        
        $user = auth()->user(); // الحصول على المستخدم المسجل دخولهم
        
        // العثور على المنتج بناءً على الـ ID
        $product = Product::findOrFail($id);
        
        // الحصول على الكمية من الطلب (أو تعيينها إلى 1 إذا لم يتم تحديدها)
        $quantity = $request->input('quantity', 1);
        
        // التحقق مما إذا كان المنتج موجودًا بالفعل في السلة للمستخدم
        $cartItem = $user->cart()->where('product_id', $product->id)->first();
        
        if ($cartItem) {
            // إذا كان المنتج موجودًا بالفعل، زيادة الكمية
            $cartItem->update(['quantity' => $cartItem->quantity + $quantity]);
        } else {
            // إذا لم يكن موجودًا، إضافة المنتج مع الكمية
            $user->cart()->create([
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }
        
        return redirect()->back();
    }
        
    public function showCart()
    {
        // التحقق من إذا كان المستخدم مسجلاً دخوله أم لا
        $user = auth()->check() ? auth()->user() : User::find(3); // تعيين المستخدم 3 بشكل مبدئي
    
        // الحصول على سلة المشتريات للمستخدم
        $cartItems = Cart::where('user_id', $user->id)->get(); // جلب السلة الخاصة بالمستخدم باستخدام ID
    
        // تمرير السلة إلى الواجهة
        return view('front.cart', compact('cartItems'));
    }
    

    public function update(Request $request, $id)
    {
        $cartItem = Cart::find($id);
    
            // تحديث الكمية بناءً على القيمة المرسلة
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
    
            // حساب المجموع الفرعي والإجمالي
            // $subtotal = Cart::sum(function($item) { return $item->product->price * $item->quantity; });
            // $total = $subtotal + 10; // إضافة تكلفة الشحن
    
            return redirect()->route('front.cart');
           
        
    
    }
        
    
    public function remove($id)
    {
        $cartItem = Cart::find($id);
        
        if ($cartItem) {
            // حذف المنتج من قاعدة البيانات
            $cartItem->delete();
        
            return redirect()->route('front.cart')->with('success', 'Product removed from cart');
        }
        
        return redirect()->route('front.cart')->with('error', 'Product not found in cart');
    }
      
              }
