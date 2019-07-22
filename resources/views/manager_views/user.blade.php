@extends('layouts.manager')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{ trans('manager.user.users') }}</h3>
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
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="productTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ trans('manager.user.avatar') }}</th>
                                    <th>{{ trans('manager.user.name') }}</th>
                                    <th>{{ trans('manager.user.email') }}</th>
                                    <th>{{ trans('manager.user.address') }}</th>
                                    <th>{{ trans('manager.user.mobile') }}</th>
                                    <th>{{ trans('manager.user.createAt') }}</th>
                                    <th>{{ trans('manager.user.action') }}</th>
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
