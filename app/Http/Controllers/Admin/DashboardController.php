<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

use App\User;
use App\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $customer = User::count();
        $revenue = Transaction::sum('total_price');
        $transaction = Transaction::count();
        $ukm = User::where('roles','USER')->count();
        $produk = Product::count();
        $kategori = Category::count();

        return view('pages.admin.dashboard',[
            'customer'      => $customer,
            'revenue'       => $revenue,
            'transaction'   => $transaction,
            'ukm'           => $ukm,
            'produk'        => $produk,
            'kategori'      => $kategori
        ]);
    }
}
