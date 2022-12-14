
	@extends('frontend.front_master')
	@section('content')
   
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/shop_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/shop_responsive.css')}}">


	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Search product </h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
                    @php
                    $categories =  DB::table('categories')->get();
                    @endphp
						@if(isset($categories))
								@foreach($categories as  $cat)
									<li><a href="{{route('allcategories',$cat->id)}}">{{$cat->category_name}}</a></li>
								@endforeach
						@endif
							</ul>
						</div>
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Range: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle color_subtitle">Color</div>
							<ul class="colors_list">
								<li class="color"><a href="#" style="background: #b19c83;"></a></li>
								<li class="color"><a href="#" style="background: #000000;"></a></li>
								<li class="color"><a href="#" style="background: #999999;"></a></li>
								<li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
								<li class="color"><a href="#" style="background: #df3b3b;"></a></li>
								<li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
							</ul>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Brands</div>
							<ul class="brands_list">
							@if(isset($brands))
						
								@foreach($brands as $row)
								@php
								$brand = DB::table('brands')->where('id',$row->brand_id)->first();
								@endphp
									<li class="brand"><a href="#">{{$brand->brand_name}}</a></li>
								@endforeach
							@endif
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span>186</span> products found</div>
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

						<div class="product_grid row">
							<div class="product_grid_border"></div>
                            @if(isset($products) )
                            @foreach($products as $row)
							<!-- Product Item -->
							<div class="product_item is_new">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset($row->image_one)}}"  style="height: 100px; width: 100px;" alt=""></div>
								<div class="product_content">
                                    <div class="product_price discount">
                                        @if($row->discount_price == Null)
                                            ${{$row->selling_price}}
                                        @else
                                        $ {{$row->discount_price}}<span>$ {{$row->selling_price}}</span>

                                        @endif
                                    </div>
									<div class="product_name"><div><a href="{{url('product/details/'.$row->id. '/'.$row->product_name )}}" tabindex="0">{{ $row->product_name}}</a></div></div>
								</div>
								<div class="product_fav"><i class="fas fa-heart"></i></div>
								<ul class="product_marks">
                                    @if($row->discount_price == NULL)
                                    <li class="product_mark product_new" style="background: blue; color:white;">New</li>
                                   
                                    @else

                                    @php
                                    $amount = $row->selling_price - $row->discount_price;
                                    $discount = $amount/$row->selling_price*100;
           
                                  @endphp
                                  
                                    <li class="product_mark product_new" style="background: rgb(252, 4, 4); color:white;">   {{  intval($discount)}}% </li>

                                    @endif
								</ul>
							</div>
                     @endforeach
                     @endif
							<!-- Product Item -->
			

                        
							<!-- Product Item -->
					
                     



						</div>

						<!-- Shop Page Navigation -->

						<div class="shop_page_nav d-flex flex-row">
							 
							 
                            {{ $products->links() }}
                           
                          
                     </div>

					</div>

				</div>
			</div>
		</div>
	</div>

    <script src="{{asset('frontend/js/shop_custom.js')}}"></script>
    @endsection