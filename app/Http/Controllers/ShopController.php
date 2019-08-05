<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

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
        if (!$product) {
            return view('layouts.error');
        } else {
            $product_details = $product->productDetail;
            $sizes = [];
            $colors = [];
            foreach ($product_details as $detail) {
                $size = $detail->size;
                if (!in_array($size, $sizes)) {
                    $sizes[] = $size;
                }
                $color = $detail->color;
                if (!in_array($color, $colors)) {
                    $colors[] = $color;
                }
            }
            return view('shopping_views.product_detail', ['product' => $product, 'sizes' => $sizes, 'colors' => $colors]);
        }
    }

    public function showProductWithCategory($slug){
        $category = Category::where('slug', $slug)->first();
        $pro = $category->products;

        return view('shopping_views.products', ['productsWithCategory' => $pro, 'category' => $category]);
    }
}
