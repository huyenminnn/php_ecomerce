@extends('layouts.shopping')

@section('content')
<section class="cart bgwhite p-t-70 p-b-100">
    <h1 class="text-center text-danger p-b-100">{{ trans('shopping.user.profile') }}</h1>

    <section class="bgwhite p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-b-30">
                    <form class="leave-comment" method="POST" action="{{ route('shop.editProfile') }}">
                        @csrf
                        <label for="">{{ trans('shopping.user.name') }}</label>
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="" value="{{ $user->name }}">
                        </div>

                        <label for="">{{ trans('shopping.user.email') }}</label>
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="" value="{{ $user->email }}">
                        </div>

                        <label for="">{{ trans('shopping.user.mobile') }}</label>
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="mobile" placeholder="" value="{{ $user->mobile }}">
                        </div>

                        <label for="">{{ trans('shopping.user.address') }}</label>
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="address" placeholder="" value="{{ $user->address }}">
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
