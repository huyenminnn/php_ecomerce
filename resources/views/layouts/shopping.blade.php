<!DOCTYPE html>
<html lang="en">
<head>
	<title>Forest Shop</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('shopping_assets/images/icons/favicon.png') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('shopping_assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('shopping_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('shopping_assets/fonts/themify/themify-icons.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('shopping_assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('shopping_assets/fonts/elegant-font/html-css/style.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('shopping_assets/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('shopping_assets/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('shopping_assets/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('shopping_assets/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('shopping_assets/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('shopping_assets/vendor/slick/slick.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('shopping_assets/vendor/lightbox2/css/lightbox.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('shopping_assets/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('shopping_assets/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<span class="topbar-child1">
					{{ __('shopping.layout.freeship') }}
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						forestshop@gmail.com
					</span>

					<div class="topbar-language rs1-select2">
						
					</div>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.html" class="logo">
					<img src="{{ asset('shopping_assets/images/icons/logo.png') }}" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li class="sale-noti">
								<a href="#">{{ trans('shopping.layout.home') }}</a>
							</li>

							<li>
								<a href="#">{{ trans('shopping.layout.shop') }}</a>
							</li>

							<li>
								<a href="#">{{ trans('shopping.layout.bestSeller') }}</a>
							</li>

							<li>
								<a href="#">{{ trans('shopping.layout.blog') }}</a>
							</li>

							<li>
								<a href="#">{{ trans('shopping.layout.about') }}</a>
							</li>

							<li>
								<a href="#">{{ trans('shopping.layout.contact') }}</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="{{ asset('shopping_assets/images/icons/icon-header-01.png') }}" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="{{ asset('shopping_assets/images/icons/icon-header-02.png') }}" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									
								</li>
							</ul>

							<div class="header-cart-total">
								{{ trans('shopping.layout.total') }}
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										{{ trans('shopping.layout.cart') }}
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										{{ trans('shopping.layout.checkout') }}
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.html" class="logo-mobile">
				<img src="{{ asset('shopping_assets/images/icons/logo.png') }}" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="{{ asset('shopping_assets/images/icons/icon-header-01.png') }}" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="{{ asset('shopping_assets/images/icons/icon-header-02.png') }}" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									
								</li>
							</ul>

							<div class="header-cart-total">
								{{ trans('shopping.layout.total') }}
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										{{ trans('shopping.layout.cart') }}
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										{{ trans('shopping.layout.checkout') }}
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							{{ __('shopping.layout.freeship') }}
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								forestshop@gmail.com
							</span>

							<div class="topbar-language rs1-select2">
								
							</div>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="index.html">{{ __('shopping.layout.home') }}</a>
					</li>

					<li class="item-menu-mobile">
						<a href="product.html">{{ __('shopping.layout.shop') }}</a>
					</li>

					<li class="item-menu-mobile">
						<a href="product.html">{{ __('shopping.layout.bestSeller') }}</a>
					</li>

					<li class="item-menu-mobile">
						<a href="blog.html">{{ __('shopping.layout.blog') }}</a>
					</li>

					<li class="item-menu-mobile">
						<a href="about.html">{{ __('shopping.layout.about') }}</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.html">{{ __('shopping.layout.contact') }}</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
    
    @yield('content')

	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					{{ __('shopping.layout.getInTouch') }}
				</h4>

				<div>
					<p class="s-text7 w-size27">
						{{ __('shopping.layout.address') }}
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					{{ __('shopping.layout.categories') }}
				</h4>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					{{ __('shopping.layout.link') }}
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							{{ __('shopping.layout.search') }}
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							{{ __('shopping.layout.aboutUs') }}
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							{{ __('shopping.layout.contactUs') }}
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							{{ __('shopping.layout.return') }}
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					{{ __('shopping.layout.help') }}
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							{{ __('shopping.layout.trackOrder') }}
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							{{ __('shopping.layout.return') }}
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							{{ __('shopping.layout.shipping') }}
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							{{ __('shopping.layout.FAQs') }}
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					{{ __('shopping.layout.email') }}
				</h4>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="{{ asset('shopping_assets/images/icons/paypal.png') }}" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="{{ asset('shopping_assets/images/icons/visa.png') }}" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="{{ asset('shopping_assets/images/icons/mastercard.png') }}" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="{{ asset('shopping_assets/images/icons/express.png') }}" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="{{ asset('shopping_assets/images/icons/discover.png') }}" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				MinhHuyen
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('shopping_assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('shopping_assets/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('shopping_assets/vendor/bootstrap/js/popper.js') }}"></script>
	<script type="text/javascript" src="{{ asset('shopping_assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('shopping_assets/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('shopping_assets/vendor/slick/slick.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('shopping_assets/js/slick-custom.js') }}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('shopping_assets/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('shopping_assets/vendor/lightbox2/js/lightbox.min.js') }}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('shopping_assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('shopping_assets/js/extra.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('shopping_assets/js/main.js') }}"></script>
</body>
</html>
