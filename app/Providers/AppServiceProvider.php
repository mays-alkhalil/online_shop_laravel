<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // مشاركة المنتجات مع جميع الـ Views
        view()->share('products', Product::all());
    
        // مشاركة الفئات مع جميع الـ Views
        view()->share('categories', Category::all());
    
        // مشاركة المتاجر مع جميع الـ Views
        view()->share('stores', Store::all());
    
        // جلب آخر 4 منتجات
        $LastProducts = Product::latest()->take(4)->get();
        view()->share('LastProducts', $LastProducts);
    
        // جلب جميع الطلبات مع العناصر المرتبطة بها
        $orders = Order::with('orderItems')->get();
        view()->share('orders', $orders);
    
        // مشاركة العناصر المرتبطة بكل طلب (OrderItems) مع الـ View
        foreach ($orders as $order) {
            $orderItems = OrderItem::where('order_id', $order->id)->get();
            view()->share('orderItems_' . $order->id, $orderItems);  // مشاركة العناصر مع الـ View باستخدام اسم فريد
        }
    
        // Composer لجميع الـ Views لضمان البيانات المتاحة
        View::composer('*', function ($view) {
            // التحقق من إذا كان المستخدم مسجلاً دخوله
            $user = Auth::user();
    
            // جلب عدد المنتجات في السلة
            $cartCount = $user ? Cart::where('user_id', $user->id)->count() : 0;
    
            // جلب عدد المنتجات في قائمة الرغبات (wishlist)
            $wishlistCount = $user ? Wishlist::where('user_id', $user->id)->count() : 0;
    
            // تمرير البيانات إلى الـ View
            $view->with(compact('cartCount', 'wishlistCount'));
        });
    }
    
}
