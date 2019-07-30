<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forest Shop</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('bower_components/shopTemplate/shopping_assets/images/icons/favicon.png') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/shopTemplate/shopping_assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/shopTemplate/shopping_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/shopTemplate/shopping_assets/fonts/themify/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/shopTemplate/shopping_assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/shopTemplate/shopping_assets/fonts/elegant-font/html-css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/shopTemplate/shopping_assets/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/shopTemplate/shopping_assets/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/shopTemplate/shopping_assets/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/shopTemplate/shopping_assets/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/shopTemplate/shopping_assets/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/shopTemplate/shopping_assets/vendor/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/shopTemplate/shopping_assets/vendor/lightbox2/css/lightbox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/shopTemplate/shopping_assets/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/shopTemplate/shopping_assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<body class="animsition">
    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
            <div class="p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 p-lr-15-sm">
                <h5>{{ trans('shopping.email.hello') }}</h5>
                {{ trans('shopping.email.header') }}
            </div>
            <div class="container-table-cart pos-relative">

                <h1 class="text-center text-danger">{{ trans('shopping.history.orderDetail') }}</h1>
                <div class="bo9 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 p-lr-15-sm">
                    <h2>{{ trans('shopping.history.info') }}</h2>
                    <div class="flex-w flex-sb-m p-b-12 m-t-30 p-l-40">
                        <span class="s-text18 w-size19 w-full-sm">
                            {{ trans('shopping.history.username') }}
                        </span>
                        <span class="m-text21 w-size20 w-full-sm total">
                            {{-- {{ $info_delivery->username }} --}}
                        </span>
                    </div>
                    <div class="flex-w flex-sb-m p-b-12 m-t-30 p-l-40">
                        <span class="s-text18 w-size19 w-full-sm">
                            {{ trans('shopping.history.numPhone') }}
                        </span>
                        <span class="m-text21 w-size20 w-full-sm total">
                            {{-- {{ $info_delivery->mobile }} --}}
                        </span>
                    </div>
                    <div class="flex-w flex-sb-m p-b-12 m-t-30 p-l-40">
                        <span class="s-text18 w-size19 w-full-sm">
                            {{ trans('shopping.history.address') }}
                        </span>
                        <span class="m-text21 w-size20 w-full-sm total">
                            {{-- {{ $info_delivery->address }} --}}
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

                        {{-- @foreach($orderDetails as $product)
                            <tr class="table-row">
                                <td class="column-1">{{ $product->name }}</td>
                                <td class="column-3">{{ $product->quantity }}</td>
                                <td class="column-3">{{ $product->size }}</td>
                                <td class="column-3">{{ $product->color }}</td>
                                <td class="column-3">{{ number_format($product->total) }}</td>
                            </tr>
                            @endforeach --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="{{ asset('bower_components/shopTemplate/shopping_assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/shopTemplate/shopping_assets/vendor/animsition/js/animsition.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/shopTemplate/shopping_assets/vendor/bootstrap/js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/shopTemplate/shopping_assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/shopTemplate/shopping_assets/vendor/select2/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/shopTemplate/shopping_assets/vendor/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/shopTemplate/shopping_assets/js/slick-custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/shopTemplate/shopping_assets/vendor/countdowntime/countdowntime.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/shopTemplate/shopping_assets/vendor/lightbox2/js/lightbox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/shopTemplate/shopping_assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <script type="text/javascript" src="{{ asset('bower_components/shopTemplate/shopping_assets/js/extra.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/shopping_assets/js/main.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    @yield('script')
</body>
</html>
