<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function order($id)
    {
        $product = Product::find($id);

        return view('product.order')->with('product', $product);
    }

    public function storeOrder($id)
    {
        
    }
}
