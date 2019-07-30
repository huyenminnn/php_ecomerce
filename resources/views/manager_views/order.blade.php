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
                        <table id="orderTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ trans('manager.order.code') }}</th>
                                    <th>{{ trans('manager.order.total') }}</th>
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

<div class="modal fade modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" id="form-delete" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{ trans('manager.order.reason_reject') }}</h4>
                </div>
                <input type="hidden" name="order_id" id="order_id">
                <div class="modal-body">
                    <label for="">{{ trans('manager.order.reason_reject') }}</label>
                    <textarea type="text" class="form-control" id="reason_reject" name="reason_reject" rows="3"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">{{ trans('manager.layout.delete') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('js/order.js') }}"></script>
@endsection
