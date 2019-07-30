<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductDetail;
use App\Models\User;
use App\Enums\StatusOrder;

class OrderController extends Controller
{
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
        $orders = Order::get();

        return Datatables::of($orders)
            ->addColumn('action', function ($order) {
                $data = '<button type="button" class="btn btn-success btn-show" data-id="' . $order->id . '">' . trans('manager.layout.detail') . '</button>
                        <button type="button" class="btn btn-danger btn-delete" data-id="' . $order->id . '">' . trans('manager.layout.delete') . '</button>';

                return $data;
            })
            ->editColumn('total', function($order) {
                return number_format($order->total);
            })
            ->editColumn('status', function($order) {
                if ($order->status == StatusOrder::Confirmed) {
                    return '<h3><span class="label label-success">' . trans('manager.layout.confirm') . '</span></h3>';
                } elseif ($order->status == StatusOrder::Pending) {
                    return '<button type="button" class="btn btn-warning confirm" data-id="' . $order->id . '">' . trans('manager.layout.notConfirm') . '</button>';
                } else {
                    return '<h3><span class="label label-danger">' . trans('manager.order.canceled') . '</span></h3>';
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
        $order = Order::find($id);
        if (!$order) {
            return view('layouts.error');
        } elseif ($request->data == 'confirm') {
            $order->update([
                'status' => StatusOrder::Confirmed,
                'admin_id' => Auth::guard('admin')->id(),
            ]);

            return $order;
        } else {
            $order->update([
                'status' => StatusOrder::Canceled,
                'reason_reject' => $request->reason_reject,
                'admin_id' => Auth::guard('admin')->id(),
            ]);

            $this->changQuantity($order);

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
            $productDetail = ProductDetail::find($orderDetail->product_detail_id);
            $quantity = $productDetail->quantity;
            $productDetail->update(['quantity' => $quantity + $orderDetail->quantity]);
        }
    }
}
