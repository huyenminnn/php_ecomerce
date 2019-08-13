@extends('layouts.shopping')

@section('content')
<section class="cart bgwhite p-t-70 p-b-100">
    <h1 class="text-center text-danger p-b-100">{{ trans('shopping.user.profile') }}</h1>

    <section class="bgwhite p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-b-30">
                    <div class="size15 m-b-20">
                        <label for="" class="col-md-2">{{ trans('shopping.user.name') }}</label>
                        <b class="p-l-40 p-r-22 p-t-10">{{ $user->name }}</b>
                    </div>

                    <div class="size15 m-b-20">
                        <label for=""  class="col-md-2">{{ trans('shopping.user.email') }}</label>
                        <b class="p-l-40 p-r-22 p-t-10">{{ $user->email }}</b>
                    </div>

                    <div class="size15 m-b-20">
                        <label for=""  class="col-md-2">{{ trans('shopping.user.mobile') }}</label>
                        <b class="p-l-40 p-r-22 p-t-10">{{ $user->mobile }}</b>
                    </div>

                    <div class="size15 m-b-20">
                        <label for=""  class="col-md-2">{{ trans('shopping.user.address') }}</label>
                        <b class="p-l-40 p-r-22 p-t-10">{{ $user->address }}</b>
                    </div>

                    <label for="" class="col-md-2">{{ trans('shopping.user.info') }}</label>
                    @foreach($infoDelivery as $item)
                        <div class="bo4 m-b-20">
                            <h6 class="p-l-22 p-r-22 p-t-10">
                                <b>{{ $item->username }}</b>
                            </h6>
                            <p class="p-l-40 p-r-22 p-t-10">{{ trans('shopping.user.mobile') }}: {{ $item->mobile }}</p>
                            <p class="p-l-40 p-r-22 p-t-10">{{ trans('shopping.user.address') }}: {{ $item->address }}</p>
                            <p class="p-l-40 p-r-22 p-t-10">{{ trans('shopping.user.note') }}: {{ $item->note }}</p>
                        </div>
                    @endforeach


                    <div class="row">
                        <div class="col-md-3">
                            <a class="flex-c-m bg1 bo-rad-23 hov1 m-text3 trans-0-4 btn text-light" type="submit" href="{{ route('shop.profile') }}">
                                {{ trans('shopping.user.editProfile') }}
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="flex-c-m bg1 bo-rad-23 hov1 m-text3 trans-0-4 btn text-light" type="submit" href="{{ route('shop.profile') }}">
                                {{ trans('shopping.user.addInfo') }}
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a class="flex-c-m bg1 bo-rad-23 hov1 m-text3 trans-0-4 btn text-light" type="submit" href="{{ route('shop.showChangePassword') }}">
                                {{ trans('shopping.user.changePassword') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
