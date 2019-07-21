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
                                    <th>{{ trans('manager.product.price') }}</th>
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
@endsection
