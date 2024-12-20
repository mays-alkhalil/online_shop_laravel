<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\View;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Category;
use App\Models\Store;
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
                
                // $userId = auth()->id(); // الحصول على الـ ID الخاص بالمستخدم الحالي
                // $orders = Order::where('user_id', $userId)->get(); // جلب الطلبات بناءً على الـ user_id
                // View::share('orders', $orders); // مشاركة البيانات مع جميع الـ Views}
}
}
