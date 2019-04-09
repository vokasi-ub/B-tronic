@extends('frontend.master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/styles/product_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/styles/product_responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/home/styles/contact_styles.css') }}">
@endsection
@section('content')
	@foreach($product as $i)
	<div class="single_product">
		<div class="container">
			<h2>{{$i->nama_product}}</h2> 
			<div class="row">
				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<?php foreach (json_decode($i->img)as $gambar) { ?>	
						<li data-image="/images/product/{{$gambar}}"><img src="{{ asset('/images/product/'.$gambar) }}" alt=""></li>
						<?php } ?>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{ asset('/images/product/'.array_first(json_decode($i->img))) }}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">Kategori : {{$i->kategori}}</div>
						<div class="product_text"><p>Description : {{$i->description}}</p></div>
						<div class="product_price">Rp. {{ number_format($i->harga,0) }}</div>
						<div class="product_text">
								<p> {{$i->name}} </p>
								
							
						</div>
					</div>
					<div class="col-lg-12">
					<div class="contact_info_item d-flex flex-row align-items-center justify-content-start" style="width:400px">
							<div class="contact_info_image"><img src="/frontend/home/images/contact_1.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Phone</div>
								<div class="contact_info_text">{{$i->telp}}</div>
							</div>
					</div>
					<div class="contact_info_item d-flex flex-row align-items-center justify-content-start" style="width:400px">
							<div class="contact_info_image"><img src="/frontend/home/images/contact_3.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Address</div>
								<div class="contact_info_text">{{$i->address}} , {{ucfirst(strtolower($i->kec))}} , {{ucfirst(strtolower($i->kota))}} , {{$i->provinsi}} </div>
							</div>
					</div>
					
					</div>
				</div>

			</div>
		</div>
	</div>
	@endforeach
	
	
@endsection
@section('js')
<script src="{{ asset('frontend/home/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('frontend/home/js/product_custom.js') }}"></script>
@endsection