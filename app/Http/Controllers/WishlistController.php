<?php
namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use App\Models\User;


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
        $user = auth()->check() ? auth()->user() : User::find(3); // تعيين المستخدم إلى ID 3 إذا لم يكن مسجل دخول
    
        // العثور على سجل المفضلة باستخدام الـ ID و الـ user_id
        $wishlist = $user->wishlists()->where('product_id', $id)->first();
    
        // إذا تم العثور على المفضلة، قم بحذفها
        if ($wishlist) {
            $wishlist->delete();
        }
    
        // إعادة التوجيه إلى صفحة المفضلة بعد الحذف
        return redirect()->route('front.wishlist');
    }
    
    // دالة لحساب عدد المنتجات في الويش ليست
    // public function countWishlist()
    // {
    //     // جلب عدد المنتجات في الـ Wishlist للمستخدم الحالي
    //     $wishlistCount = Wishlist::where('user_id', 3)->count();

    //     // إرجاع العدد إلى الـ view
    //     return view('front.patials.navbar', compact('wishlistCount'));
    // }
        
}