<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        $categories = Category::take(6)->get();
        $products   = Product::with('galleries','user')->take(8)->latest()->get();         
               
        return view('pages.home',[
            'categories' => $categories,
            'products'   => $products   
        ]);
    }
    
}
