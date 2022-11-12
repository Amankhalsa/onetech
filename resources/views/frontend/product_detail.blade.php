
	@extends('frontend.front_master')
	@section('content')
	<!-- Header -->

	<!-- Banner -->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/product_styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/product_responsive.css')}}">


	<!-- Characteristics -->
	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="{{(!empty($product->image_one)) 
							? asset($product->image_one):url('no_image.jpg')}}">
							<img src="{{(!empty($product->image_one)) 
							? asset($product->image_one):url('no_image.jpg')}}" alt=""></li>
						<li data-image="{{(!empty($product->image_two)) 
							? asset($product->image_two):url('no_image.jpg')}}">
							<img src="{{(!empty($product->image_two)) 
							? asset($product->image_two):url('no_image.jpg')}}" alt=""></li>
						<li data-image="{{(!empty($product->image_three)) 
							? asset($product->image_three):url('no_image.jpg')}}">
							<img src="{{(!empty($product->image_three)) 
							? asset($product->image_three):url('no_image.jpg')}}" alt=""></li>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{(!empty($product->image_one)) 
						? asset($product->image_one):url('no_image.jpg')}}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">{{isset($product->category_name) ? $product->category_name : "NA"}} > {{isset($product->subcategory_name) ? $product->subcategory_name : "NA"}}</div>
						<div class="product_name">{{isset($product->product_name) ? $product->product_name : "NA"}} </div>
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="product_text"><p>
							{!!  str_limit($product->product_details, $limit = 600 )  !!}</p></div>
						<div class="order_info d-flex flex-row">
							<form action="{{route('addtoCartproduct',$product->id)}}" method="POST">
								@csrf
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
						

									<!-- Product Color -->
					<div class="row">
							{{-- color		 --}}
							@if($product_color)

						<div class="col-lg-4">
							<div class="form-group">
								<label for="exampleFormControlSelect1">Color</label>
								<select class="form-control " id="exampleFormControlSelect1" name="color"> 
									@foreach($product_color as $col)
								
									<option value="{{$col}}">{{$col}}</option>
									@endforeach
						
								</select>          		
							</div> 
							</div> 
							@else

							@endif
							{{-- color		 --}}

						{{-- size --}}
						@if($product_size)
							<div class="col-lg-4">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Size</label>
									<select class="form-control input-lg" id="exampleFormControlSelect1" name="size"> 
										@foreach($product_size as $size)
									
										<option value="{{$size}}">{{$size}}</option>
										@endforeach
							
									</select>          		
								</div> 
								</div> 
						@endif
						{{-- size --}}

							{{-- qyt --}}
								<div class="col-lg-4">
									<div class="form-group">
										<label for="exampleFormControlSelect1">Quantity</label>
										 <input class="form-control" type="number" value="1" pattern="[0-9]" name="qty">	
									</div> 
									</div>    
							{{-- qyt --}}

						
					</div>


								</div>

						
								@if($product->discount_price == NULL)
								<div class="product_price">${{ $product->selling_price }}<span> </div>
									  @else
								<div class="product_price">${{ $product->discount_price }}<span>${{ $product->selling_price }}</span></div>
									  @endif
							

							
									  <div class="button_container">
										<button type="submit" class="button cart_button">Add to Cart</button>
										<div class="product_fav"><i class="fas fa-heart"></i></div>
									</div>
								
							</form>
						</div>
					</div>
				</div>

			</div>
			
		</div>
	</div>


	


	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Product Details</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>


			<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Product Details</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Video Link</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Product Review</a>
			</li>
			</ul>
			<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				<br>{!! $product->product_details !!}</div>
			<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				<br>{{ $product->video_link }}</div>
			<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><br>

			<div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5"></div>

			</div>
		</div>

					 
				</div>
			</div>
		</div>
	</div>



	<script src="{{asset('frontend/js/product_custom.js')}}"></script>

@endsection