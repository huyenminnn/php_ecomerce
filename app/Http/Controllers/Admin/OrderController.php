<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailOrder;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Repositories\ProductDetail\ProductDetailRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\InfoDelivery\InfoDeliveryRepositoryInterface;
use App\Enums\StatusOrder;

class OrderController extends Controller
{
    protected $orderRepo;
    protected $productDetailRepo;
    protected $infoDeliveryRepo;
    protected $userRepo;

    public function __construct(
        OrderRepositoryInterface $orderRepo,
        ProductDetailRepositoryInterface $productDetailRepo,
        InfoDeliveryRepositoryInterface $infoDeliveryRepo,
        UserRepositoryInterface $userRepo
    )
    {
        $this->orderRepo = $orderRepo;
        $this->productDetailRepo = $productDetailRepo;
        $this->infoDeliveryRepo = $infoDeliveryRepo;
        $this->userRepo = $userRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manager_views.order');
    }

    public function getData(){
        $orders = $this->orderRepo->getAll();

        return Datatables::of($orders)
            ->addColumn('action', function ($order) {
                if ($order->status == StatusOrder::Pending) {
                    $data = '<button type="button" class="btn btn-success btn-show" data-id="' . $order->id . '">' . trans('manager.layout.detail') . '</button>
                        <button type="button" class="btn btn-danger btn-delete" data-id="' . $order->id . '">' . trans('manager.order.cancel') . '</button>
                        <button type="button" class="btn btn-primary confirm" data-id="' . $order->id . '">' . trans('manager.order.confirm') . '</button>';
                } elseif ($order->status == StatusOrder::Confirmed) {
                    $data = '<button type="button" class="btn btn-success btn-show" data-id="' . $order->id . '">' . trans('manager.layout.detail') . '</button>
                        <button type="button" class="btn btn-danger btn-delete" data-id="' . $order->id . '">' . trans('manager.order.cancel') . '</button>';
                } else {
                    $data = '';
                }

                return $data;
            })
            ->editColumn('total', function($order) {
                return number_format($order->total);
            })
            ->editColumn('status', function($order) {
                if ($order->status == StatusOrder::Confirmed) {
                    return '<h4><span class="label label-success">' . trans('manager.layout.confirm') . '</span></h4>';
                } elseif ($order->status == StatusOrder::Pending) {
                    return '<h4><span class="label label-warning">' . trans('manager.layout.pending') . '</span></h4>';
                } else {
                    return '<h4><span class="label label-danger">' . trans('manager.order.canceled') . '</span></h4>';
                }
            })
            ->rawColumns(['total', 'action', 'status'])
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
    public function store(Request $request)
    {
        //
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
        $order = $this->orderRepo->findById($id);
        if (!$order) {
            return view('layouts.error');
        } elseif ($request->data == 'confirm') {
            $dataUpdate = [
                'status' => StatusOrder::Confirmed,
                'admin_id' => Auth::guard('admin')->id(),
            ];
            $this->orderRepo->update($order, $dataUpdate);

            $orderDetails = $order->orderDetails;
            $info_delivery = $this->infoDeliveryRepo->findById($order->info_delivery);
            foreach ($orderDetails as $orderDetail) {
                $product_detail = $this->productDetailRepo->findById($orderDetail->product_detail_id);
                $orderDetail->name = $product_detail->product->name;
                $orderDetail->size = $product_detail->size;
                $orderDetail->color = $product_detail->color;
            }
            Mail::to($info_delivery->user->email)->send(new SendEmailOrder($info_delivery, $orderDetails, $id));

            return $order;
        } elseif ($order->status == StatusOrder::Confirmed) {
            $dataUpdate = [
                'status' => StatusOrder::Canceled,
                'reason_reject' => $request->reason_reject,
                'admin_id' => Auth::guard('admin')->id(),
            ];
            $this->orderRepo->update($order, $dataUpdate);

            $this->changQuantity($order);

            return $order;
        } else {
            $dataUpdate = [
                'status' => StatusOrder::Canceled,
                'reason_reject' => $request->reason_reject,
                'admin_id' => Auth::guard('admin')->id(),
            ];
            $this->orderRepo->update($order, $dataUpdate);

            return $order;
        }
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

    // update quantity product when order is canceled
    public function changQuantity(Order $order)
    {
        $orderDetails = $order->orderDetails;
        foreach ($orderDetails as $key => $orderDetail) {
            $productDetail = $this->productDetailRepo->findById($orderDetail->product_detail_id);
            $quantity = $productDetail->quantity;
            $dataUpdate = ['quantity' => $quantity + $orderDetail->quantity];
            $this->productDetailRepo->update($productDetail, $dataUpdate);
        }
    }
}
