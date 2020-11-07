<?php

namespace App\Http\Controllers\API;

use App\ApiProduct;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\DB;


class ProduckApiController extends Controller
{
    public function all(){                
        $products   = ApiProduct::with('galleries')->get(); 
        // $products = DB::table('products')
        //         ->join('categories', 'products.categories_id', '=', 'categories.id')
        //         ->select('products.name', 'categories.name as kategori','categories.photo')                
        //         ->get();        
        return ResponseFormatter::success($products,'Data Berhasil');
    }
}
