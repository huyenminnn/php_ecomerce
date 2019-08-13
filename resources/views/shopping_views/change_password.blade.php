@extends('layouts.shopping')

@section('content')
<section class="cart bgwhite p-t-70 p-b-100">
    <h1 class="text-center text-danger p-b-100">{{ trans('shopping.user.changePassword') }}</h1>

    <section class="bgwhite p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-b-30">
                    <form class="leave-comment" method="POST" action="{{ route('shop.changePassword') }}">
                        @csrf
                        <label for="">{{ trans('shopping.user.newPass') }}</label>
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="newPass" placeholder="" value="">
                        </div>
                        <label for="">{{ trans('shopping.user.confirmPass') }}</label>
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="confirmPass" placeholder="" value="">
                        </div>
                        <div class="w-size25">
                            <button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="submit">
                                {{ trans('shopping.user.submit') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
