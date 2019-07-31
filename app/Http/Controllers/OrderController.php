<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductDetail;
use App\Models\User;
use App\Models\InfoDelivery;
use App\Enums\StatusOrder;
use Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $order = new Order();
        $order->order_code = $request->info_delivery . time();

        $cart = Session::get('cart');
        $total = 0;
        foreach ($cart as $key => $product) {
            $productDetail = ProductDetail::find($key);
            if (!$productDetail) {
                unset($cart[$key]);
                Session::put('cart', $cart);

                return redirect()->route('shop.cart');
            } else {
                $quantity = $productDetail->quantity;
                $productDetail->update(['quantity' => $quantity - $product['quantity']]);
                $total += $product['subTotal'];
                $this->orderDetail($order->order_code, $key, $product);
            }
        }

        $order->total = $total;
        $order->status = StatusOrder::Pending;
        $order->info_delivery = $request->info_delivery;
        $order->save();
        Session::forget('cart');

        return redirect()->route('shop.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return view('layouts.error');
        } else {
            $orderDetails = $order->orderDetails;
            $info_delivery = InfoDelivery::find($order->info_delivery);
            foreach ($orderDetails as $orderDetail) {
                $product_detail = ProductDetail::find($orderDetail->product_detail_id);
                $orderDetail->name = $product_detail->product->name;
                $orderDetail->size = $product_detail->size;
                $orderDetail->color = $product_detail->color;
            }

            return view('shopping_views.order_detail', ['orderDetails' => $orderDetails, 'info_delivery' => $info_delivery]);
        }
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

    // add order details
    public function orderDetail($code, $key, array $product){
        $orderDetail = new OrderDetail();
        $orderDetail->order_code = $code;
        $orderDetail->product_detail_id = $key;
        $orderDetail->quantity = $product['quantity'];
        $orderDetail->total = $product['quantity'] * $product['price'];
        $orderDetail->save();
    }

    // update quantity product when order is canceled
    public function changQuantity(Order $order)
    {
        $orderDetails = $order->orderDetails;
        foreach ($orderDetails as $key => $orderDetail) {
            $productDetail = ProductDetail::find($orderDetail->product_detail_id);
            $quantity = $productDetail->quantity;
            $productDetail->update(['quantity' => $quantity + $orderDetail->quantity]);
        }
    }

    public function getOrder()
    {
        $orders = collect();
        $user = User::find(Auth::user()->id);
        $info_deliveries = $user->infoDeliveries;
        foreach ($info_deliveries as $key => $info) {
            $order = $info->orders;
            $orders = $orders->merge($order);
        }

        return view('shopping_views.history', ['orders' => $orders->all()]);
    }
}
