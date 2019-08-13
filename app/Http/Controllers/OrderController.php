<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ProductDetail\ProductDetailRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\InfoDelivery\InfoDeliveryRepositoryInterface;
use App\Enums\StatusOrder;
use Session;

class OrderController extends Controller
{
    protected $orderRepo;
    protected $orderDetailRepo;
    protected $productDetailRepo;
    protected $userRepo;
    protected $infoDeliveryRepo;

    public function __construct(
        ProductDetailRepositoryInterface $productDetailRepo,
        OrderRepositoryInterface $orderRepo,
        OrderDetailRepositoryInterface $orderDetailRepo,
        UserRepositoryInterface $userRepo,
        InfoDeliveryRepositoryInterface $infoDeliveryRepo
    )
    {
        $this->orderRepo = $orderRepo;
        $this->orderDetailRepo = $orderDetailRepo;
        $this->productDetailRepo = $productDetailRepo;
        $this->userRepo = $userRepo;
        $this->infoDeliveryRepo = $infoDeliveryRepo;
    }

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
        $order_code = $request->info_delivery . time();

        $cart = Session::get('cart');
        $total = 0;
        foreach ($cart as $key => $product) {
            $productDetail = $this->productDetailRepo->findById($key);
            if (!$productDetail) {
                unset($cart[$key]);
                Session::put('cart', $cart);

                return redirect()->route('shop.cart');
            } else {
                $quantity = $productDetail->quantity;
                $this->productDetailRepo->update($productDetail, ['quantity' => $quantity - $product['quantity']]);
                $total += $product['subTotal'];
                $this->orderDetail($order_code, $key, $product);
            }
        }

        $data = [
            'order_code' => $order_code,
            'total' => $total,
            'status' => StatusOrder::Pending,
            'info_delivery' => $request->info_delivery,
        ];
        $this->orderRepo->create($data);
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
        $order = $this->orderRepo->findById($id);
        if (!$order) {
            return view('layouts.error');
        } else {
            $orderDetails = $order->orderDetails;
            $info_delivery = $this->infoDeliveryRepo->findById($order->info_delivery);
            foreach ($orderDetails as $orderDetail) {
                $product_detail = $this->productDetailRepo->findById($orderDetail->product_detail_id);
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
        $data = [
            'order_code' => $code,
            'product_detail_id' => $key,
            'quantity' => $product['quantity'],
            'total' => $product['quantity'] * $product['price'],
        ];
        $this->orderDetailRepo->create($data);
    }

    // update quantity product when order is canceled
    public function changQuantity(Order $order)
    {
        $orderDetails = $order->orderDetails;
        foreach ($orderDetails as $key => $orderDetail) {
            $productDetail = $this->productDetailRepo->findById($orderDetail->product_detail_id);
            $quantity = $productDetail->quantity;

            $this->productDetailRepo->update($productDetail, ['quantity' => $quantity + $orderDetail->quantity]);
        }
    }

    public function getOrder()
    {
        $orders = collect();
        $user = $this->userRepo->findById(Auth::user()->id);
        $info_deliveries = $user->infoDeliveries;
        foreach ($info_deliveries as $key => $info) {
            $order = $info->orders;
            $orders = $orders->merge($order);
        }

        return view('shopping_views.history', ['orders' => $orders->all()]);
    }
}
