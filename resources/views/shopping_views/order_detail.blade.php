@extends('layouts.shopping')

@section('content')

<section class="cart bgwhite p-t-70 p-b-100">
    <h1 class="text-center text-danger">{{ trans('shopping.history.orderDetail') }}</h1>
    <div class="container">
        <div class="container-table-cart pos-relative">
            <div class="bo9 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 p-lr-15-sm">
                <h2>{{ trans('shopping.history.info') }}</h2>
                <div class="flex-w flex-sb-m p-b-12 m-t-30 p-l-40">
                    <span class="s-text18 w-size19 w-full-sm">
                        {{ trans('shopping.history.username') }}
                    </span>
                    <span class="m-text21 w-size20 w-full-sm total">
                        {{ $info_delivery->username }}
                    </span>
                </div>
                <div class="flex-w flex-sb-m p-b-12 m-t-30 p-l-40">
                    <span class="s-text18 w-size19 w-full-sm">
                        {{ trans('shopping.history.numPhone') }}
                    </span>
                    <span class="m-text21 w-size20 w-full-sm total">
                        {{ $info_delivery->mobile }}
                    </span>
                </div>
                <div class="flex-w flex-sb-m p-b-12 m-t-30 p-l-40">
                    <span class="s-text18 w-size19 w-full-sm">
                        {{ trans('shopping.history.address') }}
                    </span>
                    <span class="m-text21 w-size20 w-full-sm total">
                        {{ $info_delivery->address }}
                    </span>
                </div>
            </div>

            <div class="bo9 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 p-lr-15-sm">
                <div class="wrap-table-shopping-cart bgwhite">
                    <h2>{{ trans('shopping.history.products') }}</h2>
                    <table class="table-shopping-cart">
                        <tr class="table-head">
                            <th class="column-1">{{ trans('shopping.history.name') }}</th>
                            <th class="column-3">{{ trans('shopping.history.quantity') }}</th>
                            <th class="column-3">{{ trans('shopping.history.size') }}</th>
                            <th class="column-3">{{ trans('shopping.history.color') }}</th>
                            <th class="column-3">{{ trans('shopping.history.total') }}</th>
                        </tr>

                        @foreach($orderDetails as $product)
                            <tr class="table-row">
                                <td class="column-1">{{ $product->name }}</td>
                                <td class="column-3">{{ $product->quantity }}</td>
                                <td class="column-3">{{ $product->size }}</td>
                                <td class="column-3">{{ $product->color }}</td>
                                <td class="column-3">{{ number_format($product->total) }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
