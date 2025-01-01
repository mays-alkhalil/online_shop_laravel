<?php
namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;


class WishlistController extends Controller
{
    public function add($id)
    {
        // إذا لم يكن المستخدم مسجل دخول، تعيين user_id إلى 3 بشكل مبدئي
        $user = auth()->check() ? auth()->user() : User::find(3); // تعيين المستخدم 3 بشكل مبدئي
        
        $product = Product::findOrFail($id); // العثور على المنتج باستخدام الـ ID
    
        // إضافة المنتج إلى المفضلة إذا لم يكن موجودًا بالفعل
        $wishlist = $user->wishlists()->firstOrCreate([
            'product_id' => $product->id,
        ]);
    
        return redirect()->back(); // العودة إلى الصفحة السابقة
    }
         
    
    public function index()
    {
        // إذا لم يكن المستخدم مسجل دخول، تعيين user_id إلى 3 بشكل مبدئي
        $user = auth()->check() ? auth()->user() : User::find(3); // تعيين المستخدم إلى ID 3 إذا لم يكن مسجل دخول
    
        // الحصول على المنتجات المفضلة
        $wishlists = $user->wishlists()->with('product')->get();
    
        return view('front.wishlist', compact('wishlists'));
    }

    public function remove($id)
    {
        $user = auth()->check() ? auth()->user() : User::find(3); 
        $wishlist = $user->wishlists()->where('product_id', $id)->first();
    
        if ($wishlist) {
            $wishlist->delete();
        }
    
        return redirect()->route('front.wishlist');
    }
public function showWishlistAndCart()
{
    // الحصول على الـ wishlist و الـ cart للمستخدم
    $wishlist = Wishlist::where('user_id', auth()->id())->get();
    $cart = Cart::where('user_id', auth()->id())->get();

    // تمرير البيانات إلى الـ view
    return view('front.index', compact('wishlist', 'cart'));
}

}