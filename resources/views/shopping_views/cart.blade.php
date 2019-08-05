@extends('layouts.shopping')

@section('content')
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m">
    <h2 class="l-text2 t-center text-danger">
        {{ trans('shopping.cart.cart') }}
    </h2>
</section>

<section class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
        @if (!$total)
            <h2 class="text-center text-danger">{{ trans('shopping.cart.nothing') }}</h2>
        @else
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
                <table class="table-shopping-cart">
                    <tr class="table-head">
                        <th class="column-1"></th>
                        <th class="column-2">{{ trans('shopping.cart.product') }}</th>
                        <th class="column-3">{{ trans('shopping.cart.price') }}</th>
                        <th class="column-4 p-l-70">{{ trans('shopping.cart.quantity') }}</th>
                        <th class="column-5">{{ trans('shopping.cart.total') }}</th>
                    </tr>

                    @foreach($cart as $key => $product)
                    <tr class="table-row" data-id="{{ $key }}">
                        <td class="column-1">
                            <div class="cart-img-product b-rad-4 o-f-hidden">
                                <img src="{{ asset('bower_components/shopTemplate/shopping_assets/images/item-10.jpg') }}" alt="IMG-PRODUCT">
                            </div>
                        </td>
                        <td class="column-2">{{ $product['name'] }}</td>
                        <td class="column-3">{{ number_format($product['price']) }}</td>
                        <td class="column-4">
                            <div class="flex-w bo5 of-hidden w-size17">
                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2 btn-minus" data-id="{{ $key }}">
                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                </button>

                                <input class="size8 m-text18 t-center number-product" type="number" name="" value="{{ $product['quantity'] }}" data-id="{{ $key }}">

                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2 btn-plus" data-id="{{ $key }}">
                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </td>
                        <td class="column-5 subTotal">{{ number_format($product['subTotal']) }}</td>
                        <td class="column-5"><button class="btn btn-danger delete" data-id="{{ $key }}">{{ trans('shopping.cart.delete') }}</button></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
            <div class="flex-w flex-m w-full-sm">

            </div>
            <div class="m-b-10">
                <span class="m-text22 w-size19 w-full-sm">
                {{ trans('shopping.cart.totalCart') }}
            </span>

            <span class="m-text24 w-size20 w-full-sm total-cart text-danger"> {{ number_format($total) }}</span>
            <span class="m-text24 w-size20 w-full-sm text-danger">{{ trans('shopping.cart.vnd') }}</span>
            </div>

            <div class="size10 trans-0-4 m-t-10 m-b-10">
                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 check-info">
                    {{ trans('shopping.layout.checkout') }}
                </button>
            </div>
        </div>

        <div class="bo9 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 p-lr-15-sm info-checkout">
            <h5 class="m-text20 p-b-24">
                {{ trans('shopping.cart.cartTotal') }}
            </h5>

            <div class="flex-w flex-sb-m p-b-12">
                <span class="s-text18 w-size19 w-full-sm">
                    {{ trans('shopping.cart.subtotal') }}
                </span>

                <span class="m-text21 w-size20 w-full-sm total">

                </span>
            </div>
            <form action="{{ route('shop.checkout') }}" method="post">
                @csrf
                <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                    <span class="s-text18 w-size19 w-full-sm">
                        {{ trans('shopping.cart.shipping') }}
                    </span>

                    <div class="w-size20 w-full-sm">
                        <span class="s-text19">
                            {{ trans('shopping.cart.feeShip') }}
                        </span>

                        <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
                            <select class="selection-2" name="info_delivery" id="info_delivery">
                                @foreach($info as $item)
                                    <option value="{{ $item->id }}">{{ $item->username }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex-w flex-sb-m p-t-26 p-b-30">
                    <span class="m-text22 w-size19 w-full-sm">
                        {{ trans('shopping.cart.total') }}
                    </span>

                    <span class="m-text21 w-size20 w-full-sm total">
                    </span>
                </div>

                <div class="size15 trans-0-4">
                    <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 checkoutCart" type="submit">
                        {{ trans('shopping.cart.checkout') }}
                    </button>
                </div>
            </form>
        </div>
        @endif
    </div>
</section>
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('js/cart.js') }}"></script>
@endsection
