<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\FrontStoreController;
use App\Http\Controllers\FrontCategoryController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Livewire\SearchProducts;
use App\Http\Controllers\CouponController;


// web.php
Route::get('/front/index', [WishlistController::class, 'showWishlistAndCart']);


Route::get('/set-locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        // حفظ اللغة في الجلسة
        session(['locale' => $locale]);

        // تعيين اللغة في التطبيق
        app()->setLocale($locale);
    }

    // العودة إلى الصفحة السابقة
    return redirect()->back();
})->name('setLocale');




Route::get('/category/{id}', [FrontCategoryController::class, 'show'])->name('category.show');
Route::get('/store/{id}', [FrontCategoryController::class, 'showStoresProducts'])->name('store.show');




// عرض صفحة المتجر الرئيسية
Route::get('/front/shop', [ShopController::class, 'Shopindex'])->name('front.shop.index');
Route::get('/shop/filter', [ShopController::class, 'filter'])->name('front.shop.filter');

// // تصفية المنتجات
// Route::post('/front/shop', [ShopController::class, 'filterProducts'])->name('shop.filter');

// // عرض الفلاتر
// Route::get('/front/shop/filters', [FilterController::class, 'showFilters'])->name('front.shop.filters');

// // عرض المنتجات بعد التصفية (تُستخدم Middleware للمشاركة بين المتاجر)
// Route::middleware(['share.stores'])->get('/front/shop', [FilterController::class, 'showProducts']);

// // عرض صفحة المتجر بواسطة FilterController (إذا لزم الأمر فقط)
// Route::get('/front/shop', [FilterController::class, 'showShop'])->name('front.shop');

// // عرض منتج معين
// Route::get('/front/product/{id}', [ProductController::class, 'showProduct'])->name('product.show');

// // عرض المنتجات في واجهة المستخدم (إذا كانت مطلوبة بشكل منفصل)
// Route::get('/front/shop', [ProductController::class, 'indexFront'])->name('front.shop.products');

// // عرض العناصر الخاصة بطلب معين
Route::get('/front/order-items/{order_id}', [OrderController::class, 'showOrderItems'])->name('front.order-items');
Route::get('/front/orders', [OrderController::class, 'orderHistory'])->name('front.orders');


// Route::get('/front/order', [OrderController::class, 'orderHistory'])->name('front.order');

Route::get('/logout', function () {
    Auth::logout(); // تسجيل الخروج
    session()->invalidate(); // تدمير الجلسة
    session()->regenerateToken(); // توليد توكن جديد للجلسة
    return redirect('/front/index'); // إعادة التوجيه إلى الصفحة الرئيسية أو أي صفحة أخرى
})->name('logout');
Route::get('/admin/dashboard', [LoginController::class, 'authenticated'])->name('admin.dashboard');

Route::get('/front/checkout', [CheckoutController::class, 'index'])->name('front.checkout.index');
Route::post('/front/checkout', [CheckoutController::class, 'store'])->name('front.checkout');
// Route for checkout (POST method)
// Route::post('/front/checkout', [CheckoutController::class, 'store'])->name('front.checkout');
// Route::resource('front/checkout', CheckoutController::class)->only(['index', 'store']);
// Route for the thanks page (GET method)
Route::get('/front/thanks', [CheckoutController::class, 'showThanksPage'])->name('front.thanks');


Route::patch('/front/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/front/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// عرض صفحة الطلبات
// Route::get('/front/orders', [OrderController::class, 'index'])->name('front.orders');

// Route::view('/front/index','front.index');
// Route::view('/','welcome');
// Route::view('/front/shop','front.shop');
// Route::view('/front/details','front.details');
Route::view('/front/contact','front.contact');
// Route::view('/front/cart','front.cart');
// // Route::view('/front/checkout','front.checkout');
// Route::view('/front/wishlist','front.wishlist');
// Route::view('/front/profile','front.profile');
// Route::view('/front/login','front.login');
// Route::view('/front/register','front.register');
Route::view('/front/orders','front.orders');
Route::view('/front/order-items','front.order-items');
Route::view('/front/coupons','front.coupons');
Route::view('/front/points','front.points');


// Route::get('/front/shop', [FrontStoreController::class, 'ShopStore'])->name('front.shop');

// Route::get('/front/index', [FrontStoreController::class, 'showStores'])->name('front.partials.navbar');

Route::get('/front/navbar', [FrontCategoryController::class, 'showCategoriesInNavbar'])->name('front.activeCategories');

// Route::get('/front/index', [FrontCategoryController::class, 'index'])->name('front.index');


// Route::get('/front/index', [FrontStoreController::class, 'getStores'])->name('front.activeStores');


Route::get('/front/index', [ProductController::class, 'indexProduct'])->name('front.index');

// Route::get('/stores', [StoreController::class, 'getStores']);
Route::get('/shop', [ProductController::class, 'shop']);




// Route::get('/front/shop', [FilterController::class, 'showFilters'])->name('front.shop');



Route::get('/front/products/{id}', [ProductController::class, 'showRelatedProducts'])->name('products.show');
// إضافة منتج إلى قائمة الرغبات
Route::get('/wishlist/add/{id}', [WishlistController::class, 'add'])->name('wishlist.add');
Route::get('/front/wishlist', [WishlistController::class, 'index'])->name('front.wishlist');
Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');

// إضافة منتج إلى السلة
Route::get('/front/cart', [CartController::class, 'showCart'])->name('front.cart');

Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
// Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');
// Route::delete('cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('front/details/{id}', [ProductController::class, 'show'])->name('front.details.show');
Route::post('/product/{product}/review', [ProductController::class, 'storeReview'])->name('product.review');

// عرض النموذج
Route::get('/profile', [ProfileController::class, 'edit'])->name('personal.info');

// تحديث البيانات

// عرض ملف التعريف
// عرض صفحة الملف الشخصي
Route::get('/front/profile', [ProfileController::class, 'edit'])->name('front.profile');

// تحديث بيانات الملف الشخصي
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
// Route::get('/front/shop', [ShopController::class, 'index'])->name('front.shop');
// Route::get('/checkout', [CheckoutController::class, 'index'])->name('front.checkout');
Route::get('/admin/contact', [ContactController::class, 'index'])->name('front.contact');


// Route::get('/', function () {
//     // جلب عدد العناصر في الويش ليست والكارت
//     $wishlistCount = (new WishlistController)->countWishlist();
//     $cartCount = (new CartController)->countCart();

//     // تمرير الأعداد إلى الـ view
//     return view('front.patials.navbar', compact('wishlistCount', 'cartCount'));
// });


Route::get('/front/coupons', [CouponController::class, 'indexFront'])->name('front.coupons');


























// admin ------------------------------------------------------------------------------------------------


use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\OrderController;
// use App\Http\Controllers\StoreController;
// use App\Http\Controllers\CouponController;
// use App\Http\Controllers\ContactController;

// use App\Http\Controllers\ProductController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SizeCalculatorController;

Route::get('/size-calculator', [SizeCalculatorController::class, 'index']);


Route::post('/front/apply-coupon', [CouponController::class, 'applyCoupon'])->name('front.applyCoupon');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user-chart', [MainController::class, 'chart']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// مسارات الـ Admin مع التحقق من صلاحيات الدخول
Route::prefix('admin')->middleware(['auth', 'AdminMiddleware'])->group(function () {
    // لوحة التحكم الخاصة بالـ Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard'); 

    // إدارة التصنيفات (Categories)
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('/add-category', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/add-category', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/edit-category/{category_id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('update-category/{category_id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::post('delete-category', [CategoryController::class, 'destroy'])->name('admin.category.delete'); // تم تعديل المسار لحذف التصنيف

    // إدارة المستخدمين (Users)
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('user/{user_id}', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('update-user/{user_id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('delete-user/{user_id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});
// stores
Route::prefix('admin')->middleware(['auth', 'AdminMiddleware'])->group(function () {
    // إدارة المتاجر (Stores)
    Route::resource('stores', StoreController::class);  // هذا السطر يقوم بتعريف كافة المسارات الخاصة بالـ Stores
    
    // إذا كنت بحاجة لتعريف مسارات إضافية بشكل فردي (اختياري):
    Route::get('stores', [StoreController::class, 'index'])->name('admin.stores.index');  // عرض قائمة المتاجر
    Route::get('add-store', [StoreController::class, 'create'])->name('admin.stores.create');  // صفحة إضافة متجر جديد
    Route::post('add-store', [StoreController::class, 'store'])->name('admin.stores.store');  // إرسال بيانات المتجر الجديد
    Route::get('edit-store/{store}', [StoreController::class, 'edit'])->name('admin.stores.edit');  // صفحة تعديل متجر
    Route::put('update-store/{store}', [StoreController::class, 'update'])->name('admin.stores.update');  // تحديث المتجر
    Route::delete('stores/{id}', [StoreController::class, 'destroy'])->name('admin.stores.destroy');  // حذف المتجر
});

// products
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
});

// orders

Route::resource('admin/orders', OrderController::class);
Route::patch('admin/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
Route::delete('admin/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
Route::patch('admin/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
Route::get('admin/orders/status/{status}', [OrderController::class, 'filterByStatus'])->name('admin.orders.filterByStatus');
Route::get('admin/orders/{id}/print', [OrderController::class, 'printOrder'])->name('admin.orders.print');
Route::get('admin/orders/user/{userId}', [OrderController::class, 'userOrders'])->name('admin.orders.userOrders');
Route::get('admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
Route::get('admin/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
Route::post('admin/orders/store', [OrderController::class, 'storeCoupon'])->name('admin.orders.store');
Route::post('admin/orders/apply-coupon', [OrderController::class, 'applyCoupon'])->name('admin.orders.applyCoupon');




// contacts

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
    // Corrected the delete route
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});


// كوبونات
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/coupons', [CouponController::class, 'index'])->name('coupons.index');
    Route::get('/coupons/create', [CouponController::class, 'create'])->name('coupons.create');
    Route::post('/coupons', [CouponController::class, 'store'])->name('coupons.store');
    Route::delete('/coupons/{id}', [CouponController::class, 'destroy'])->name('coupons.destroy');
});


// ريفيوز

Route::prefix('admin')->group(function () {
    Route::get('/reviews', [ReviewController::class, 'index'])->name('admin.reviews.index');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('admin.reviews.destroy');
});



// Route::get('/image/{path}', function ($path) {
//     $path = storage_path('app/public/' . $path);

//     // تحقق مما إذا كانت الصورة موجودة
//     if (file_exists($path)) {
//         return response()->file($path);
//     }

//     // إذا لم تكن الصورة موجودة، عرض صورة 404 مخصصة من resources/views
//     $errorImagePath = resource_path('views/error404.jpg'); // المسار إلى صورة الخطأ في resources/views
//     return response()->file($errorImagePath);
// })->where('path', '.*');

Route::get('/{path}', function () {
    // إرجاع صفحة الخطأ باستخدام Blade
    return view('error404');
})->where('path', '.*');


Route::get('/shop/filter', [ShopController::class, 'filter'])->name('shop.filter');











