<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;

class ShopController extends Controller
{
    //repository
    protected $productRepo;
    protected $categoryRepo;

    public function __construct(ProductRepositoryInterface $productRepo, CategoryRepositoryInterface $categoryRepo)
    {
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        $top_products = $this->productRepo->getHotProduct(config('constant.top'));

        return view('shopping_views.home', ['top_products' => $top_products]);
    }

    public function show($slug)
    {
        $product = $this->productRepo->findFirst(['slug' => $slug]);
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
        $category = $this->categoryRepo->findFirst(['slug' => $slug]);
        $pro = $category->products;

        return view('shopping_views.products', ['productsWithCategory' => $pro, 'category' => $category]);
    }
}
