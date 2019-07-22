<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ trans('manager.layout.login') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('manager_assets/login/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('manager_assets/login/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('manager_assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('manager_assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('manager_assets/login/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('manager_assets/login/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('manager_assets/login/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('manager_assets/login/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('manager_assets/login/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('manager_assets/login/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('manager_assets/login/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="{{ route('admin.login') }}" method="POST">
                    {{ csrf_field() }}
                    <span class="login100-form-title p-b-43">
                        {{ trans('manager.layout.login1') }}
                    </span>

                    @if ($errors->has('password') || $errors->has('email'))
                        <p class="errorLogin">
                            <strong class="errors">{{ trans('manager.layout.error') }}</strong>
                        </p>
                    @endif

                    <div class="wrap-input100 validate-input" data-validate = "">
                        <input id="email" class="input100 {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" value="{{ old('email') }}" required autofocus>
                        <span class="focus-input100"></span>
                        <span class="label-input100">{{ trans('manager.layout.email') }}</span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate="">
                        <input id="password" class="input100 {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" required="">

                        <span class="focus-input100"></span>
                        <span class="label-input100">{{ trans('manager.layout.password') }}</span>
                    </div>


                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                {{ trans('manager.layout.remember') }}
                            </label>
                        </div>

                        <div>
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            {{ trans('manager.layout.login') }}
                        </button>

                    </div>

                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">

                        </span>
                    </div>
                </form>

                <div class="login100-more" id="bg">
                </div>
            </div>
        </div>
    </div>

<!--===============================================================================================-->
    <script src="{{ asset('manager_assets/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
<!--===============================================================================================-->
    <script src="{{ asset('manager_assets/login/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('manager_assets/login/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{ asset('manager_assets/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('manager_assets/login/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('manager_assets/login/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{ asset('manager_assets/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('manager_assets/login/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('manager_assets/login/js/main.js')}}"></script>

</body>
</html>
