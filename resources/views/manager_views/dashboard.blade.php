@extends('layouts.manager')

@section('content')
<div class="right_col" role="main">
    <div class="row tile_count">
        <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> {{ trans('manager.dashboard.totalUser') }}</span>
            <div class="count">{{ number_format($totalUsers) }}</div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-clock-o"></i> {{ trans('manager.dashboard.totalProduct') }}</span>
            <div class="count">{{ number_format($totalProducts) }}</div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> {{ trans('manager.dashboard.totalOrder') }}</span>
            <div class="count green">{{ number_format($totalOrders) }}</div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> {{ trans('manager.dashboard.revenue') }}</span>
            <div class="count">{{ number_format($revenue) }}</div>
        </div>
    </div>
    <!-- /top tiles -->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">
                <div class="row x_title">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <h3>{{ trans('manager.dashboard.monthlyOrder') }}</h3>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <h3>{{ trans('manager.dashboard.monthlyProduct') }}</h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="x_content row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <canvas id="orderChart"></canvas>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <canvas id="productChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>{{ trans('manager.dashboard.statistics') }}</h3>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="col-md-3">
                    <label for="">Start Time</label>
                    <input type="text" class="date" id="startTime" name="startTime">
                </div>
                <div class="col-md-3">
                    <label for="">End Time</label>
                    <input type="text" class="date" id="endTime" name="endTime">
                </div>
                <div class="col-md-3">
                    <input type="button" class="btn btn-info" value="Submit" id="statistics">
                </div>
            </div>
            <hr>
            <div class="row info-statistic">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="row">
                        <span class="h4 col-md-3">Orders: </span>
                        <span class="h3 col-md-9" id="order"></span>
                    </div>
                    <div class="row">
                        <span class="h4 col-md-3">Products sold: </span>
                        <span class="h3 col-md-9" id="product"></span>
                    </div>
                    <div class="row">
                        <span class="h4 col-md-3">New products: </span>
                        <span class="h3 col-md-9" id="newProduct"></span>
                    </div>
                    <div class="row">
                        <span class="h4 col-md-3">New users: </span>
                        <span class="h3 col-md-9" id="newUser"></span>
                    </div>
                    <div class="row">
                        <span class="h4 col-md-3">Revenue: </span>
                        <span class="h3 col-md-9" id="revenue"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/dashboard.js') }}"></script>
@endsection
