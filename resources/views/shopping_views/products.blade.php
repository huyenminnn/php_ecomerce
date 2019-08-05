@extends('layouts.shopping')

@section('content')
<section class="cart bgwhite p-t-70 p-b-100">
    <h1 class="text-center text-danger p-b-100">{{ $category->name }}</h1>

    <div class="container">
        <div class="row">
        @foreach($productsWithCategory as $product)

        <div class="col-md-3 p-b-70">
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
</section>
@endsection
