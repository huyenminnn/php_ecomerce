<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('bower_components/shopTemplate/manager_assets/production/images/favicon.ico') }}" type="image/ico"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tree Shop | Manager</title>

    <link href="{{ asset('bower_components/shopTemplate/manager_assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/shopTemplate/manager_assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/shopTemplate/manager_assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/shopTemplate/manager_assets/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/shopTemplate/manager_assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/shopTemplate/manager_assets/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('bower_components/shopTemplate/manager_assets/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/shopTemplate/manager_assets/build/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/shopTemplate/manager_assets/css/main.css') }}" rel="stylesheet">
    {{-- DataTable --}}
    <link href="{{ asset('bower_components/shopTemplate/manager_assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/shopTemplate/manager_assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/shopTemplate/manager_assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/shopTemplate/manager_assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/shopTemplate/manager_assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" id="mainMenu">
                        <a href="index.html" class="site_title">
                            <i class="fa fa-paw"></i> <span>Tree Shop</span>
                        </a>
                    </div>

                    <div class="clearfix"></div>
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="{{ asset('bower_components/shopTemplate/manager_assets/production/images/img.jpg') }}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>{{ trans('manager.layout.welcome') }}</span>
                            {{-- name --}}
                            <h2></h2>
                        </div>
                    </div>
                    <br />
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>{{ trans('manager.layout.manager') }}</h3>
                            <ul class="nav side-menu">
                              <li>
                                <a href="{{ route('products.index') }}">
                                    <i class="fa fa-home"></i> {{ trans('manager.layout.product') }} <span class="fa fa-chevron-down"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users.index') }}">
                                    <i class="fa fa-edit"></i> {{ trans('manager.layout.user') }} <span class="fa fa-chevron-down"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('orders.index') }}">
                                    <i class="fa fa-edit"></i> {{ trans('manager.layout.order') }} <span class="fa fa-chevron-down"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('suggest_products.index') }}">
                                    <i class="fa fa-edit"></i> {{ trans('manager.layout.suggestProduct') }} <span class="fa fa-chevron-down"></span>
                                </a>
                            </li>
                        </div>
                    </div>
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('bower_components/shopTemplate/manager_assets/production/images/img.jpg') }}" alt="">
                                    {{-- name --}}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li>
                                        @if(Auth::guard('admin')->check())
                                        <li>
                                            <form action="{{ route('admin.logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn">
                                                    <i class="fa fa-sign-out pull-right"></i> {{ trans('manager.layout.logout') }}
                                                </button>
                                            </form>
                                        </li>
                                        @endif
                                    </li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">0</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>{{ trans('manager.layout.seeAll') }}</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            @yield('content')

            <footer>
                <div class="pull-right">Tree Shop</div>
                <div class="clearfix"></div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/nprogress/nprogress.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/skycons/skycons.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/DateJS/build/date.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('bower_components/shopTemplate/manager_assets/vendors/pdfmake/build/vfs_fonts.js') }}"></script>

    <script src="{{ asset('bower_components/shopTemplate/manager_assets/build/js/custom.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    @yield('script')
</body>
</html>
