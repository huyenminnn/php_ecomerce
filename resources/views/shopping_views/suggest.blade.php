@extends('layouts.shopping')

@section('content')
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m">
        <h2 class="l-text2 t-center text-danger">
            {{ trans('shopping.suggest.product') }}
        </h2>
    </section>

    <section class="bgwhite p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-b-30">
                    <form class="leave-comment" method="POST" action="{{ route('shop.suggest_products.store') }}">
                        <h4 class="m-text26 p-b-36 p-t-15">
                            {{ trans('shopping.suggest.sendMess') }}
                        </h4>
                        @csrf

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="product" placeholder="Name Product">
                        </div>

                        <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Message"></textarea>

                        <div class="w-size25">
                            <button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="submit">
                                {{ trans('shopping.suggest.send') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
