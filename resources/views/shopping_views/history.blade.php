@extends('layouts.shopping')

@section('content')

<section class="cart bgwhite p-t-70 p-b-100">
    <h1 class="text-center text-danger">{{ trans('shopping.history.orders') }}</h1>
    <div class="container">
        @if (!$orders)
            <h2 class="text-center text-danger">{{ trans('shopping.history.nothing') }}</h2>
        @else
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
                <table class="table-shopping-cart">
                    <tr class="table-head">
                        <th class="column-1">{{ trans('shopping.history.orderCode') }}</th>
                        <th class="column-3">{{ trans('shopping.history.total') }}</th>
                        <th class="column-3">{{ trans('shopping.history.createAt') }}</th>
                        <th class="column-3">{{ trans('shopping.history.status') }}</th>
                    </tr>

                    @foreach($orders as $order)
                    <tr class="table-row" data-id="{{ $order->id }}">
                        <td class="column-1">{{ $order->order_code }}</td>
                        <td class="column-2">{{ number_format($order->total) }}</td>
                        <td class="column-2">{{ date_format($order->created_at, 'H:i d/m/Y') }}</td>
                        <td class="column-2">
                            @if ($order->status == config('constant.pending'))
                                <h4><span class="label label-warning">{{ trans('shopping.history.notConfirm') }}</span></h4>
                            @elseif ($order->status == config('constant.confirmed'))
                                <h4><span class="label label-success">{{ trans('shopping.history.confirm') }}</span></h4>
                            @else
                                <h4><span class="label label-danger">{{ trans('shopping.history.cancel') }}</span></h4>
                            @endif
                        </td>

                        <td class="column-3"><a class="btn btn-warning detail" target="_blank" href="{{ route('shop.getDetailOrder', ['id' => $order->id]) }}">{{ trans('shopping.history.detail') }}</a></td>
                        @if ($order->status == config('constant.pending'))
                            <td class="column-3"><button class="btn btn-danger delete" data-id="{{ $order->id }}">{{ trans('shopping.cart.delete') }}</button></td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
