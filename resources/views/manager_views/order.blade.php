@extends('layouts.manager')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{ trans('manager.order.orders') }}</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
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
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="productTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ trans('manager.order.code') }}</th>
                                    <th>{{ trans('manager.order.total') }}</th>
                                    <th>{{ trans('manager.order.customer') }}</th>
                                    <th>{{ trans('manager.order.address') }}</th>
                                    <th>{{ trans('manager.order.mobile') }}</th>
                                    <th>{{ trans('manager.order.status') }}</th>
                                    <th>{{ trans('manager.order.delivery') }}</th>
                                    <th>{{ trans('manager.order.createAt') }}</th>
                                    <th>{{ trans('manager.order.action') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
