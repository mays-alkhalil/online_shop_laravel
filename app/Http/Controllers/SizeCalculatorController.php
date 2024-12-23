<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SizeCalculatorController extends Controller
{
    public function index()
    {
        return view('size-calculator');  // إرجاع صفحة Blade
    }
}

