
	@extends('frontend.front_master')
	@section('content')
	<!-- Header -->
    @include('frontend.body.header')
	<!-- Banner -->

	@include('frontend.body.banner')

	<!-- Characteristics -->

	<div class="characteristics">
		<div class="container">
			<div class="row">

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{asset('frontend/images/char_1.png')}}" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{asset('frontend/images/char_2.png')}}" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{asset('frontend/images/char_3.png')}}" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{asset('frontend/images/char_4.png')}}" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Deals of the week -->



@include('frontend.body.deals_featured')


	<!-- Popular Categories -->

@include('frontend.body.popular_categories')
	<!-- Banner -->
	@php
	$mid = DB::table('products')
		   ->join('categories','products.category_id','categories.id')
		   ->join('brands','products.brand_id','brands.id')
		   ->select('products.*','brands.brand_name','categories.category_name')
		   ->where('products.mid_slider',1)->orderBy('id','DESC')->limit(3)
		   ->get();

 @endphp

	<div class="banner_2">
		<div class="banner_2_background" style="background-image:url(images/banner_2_background.jpg)"></div>
		<div class="banner_2_container">
			<div class="banner_2_dots"></div>
			<!-- Banner 2 Slider -->
			<div class="owl-carousel owl-theme banner_2_slider">
				@if(isset($mid ))
				@foreach($mid as $item)
				<!-- Banner 2 Slider Item -->
				<div class="owl-item">
					<div class="banner_2_item">
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col-lg-4 col-md-6 fill_height">
									<div class="banner_2_content">
										<div class="banner_2_category"><h4>{{$item->category_name}} </h4></div>
										<div class="banner_2_title">{{$item->product_name}}</div>
										<div class="banner_2_text"><h4>{{$item->brand_name}} </h4></div>
										<h2>${{ $item->selling_price }} </h2>
										<div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="button banner_2_button"><a href="#">Explore</a></div>
									</div>
									
								</div>
								<div class="col-lg-8 col-md-6 fill_height">
									<div class="banner_2_image_container">
										<div class="banner_2_image"><img src="{{asset($item->image_one)}}" alt="" style="width: 300px"></div>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>
				@endforeach
				@endif
			</div>
		</div>
	</div>

		<!-- Hot New Arrivals -->

		@include('frontend.body.new_arrivals')

		<!-- Best Sellers -->

		@include('frontend.body.new_arrivals2')


		@include('frontend.body.best_sellers')

		<!-- Adverts -->
		@include('frontend.body.adverts')

		<!-- Trends -->

		@include('frontend.body.trends')

		<!-- Reviews -->
		@include('frontend.body.reviews')

		<!-- Recently Viewed -->

		@include('frontend.body.recently')

		<!-- Brands -->


		@include('frontend.body.brands')
		<!-- Newsletter -->


		@include('frontend.body.newsletter')
		<!-- Footer -->

		@include('frontend.body.footer')

		<!-- Copyright -->
		@include('frontend.body.copyright')
	
@endsection