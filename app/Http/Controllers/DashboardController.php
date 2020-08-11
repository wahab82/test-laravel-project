<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        return view('welcome')->with('products', $products);
    }
}
