@extends('frontend.master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/styles/shop_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/styles/shop_responsive.css') }}">
@endsection
@section('content')
	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="/frontend/home/images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">@foreach ($deskategori as $p)
									{{$p->kategori}}
									@endforeach
			</h2>
		</div>
	</div>
	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
								@foreach ($kategori as $k)
								<li><a href="/category/{{encrypt($k->id)}}">{{$k->kategori}}</a></li>
								@endforeach
							</ul>
						</div>
						
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span>
							@foreach($total_product as $t)
							{{$t->jumlah}}
							@endforeach </span> products found</div>
							<div class="shop_sorting">
								<span>Sort by:</span>
								<ul>
									<li>
										<span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="product_grid">
							<div class="product_grid_border"></div>
							
							<!-- Product Item -->
							@foreach($product as $i)
							<div class="product_item is_new">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('/images/product/'.array_first(json_decode($i->img))) }}" alt=""></div>
								<div class="product_content">
									<div class="product_price">Rp. {{ number_format($i->harga,0)}}</div>
									<div class="product_name"><div><a href="/detail-product/{{$i->id}}" tabindex="0">{{$i->nama_product}}</a></div></div>
									<div class="product_extras">
													
													</div>
								</div>
								<div class="product_fav" style="margin-top:-15px"><i class="fas fa-heart"></i></div>
								<div class="product_fav" style="margin-top:200px; 
																margin-right:70px;">
									<a href="/detail-product/{{ encrypt($i->id)}}"><button class="btn btn-primary product_cart_button">View</button></a> </div>
								<ul class="product_marks" style="margin-top:-15px">
									<li class="product_mark product_discount">-25%</li>
									<li class="product_mark product_new">new</li>
								</ul>
							</div>
							@endforeach 

						</div>
					

						<!-- Shop Page Navigation -->


					</div>

				</div>
			</div>
		</div>
	</div>
<hr>
	
@endsection
@section('js')
<script src="{{ asset('frontend/home/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('frontend/home/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/home/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
<script src="{{ asset('frontend/home/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('frontend/home/js/shop_custom.js') }}"></script>
@endsection