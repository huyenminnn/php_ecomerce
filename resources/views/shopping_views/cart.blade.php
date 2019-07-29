@extends('layouts.shopping')

@section('content')
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{ asset('bower_components/shopTemplate/shopping_assets/images/heading-pages-01.jpg') }});">
        <h2 class="l-text2 t-center">
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

                            @foreach($cart as $product)
                                <tr class="table-row">
                                    <td class="column-1">
                                        <div class="cart-img-product b-rad-4 o-f-hidden">
                                            <img src="{{ asset('bower_components/shopTemplate/shopping_assets/images/item-10.jpg') }}" alt="IMG-PRODUCT">
                                        </div>
                                    </td>
                                    <td class="column-2">{{ $product['name'] }}</td>
                                    <td class="column-3">{{ number_format($product['price']) }}</td>
                                    <td class="column-4">
                                        <div class="flex-w bo5 of-hidden w-size17">
                                            <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                            </button>

                                            <input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="{{ $product['quantity'] }}">

                                            <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="column-5">{{ number_format($product['subTotal']) }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                    <div class="flex-w flex-m w-full-sm">
                        <div class="size11 bo4 m-r-10">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
                        </div>

                        <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                            <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                {{ trans('shopping.cart.coupon') }}
                            </button>
                        </div>
                    </div>

                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                            {{ trans('shopping.cart.updateCart') }}
                        </button>
                    </div>
                </div>

                <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                    <h5 class="m-text20 p-b-24">
                        {{ trans('shopping.cart.cartTotal') }}
                    </h5>

                    <div class="flex-w flex-sb-m p-b-12">
                        <span class="s-text18 w-size19 w-full-sm">
                            {{ trans('shopping.cart.subtotal') }}
                        </span>

                        <span class="m-text21 w-size20 w-full-sm">
                            {{ number_format($total) }}
                        </span>
                    </div>

                    <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                        <span class="s-text18 w-size19 w-full-sm">
                            {{ trans('shopping.cart.shipping') }}
                        </span>

                        <div class="w-size20 w-full-sm">
                            <span class="s-text19">
                                {{ trans('shopping.cart.feeShip') }}
                            </span>

                            <div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">

                            </div>

                            <div class="size13 bo4 m-b-12">
                            <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="state" placeholder="State /  country">
                            </div>

                            <div class="size13 bo4 m-b-22">
                                <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="postcode" placeholder="Postcode / Zip">
                            </div>

                            <div class="size14 trans-0-4 m-b-10">
                                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                    {{ trans('shopping.cart.updateTotal') }}
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="flex-w flex-sb-m p-t-26 p-b-30">
                        <span class="m-text22 w-size19 w-full-sm">
                            {{ trans('shopping.cart.total') }}
                        </span>

                        <span class="m-text21 w-size20 w-full-sm">
                            {{ number_format($total) }}
                        </span>
                    </div>

                    <div class="size15 trans-0-4">
                        <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                            {{ trans('shopping.cart.checkout') }}
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
