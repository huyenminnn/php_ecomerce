<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $top_products = Product::orderBy('rating', 'desc')->take(config('constant.top'))->get();

        return view('shopping_views.home', ['top_products' => $top_products]);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return view('shopping_views.product_detail', ['product' => $product]);
    }
}
