<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // دالة لعرض تفاصيل الطلب مع العناصر المرتبطة
    public function show($orderId)
    {
        // جلب الطلب مع العناصر المرتبطة به (OrderItems) والمنتجات (Product) المرتبطة بها
        $order = Order::with('orderItems.product')->findOrFail($orderId);

        // تمرير البيانات إلى الـ View
        return view('front.order-items', compact('order'));
    }

    // دالة لإضافة عنصر جديد إلى الطلب
    public function store(Request $request)
    {
        // إضافة عنصر جديد في جدول OrderItem
        $item = OrderItem::create([
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            // حساب total_price مباشرةً
            'total_price' => $request->quantity * $request->unit_price,
        ]);

        return redirect()->back()->with('success', 'Order item added successfully.');
    }

    // دالة لتحديث عنصر في الطلب
    public function update(Request $request, $id)
    {
        // جلب العنصر بناءً على الـ ID
        $item = OrderItem::findOrFail($id);

        // تحديث القيم الخاصة بالعنصر
        $item->update([
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            // تحديث total_price بناءً على القيم الجديدة
            'total_price' => $request->quantity * $request->unit_price,
        ]);

        return redirect()->back()->with('success', 'Order item updated successfully.');
    }
}
