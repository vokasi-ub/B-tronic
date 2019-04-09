@extends('frontend.master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/plugins/slick-1.8.0/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/styles/responsive.css') }}">
@endsection
@section('content')
	<div class="banner">
		<div class="banner_background" style="background-image:url(images/banner_background.jpg)"></div>
		<div class="container fill_height">
			<div class="row fill_height">
				<div class="banner_product_image"><img src="/frontend/home/images/banner_product.png" alt=""></div>
				<div class="col-lg-5 offset-lg-4 fill_height">
					<div class="banner_content">
						<h1 class="banner_text">new era of smartphones</h1>
						<div class="banner_price"><span>$530</span>$460</div>
						<div class="banner_product_name">Apple Iphone 6s</div>
						<div class="button banner_button"><a href="#">Shop Now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="new_arrivals" style="margin-top:-40px">
		<div class="container">
		
			<hr>
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">Product Iklan Terbaru</div>
							<ul class="clearfix">
								<div id="myBtnContainer">
								<li class="active">All Product</li>
								</div>
							</ul>
							
						</div>
						<div class="row">
							<div class="col-md-10" style="z-index:1;">
								<!-- Product Panel -->
								<div class="product_panel panel active">
									<div class="arrivals_slider slider">
										<!-- Slider Item -->
										@foreach($product as $p)
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
										
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('/images/product/'.array_first(json_decode($p->img))) }}" alt=""></div>
												<div class="product_content">
													<div class="product_price">Rp.{{number_format($p->harga,0)}}</div>
													<div class="product_name"><div><a href="{{url('/')}}">{{ $p->nama_product }}</a></div></div>
													<div class="product_extras">
														<a href="/detail-product/{{encrypt($p->id)}}"><button class="product_cart_button">View</button></a>
													</div>
												</div>
												<div class="product_fav" style="margin-top:-15px"><i class="fas fa-heart"></i></div>
												<ul class="product_marks" style="margin-top:-15px">
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>
										<br>
										@endforeach
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>
								
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">				
						<!-- Brands Slider -->
						<div class="owl-carousel owl-theme brands_slider">
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/frontend/home/images/brands_1.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/frontend/home/images/brands_2.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/frontend/home/images/brands_3.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/frontend/home/images/brands_4.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/frontend/home/images/brands_5.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/frontend/home/images/brands_6.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/frontend/home/images/brands_7.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/frontend/home/images/brands_8.jpg" alt=""></div></div>
						</div>
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>		
	</div>
@endsection
@section('js')
<script src="{{ asset('frontend/home/plugins/slick-1.8.0/slick.js') }}"></script>
<script src="{{ asset('frontend/home/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('frontend/home/js/custom.js') }}"></script>
@endsection