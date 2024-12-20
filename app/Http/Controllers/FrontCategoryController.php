<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class FrontCategoryController extends Controller
{


    public function showCategoriesInNavbar()
    {
        dd('tt');
        $categories = Category::select('name')->get(); 
        return view('front.partials.navbar', compact('categories')); 
    }



    public function index(){
        dd('tt');

        $categories = Category::all();
        dd($categories);
        return view('front.index', compact('categories'));
    }



}
