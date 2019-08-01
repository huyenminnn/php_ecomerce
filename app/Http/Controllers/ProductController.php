<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductDetail;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();

        return view('manager_views.product', ['categories' => $categories]);
    }

    public function getData(){
        $products = Product::get();

        return Datatables::of($products)
            ->addColumn('action', function ($product) {
                $data = '<button type="button" class="btn btn-success btn-show" data-id="' . $product->id . '">' . trans('manager.layout.detail') . '</button>
                        <button type="button" class="btn btn-warning btn-edit" data-id="' . $product->id . '">' . trans('manager.layout.edit') . '</button>';

                return $data;
            })
            ->editColumn('category_id', function ($product) {
                $category = $product->category;

                return $category->name;
            })
            ->editColumn('admin_id', function ($product) {
                $admin = $product->admin;

                return $admin->name;
            })
            ->rawColumns(['category_id', 'action', 'admin_id'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->product_code = $request->product_code;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->admin_id = Auth::guard('admin')->id();
        $product->save();

        $newProduct = Product::where('product_code', $request->product_code)->first()->id;
        $productDetail = new ProductDetail();
        $productDetail->product_id = $newProduct;
        $productDetail->price = $request->price;
        $productDetail->size = $request->size;
        $productDetail->color = $request->color;
        $productDetail->quantity = $request->quantity;
        $productDetail->save();

        if ($request->suggest_id) {
            return ['id' => $request->suggest_id];
        } else {
            return $product;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
