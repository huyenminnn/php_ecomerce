<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ trans('shopping.user.Registration') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- MATERIAL DESIGN ICONIC FONT -->
        <link rel="stylesheet" href="{{ asset('bower_components/shopTemplate/shopping_assets/register/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">

        <!-- STYLE CSS -->
        <link rel="stylesheet" href="{{ asset('bower_components/shopTemplate/shopping_assets/register/css/style.css') }}">
    </head>

    <body>
        <div class="wrapper" id="main">
            <div class="inner">
                <form action="{{ route('register') }}" method="POST">
                    <h3>{{ trans('shopping.user.RegistrationForm') }}</h3>

                    @csrf
                    <div class="form-wrapper">
                        <label for="">{{ trans('shopping.user.name') }} <span class="req">*</span> </label>
                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                    </div>

                    <div class="form-wrapper">
                        <label for="">{{ trans('shopping.user.email') }} <span class="req">*</span> </label>
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <div class="form-wrapper">
                            <label for="">{{ trans('shopping.user.password') }} <span class="req">*</span> </label>
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        </div>
                        <div class="form-wrapper">
                            <label for="">{{ trans('shopping.user.comfpassword') }} <span class="req">*</span> </label>
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-wrapper">
                        <label for="">{{ trans('shopping.user.mobile') }} <span class="req">*</span> </label>
                        <input type="text" class="form-control" required="" name="mobile">
                    </div>

                    <div class="form-wrapper">
                        <label for="">{{ trans('shopping.user.address') }} <span class="req">*</span> </label>
                        <input type="text" class="form-control" required="" name="address">
                    </div>

                    <button type="submit">{{ trans('shopping.user.registerNow') }}</button>
                </form>
            </div>
        </div>
    </body>
</html>
