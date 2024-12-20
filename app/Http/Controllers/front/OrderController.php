<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // منطق استرجاع الطلبات أو عرض الطلبات
        return view('front.orders');  // تأكد من أن العرض موجود
    }
}
