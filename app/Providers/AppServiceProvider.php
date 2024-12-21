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
        view()->share('products', Product::all());
        view()->share('categories', Category::all());
        view()->share('stores', Store::all()); 
                // جلب آخر 4 منتجات
                $LastProducts = Product::latest()->take(4)->get();

                // مشاركة البيانات مع جميع الـ Views
                View::share('LastProducts', $LastProducts);

                $orders = Order::with('orderItems')->get();
                View::share('orders', $orders);
                foreach ($orders as $order) {
                    $orderItems = OrderItem::where('order_id', $order->id)->get();
                    View::share('orderItems_' . $order->id, $orderItems);  // مشاركة العناصر في الـ View مع اسم فريد
                }
                
                $userId = auth()->id(); // الحصول على الـ ID الخاص بالمستخدم الحالي
                $orders = Order::where('user_id', $userId)->get(); // جلب الطلبات بناءً على الـ user_id
                View::share('orders', $orders); // مشاركة البيانات مع جميع الـ Views}


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
            
                // المتغيرات الافتراضية للصفحة والحجم
                // $page = request()->query("page", 1);
                // $size = request()->query("size", 12);
            
                // $order = request()->query("order", -1);
                // $o_column = "created_at";
                // $o_order = "desc";
            
                // switch ($order) {
                //     case 1:
                //         $o_column = "created_at";
                //         $o_order = "desc";
                //         break;
                //     case 2:
                //         $o_column = "created_at";
                //         $o_order = "asc";
                //         break;
                //     case 3:
                //         $o_column = "price";
                //         $o_order = "desc";
                //         break;
                //     case 4:
                //         $o_column = "price";
                //         $o_order = "asc";
                //         break;
                //     default:
                //         $o_column = "created_at";
                //         $o_order = "desc";
                //         break;
                // }
            
                // $stores = Store::orderBy("name", 'ASC')->get();
                // $q_stores = request()->query("stores", "");
                // $products = Product::where(function ($query) use ($q_stores) {
                //     $query->whereIn('store_id', explode(',', $q_stores))->orWhereRaw("'" . $q_stores . "'=''");
                // })
                //     ->orderBy('created_at', 'DESC')
                //     ->orderBy($o_column, $o_order)
                //     ->paginate($size);
            
                // View::share([
                //     'products' => $products,
                //     'page' => $page,
                //     'size' => $size,
                //     'order' => $order,
                //     'stores' => $stores,
                //     'q_stores' => $q_stores,
                // ]);
}
}
