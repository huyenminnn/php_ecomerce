@extends('layouts.shopping')

@section('content')

<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
    <div class="flex-w flex-sb">
        <div class="w-size13 p-t-30 respon5">
            <div class="wrap-slick3 flex-sb flex-w">
                <div class="wrap-slick3-dots"></div>

                <div class="slick3">
                    <div class="item-slick3" data-thumb="http://icdn.dantri.com.vn/thumb_w/640/2017/cayvannienthanh-1514519274210.jpg">
                        <div class="wrap-pic-w">
                            <img src="http://icdn.dantri.com.vn/thumb_w/640/2017/cayvannienthanh-1514519274210.jpg" alt="IMG-PRODUCT">
                        </div>
                    </div>

                    <div class="item-slick3" data-thumb="http://icdn.dantri.com.vn/thumb_w/640/2017/cayvannienthanh-1514519274210.jpg">
                        <div class="wrap-pic-w">
                            <img src="http://icdn.dantri.com.vn/thumb_w/640/2017/cayvannienthanh-1514519274210.jpg" alt="IMG-PRODUCT">
                        </div>
                    </div>

                    <div class="item-slick3" data-thumb="http://icdn.dantri.com.vn/thumb_w/640/2017/cayvannienthanh-1514519274210.jpg">
                        <div class="wrap-pic-w">
                            <img src="http://icdn.dantri.com.vn/thumb_w/640/2017/cayvannienthanh-1514519274210.jpg" alt="IMG-PRODUCT">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-size14 p-t-30 respon5">
            <h4 class="product-detail-name m-text16 p-b-13">
                {{ $product->name }}
            </h4>

            <span class="m-text17 font-weight-bold">
                {{ number_format($product->price) }} VND
            </span>

            <p class="s-text8 p-t-10">

            </p>

            <div class="p-t-33 p-b-60">
                <div class="flex-m flex-w p-b-10">
                    <div class="s-text15 w-size15 t-center">
                        {{ trans('shopping.home.size') }}
                    </div>

                    <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
                        <select class="selection-2" name="size" id="size">
                            @foreach($sizes as $size)
                                <option value="{{ $size }}">{{ $size }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex-m flex-w">
                    <div class="s-text15 w-size15 t-center">
                        {{ trans('shopping.home.color') }}
                    </div>

                    <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
                        <select class="selection-2" name="color" id="color">
                            @foreach($colors as $color)
                                <option value="{{ $color }}">{{ $color }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex-r-m flex-w p-t-10">
                    <div class="w-size16 flex-m flex-w">
                        <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                            <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                            </button>

                            <input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">

                            <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>

                        <div class="size9 trans-0-4 m-t-10 m-b-10">
                            <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" data-id="{{ $product->id }}" id="addToCart">
                                {{ trans('shopping.home.addToCart') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-b-45">
                <span class="s-text8 m-r-35">{{ trans('shopping.home.code') }} {{ $product->product_code}}</span>
                <span class="s-text8">{{ trans('shopping.home.categories') }} {{ $product->category_id }}</span>
            </div>
        </div>
    </div>
    <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
                <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                    {{ trans('shopping.home.description') }}
                </h5>

                <div class="dropdown-content dis-none p-t-15 p-b-23">
                    <p class="s-text8"></p>
                </div>
            </div>
</div>
@endsection
