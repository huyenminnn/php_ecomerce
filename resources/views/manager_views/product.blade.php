@extends('layouts.manager')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{ trans('manager.product.products') }}</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="{{ trans('manager.product.searchFor') }}">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">{{ trans('manager.product.search') }}</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="#" class="btn btn-info btn-add">{{ trans('manager.product.add') }}</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="productTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ trans('manager.product.code') }}</th>
                                    <th>{{ trans('manager.product.name') }}</th>
                                    <th>{{ trans('manager.product.thumbnail') }}</th>
                                    <th>{{ trans('manager.product.category') }}</th>
                                    <th>{{ trans('manager.product.creator') }}</th>
                                    <th>{{ trans('manager.product.createAt') }}</th>
                                    <th>{{ trans('manager.product.action') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Add product --}}
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" id="form-add" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{ trans('manager.product.add') }}</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">{{ trans('manager.product.name') }}<span class="required"> *</span></label>
                        <input type="text" class="form-control" id="name-add" name="name">

                        <label for="">{{ trans('manager.product.code') }}<span class="required"> *</span></label>
                        <input type="text" class="form-control" id="product-code-add" name="product_code">

                        <label for="">{{ trans('manager.product.category') }}<span class="required"> *</span></label>
                        <select class="form-control" id="category-add" name="category_id">
                            @foreach($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>

                        <label for="">{{ trans('manager.product.slug') }}<span class="required"> *</span></label>
                        <input type="text" class="form-control" id="slug-add" name="slug">

                        <label for="">{{ trans('manager.product.price') }}<span class="required"> *</span></label>
                        <input type="number" class="form-control" id="price-add" name="price">

                        <label for="">{{ trans('manager.product.size') }}<span class="required"> *</span></label>
                        <input type="text" class="form-control" id="size-add" name="size">

                        <label for="">{{ trans('manager.product.color') }}<span class="required"> *</span></label>
                        <input type="text" class="form-control" id="color-add" name="color">

                        <label for="">{{ trans('manager.product.quantity') }}<span class="required"> *</span></label>
                        <input type="number" class="form-control" id="quantity-add" name="quantity">

                        <label for="">{{ trans('manager.product.description') }}</label>
                        <textarea type="text" class="form-control" id="description-add" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('manager.layout.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('manager.layout.add') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/product.js') }}"></script>
@endsection
