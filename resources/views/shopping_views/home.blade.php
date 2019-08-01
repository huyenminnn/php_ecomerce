@extends('layouts.shopping')

@section('content')
    <section class="slide1">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1 item1-slick1" style="background-image: url('https://bizweb.dktcdn.net/100/290/228/themes/630285/assets/slider_1_image.png?1555494661059'); background-size: ;">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                            {{ trans('shopping.home.newArr') }}
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                            <a href="#" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                {{ trans('shopping.home.shopNow') }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item2-slick1" style="background-image: url('https://file.hstatic.net/1000273748/collection/banner_collection_master.jpg');">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
                            {{ trans('shopping.home.newArr') }}
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
                            <a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                {{ trans('shopping.home.shopNow') }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item3-slick1" style="background-image: url('http://cayxanhs.com/Upload/banner2.png');">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
                            {{ trans('shopping.home.newArr') }}
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
                            <a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                {{ trans('shopping.home.shopNow') }}
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="newproduct bgwhite p-t-45 p-b-105">
        <div class="container">
            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-center">
                    {{ trans('shopping.home.featuredProducts') }}
                </h3>
            </div>

            <div class="wrap-slick2">
                <div class="slick2">
                    @foreach($top_products as $product)
                        <div class="item-slick2 p-l-15 p-r-15">
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                    <img src="http://icdn.dantri.com.vn/thumb_w/640/2017/cayvannienthanh-1514519274210.jpg" alt="IMG-PRODUCT">

                                    <div class="block2-overlay trans-0-4">
                                        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                            <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                            <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a href="{{ route('shop.product', ['slug' => $product->slug]) }}" class="block2-name dis-block p-b-5">
                                        <h5 class="font-weight-bold">{{ $product->name }}</h5>
                                    </a>
                                    <span class="block2-price m-text6 p-r-5">{{ number_format($product->price) }} VND</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
