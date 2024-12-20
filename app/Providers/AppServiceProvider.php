<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\View;

use App\Models\Product;
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
}
}