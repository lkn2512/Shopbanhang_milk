<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
	<title>Home | KN-Milk</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/prettyPhoto.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/price-range.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/main.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/responsive.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/sweetalert.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/carousel/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/carousel/css/style.css')}}">
	<style>
		.menu {
			height: 23%;
			background-image: url("{{URL::to('public/frontend/images/home/bgBlue.jpg')}}");
			background-size: cover;
		}
	</style>
</head>

<body>
	<div class="menu">
		<header id="header">
			<div class="header-middle">
				<div class="container-md">
					<div class="row">
						<div class="col-md-6">
							<div class="mainmenu">
								<ul class="nav navbar-nav collapse navbar-collapse">
									<li><a href="{{URL::to('/')}}" class="active"><i class="fa-solid fa-house"></i> Trang chủ</a></li>
									<li class="dropdown"><a href="#" class="active">Sản phẩm<i class="fa fa-angle-down"></i></a>
										<ul role="menu" class="sub-menu">
											<li><a href="{{URL::to('/')}}">Mới nhất</a></li>
											<li><a href="{{URL::to('/all-productss')}}">Tất cả</a></li>
										</ul>
									</li>
									<li class="dropdown"><a href="#" class="active">Blog<i class="fa fa-angle-down"></i></a>
										<ul role="menu" class="sub-menu">
											<li><a href="#">Blog List</a></li>
											<li><a href="#">Blog Single</a></li>
										</ul>
									</li>
									<li><a href="#" class="active"><i class="fa-solid fa-info"></i> Giới thiệu</a></li>
									<li><a href="contact-us" class="active"><i class="fa-solid fa-file-signature"></i> Liên hệ</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-6">
							<div class="mainmenu right">
								<ul class="nav navbar-nav collapse navbar-collapse">
									<li><a href="#" class="active"><i class="fa-solid fa-bell "></i> Thông báo</a></li>
									<li><a href="#" class="active"><i class="fa-solid fa-circle-question"></i> Hỗ trợ</a></li>
									<?php

									use Illuminate\Support\Facades\Session;

									$customer_id = Session::get('customer_id');
									$shipping_id = Session::get('shipping_id');
									?>
									@if ($customer_id != NULL)
									<li class="dropdown"><a href="#" class="active" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
											<i class="fa-solid fa-user"></i>
											<?php
											$name = Session::get('customer_name');
											if ($name) {
												echo  $name;
											}
											?>
										</a>
									</li>
									<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="width: 320px;">
										<div class="offcanvas-header">
											<h5 class="offcanvas-title" id="offcanvasRightLabel">
												<img class="img" src="{{URL::to('/public/frontend/images/home/user_img.png')}}">
												<?php
												$name = Session::get('customer_name');
												if ($name) {
													echo  $name;
												}
												?>
											</h5>
											<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
										</div>
										<div class="offcanvas-body">
											<a href="#"><i class="fa-solid fa-user"></i>&ensp;Thông tin cá nhân</a>
											<hr class="hrao">
											<a href="{{URL::to('/your-cart')}}"><i class="fa fa-shopping-cart"></i>&ensp;Giỏ hàng</a>
											<?php
											if (Session::get('cart')) {
											?>
												<a href="{{URL::to('/checkout')}}"><i class="fa-solid fa-credit-card"></i>&ensp;Thanh toán</a>
											<?php
											} else {
											?>
												<a href="{{URL::to('/your-cart')}}"><i class="fa-solid fa-credit-card"></i>&ensp;Thanh toán</a>
											<?php
											}
											?>
											<a href="#"><i class="fa fa-star"></i>&ensp;Danh sách yêu thích</a>
											<a href="#"><i class="fa-solid fa-clock-rotate-left"></i>&ensp;Lịch sử đặt hàng</a>
											<hr class="hrao">
											<a href="#"><i class="fa-solid fa-user-group"></i>&ensp;Hỗ trợ</a>
											<a href="#"><i class="fa-solid fa-gear"></i>&ensp;Cài đặt</a>
											<hr class="hrao">
											<a class="sign-out-text" href="{{URL::to('/logout-checkout')}}">Đăng xuất</a>
										</div>
									</div>
								</ul>
								@else
								<li><a href="{{URL::to('/register-checkout')}}"> Đăng ký</a></li>
								<li><a href="{{URL::to('/login-checkout')}}"> Đăng nhập</a></li>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-bottom">
				<div class="container-md">
					<div class="row">
						<div class="col-sm-2 offset-sm-2 ">
							<a class="img-logo" href="{{URL::to('/')}}"><img src="{{URL::to('public/frontend/images/home/logoKN.png')}}" alt="" /></a>
						</div>
						<div class="col-sm-8">
							<div class="search_box">
								<form action="{{URL::to('/search-items')}}" method="POST">
									{{csrf_field()}}
									<input type="text" name="keywords_submit" placeholder="Tìm kiếm" />
									<button type="submit" class="btn-search-info"><i class="fa-solid fa-magnifying-glass"></i></button>
									&ensp;<a href="{{URL::to('/your-cart')}}"><img src="{{URL::to('public/frontend/images/cart/cart.png')}}" class="cart-icon"></img></a>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
	</div><br><br>
	<section id="slider">
		<div class="container-md">
			<div class="row">
				<div class="col-md-3">
					@yield('category-home')
				</div>
				<div class="col-md-6">
					@yield('slider')
				</div>
				<div class="col-md-3">
					@yield('slider2')
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container-md">
			<div class="row">
				<!-- <div class="col-sm-3">
					<div class="shipping text-center">
						<img src="{{URL::to('public/frontend/images/home/ts.jpg')}}" alt="" />
					</div>
				</div> -->
				<div class="col-sm-12">
					<div class="row">
						@yield('content')
					</div>
					<div class="row">
						@yield('content-related')
					</div>
				</div>
			</div>

			<div class="row">
				@yield('content-popular')
			</div>

		</div>
	</section>
	<footer id="footer">
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<a href="{{URL::to('/')}}"><img src="{{URL::to('public/frontend/images/home/logoKN_blue.png')}}" alt="" style="width: auto; height:100px; margin-top: -px; margin-left: -20px;" /></a>
						</div>
					</div>
					<div class="col-sm-7">
						<section class="mb-4 text-center" style="padding-top: 30px;">
							<!-- Facebook -->
							<a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

							<!-- Twitter -->
							<a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

							<!-- Google -->
							<a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>

							<!-- Instagram -->
							<a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>

							<!-- Linkedin -->
							<a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>

							<!-- Github -->
							<a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
						</section>

						<section class="">
							<form action="">
								<div class="row d-flex justify-content-center">
									<strong class="text-center" style="padding-bottom: 20px;">Đăng ký để xem tin tức mới nhất của chúng tôi</strong>
									<div class="col-md-5 col-12">
										<div data-mdb-input-init class="form-outline mb-4">
											<input type="email" id="form5Example24" class="form-control" placeholder="Email" />
										</div>
									</div>
									<div class="col-auto">
										<button data-mdb-ripple-init type="submit" class="btn btn-success mb-4">
											Đăng ký
										</button>
									</div>
								</div>
							</form>
						</section>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="{{URL::to('public/frontend/images/home/map2.webp')}}" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Giới thiệu</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href=""><i class="fas fa-home me-3"></i>Cần thơ, 2024</li></a>
								<li><a href=""><i class="fas fa-phone me-3"></i>+ 01 234 567 88</li></a>
								<li><a href=""><i class="fas fa-print me-3"></i>+ 01 234 567 89</li></a>
								<li><a href=""><i class="fas fa-envelope me-3"></i>kn@gmail.com</li></a>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Dịch vụ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Giúp đỡ trực tuyến</a></li>
								<li><a href="#">Thay đổi địa điểm</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Chính sách</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Điều khoản sử dụng</a></li>
								<li><a href="#">Chính sách bảo mật</a></li>
								<li><a href="#">Chính sách hoàn tiền</a></li>
								<li><a href="#">Chính sách giao hàng</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Hữu ích</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Đơn đặt hàng</a></li>
								<li><a href="#">Định giá</a></li><br>
								<li><a href="#">Tuyển dụng</a></li>
								<li><a href="#">Tin tức</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h6 class="text-uppercase fw-bold mb-4">
								<i class="fas fa-gem me-3"></i>KN-MILK
							</h6>
							<p>
								Here you can use rows and columns to organize your footer content. Lorem ipsum
								dolor sit amet, consectetur adipisicing elit.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row text-center">
					<p class="pull-left">Copyright © 2024 - Lê Kim Ngọc - CK22V7K516.</p>
				</div>
			</div>
		</div>
	</footer>
	<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('public/frontend/js/main.js')}}"></script>

	<script src="{{asset('public/frontend/carousel/js/popper.min.js')}}"></script>
	<!-- <script src="{{asset('public/frontend/carousel/js/bootstrap.min.js')}}"></script> -->
	<script src="{{asset('public/frontend/carousel/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('public/frontend/carousel/js/main.js')}}"></script>

	<script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.add-to-cart').click(function() {
				var id = $(this).data('id');
				var cart_product_id = $('.cart_product_id_' + id).val();
				var cart_product_name = $('.cart_product_name_' + id).val();
				var cart_product_image = $('.cart_product_image_' + id).val();
				var cart_product_price = $('.cart_product_price_' + id).val();
				var cart_product_quantity = $('.cart_product_quantity_' + id).val();
				var cart_product_qty = $('.cart_product_qty_' + id).val();
				var cart_category_product = $('.cart_category_product_' + id).val();
				var cart_brand_product = $('.cart_brand_product_' + id).val();
				var _token = $('input[name="_token"]').val();

				if (parseInt(cart_product_qty) > parseInt(cart_product_quantity)) {
					alert("Số lượng bạn đặt đã vượt quá số lượng trong kho của chúng tôi");
				} else {
					$.ajax({
						url: "{{url('/add-cart-ajax')}}",
						method: 'POST',
						data: {
							cart_product_id: cart_product_id,
							cart_product_name: cart_product_name,
							cart_product_image: cart_product_image,
							cart_product_price: cart_product_price,
							cart_product_qty: cart_product_qty,
							cart_category_product: cart_category_product,
							cart_brand_product: cart_brand_product,
							cart_product_quantity: cart_product_quantity,
							_token: _token
						},
						success: function(data) {
							swal({
									title: "Sản phẩm đã được thêm vào giỏ hàng",
									text: "   ",
									imageUrl: "{{URL::to('/public/frontend/images/cart/check.png')}}",
									showCancelButton: true,
									cancelButtonText: "Mua tiếp",
									confirmButtonClass: "bg-success text-white",
									confirmButtonText: "Xem giỏ hàng",
									closeOnConfirm: false
								},
								function() {
									window.location.href = "{{url('/your-cart')}}";
								});
						}
					});
				}
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.choose').on('change', function() {
				var action = $(this).attr('id');
				var ma_id = $(this).val();
				var _token = $('input[name="_token"]').val();
				var result = "";
				if (action == 'city') {
					result = 'province';
				} else {
					result = 'wards';
				}
				$.ajax({
					url: "{{url('/select-delivery-home')}}",
					method: 'POST',
					data: {
						action: action,
						ma_id: ma_id,
						_token: _token
					},
					success: function(data) {
						$('#' + result).html(data);
					}
				});
			});
			$('.calculate_delivery').click(function() {
				var matp = $('.city').val();
				var maqh = $('.province').val();
				var xaid = $('.wards').val();
				var _token = $('input[name="_token"]').val();
				if (matp == '' && maqh == '' && xaid == '') {
					alert("Vui lòng chọn địa chỉ");
				} else {
					$.ajax({
						url: "{{url('/calculate-fee')}}",
						method: 'POST',
						data: {
							matp: matp,
							maqh: maqh,
							xaid: xaid,
							_token: _token
						},
						success: function(data) {
							location.reload();
						}
					});
				}
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.send_order').click(function() {
				swal({
						title: "Xác nhận đơn hàng!",
						text: "Bạn có chắc là muốn đặt đơn hàng này?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-primary",
						confirmButtonText: "Xác nhận",
						cancelButtonText: "Suy nghĩ lại",
						closeOnConfirm: false,
						closeOnCancel: false
					},
					function(isConfirm) {
						if (isConfirm) {
							var shipping_name = $('.shipping_name').val();
							var shipping_phone = $('.shipping_phone').val();
							var shipping_address = $('.shipping_address').val();
							var shipping_notes = $('.shipping_notes').val();
							var shipping_email = $('.shipping_email').val();
							var shipping_method = $('.payment_select').val();
							var order_fee = $('.order_fee').val();
							var order_coupon = $('.order_coupon').val();

							var _token = $('input[name="_token"]').val();

							$.ajax({
								url: "{{url('/confirm-order')}}",
								method: 'POST',
								data: {
									shipping_name: shipping_name,
									shipping_phone: shipping_phone,
									shipping_address: shipping_address,
									shipping_notes: shipping_notes,
									shipping_email: shipping_email,
									shipping_method: shipping_method,
									order_fee: order_fee,
									order_coupon: order_coupon,
									_token: _token
								},
								success: function(data) {
									swal("Đặt hàng thành công!", "Chúng tôi đã nhận được đơn đặt hàng của bạn.", "success");
								},
							});
							window.setTimeout(function() {
								location.reload();
							}, 3000);
						} else {
							swal("Đã huỷ", "Đơn hàng của bạn hiện chưa được xử lý", "error");
						}
					});

			});
		});
	</script>

</body>

</html>