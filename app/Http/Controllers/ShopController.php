<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;

class ShopController extends Controller
{
   

        public function Shopindex(Request $request)
        {
            // الحصول على المعاملات من الرابط
            $storeId = $request->query('store');
            $categoryId = $request->query('category');
    
            // استرجاع المنتجات بناءً على المتجر والفئة
            $products = Product::query();
    
            if ($storeId) {
                $products = $products->where('store_id', $storeId); // تصفية المنتجات حسب المتجر
            }
    
            if ($categoryId) {
                $products = $products->where('category_id', $categoryId); // تصفية المنتجات حسب الفئة
            }
    
            // الحصول على المنتجات بعد التصفية
            $products = $products->get();
    
            // تحميل الصفحة مع الفلاتر
            return view('front.shop', compact('products'));
        }
                
                
    
}

