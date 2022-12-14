@php
     $setting = DB::table('sitesettings')->first();
@endphp
	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('frontend/images/phone.png')}}" alt=""></div>{{isset( $setting->phone_one) ? $setting->phone_one : "NA"}}</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('frontend/images/mail.png')}}" alt=""></div><a href="mailto:fastsales@gmail.com">{{isset( $setting->email) ? $setting->email : "NA"}}</a></div>
						<div class="top_bar_content ml-auto">

						{{-- top bar  --}}
						@guest
							
						@else
						<div class="top_bar_menu">
							<ul class="standard_dropdown top_bar_dropdown">
									<li>
										<a href=""  data-toggle="modal" data-target="#exampleModal">Order Tracking </a>
									</li>
							</ul>
						</div>

			
						@endguest
						
						{{-- end top bar  --}}


							<div class="top_bar_menu">
								@php
									$getlang = Session::get('lang');
								@endphp
								<ul class="standard_dropdown top_bar_dropdown">
									<li>
										@if(Session::get('lang') == 'hindi')
										<a href="{{route('language.english')}}">English<i class="fas fa-chevron-down"></i></a>
										@else
										<a href="{{route('language.hindi')}}">Hindi<i class="fas fa-chevron-down"></i></a>
										@endif
										
										
									</li>
									<li>
										<a href="#">$ US dollar<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="#">EUR Euro</a></li>
											<li><a href="#">GBP British Pound</a></li>
											<li><a href="#">JPY Japanese Yen</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="top_bar_user">
							@guest
								<div>
									<a href="{{ route('login') }}">
										<div class="user_icon">
											<img src="{{ asset('frontend/images/user.svg')}}" alt="">
										</div> Register/Login
									</a>
								</div>
							@else
									<ul class="standard_dropdown top_bar_dropdown">
										<li>
											<a href="">
												<div class="user_icon">
													<img src="{{ asset('frontend/images/user.svg')}}" alt="">
												</div> Profile<i class="fas fa-chevron-down"></i>
											</a>
											<ul>
												<li><a href="{{route('user.wishlist')}}">Wishlist</a></li>
												<li><a href="{{route('user.checkout')}}">Checkout</a></li>
												<li><a href="{{route('dashboard')}}">dashboard</a></li>
												<li><a href="{{route('user.logout')}}">logout</a></li>	
											</ul>
										</li>
									</ul> 
							 @endguest
				 
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="{{url('/')}}">                           
								 <img src="https://ecom.amankhalsa.in/public/frontend/images/logo.png" alt="">    

							</a></div>
						</div>
					</div>
   
					@php

					$category = DB::table('categories')->get();
					   @endphp
					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form method="post" action="{{ route('product.search') }}" class="header_search_form clearfix">
										@csrf
										<input type="search"  required="required" name="search" class="header_search_input" placeholder="Search for products...">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">All Categories</span>
												<i class="fas fa-chevron-down"></i>
							
												<ul class="custom_list clc">
								@foreach($category as $cat)
							
								<li><a class="clc" href="#">{{ $cat->category_name}}</a></li>
							
								@endforeach
							</ul>
											</div>
										</div>
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{asset('frontend/images/search.png')}}" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">


								@guest

								@else
									@php
										$wishlist = DB::table('wishlists')->where('user_id',Auth::id())->get()
									@endphp
								
								<div class="wishlist_icon"><img src="{{asset('frontend/images/heart.png')}}" alt=""></div>
								<div class="wishlist_content">
									<div class="wishlist_text"><a href="#">Wishlist</a></div>
									<div class="wishlist_count">{{count($wishlist)}}</div>
								</div>
								@endguest
							</div>
							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<a href="{{ route('show.cart') }}"><img src="{{asset('frontend/images/cart.png')}}" alt=""></a>
										<div class="cart_count"><span>{{Cart::count() }}</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="{{ route('show.cart') }}">Cart</a></div>
										<div class="cart_price">${{ Cart::subtotal() }}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Main Navigation -->
		@php
			$category = DB::table('categories')->get();
		@endphp
		{{-- @if(Request::is('login' ,'dashboard') ) d-none  @endif " --}}
		<nav class="main_nav   ">
			<div class="container ">
				<div class="row">
					<div class="col">
						
						<div class="main_nav_content d-flex flex-row">

							<!-- Categories Menu -->

							<div class="cat_menu_container">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
									<div class="cat_burger"><span></span><span></span><span></span></div>
									<div class="cat_menu_text">categories</div>
								</div>

									<ul class="cat_menu">
										@foreach($category as $cat)
										<li class="hassubs">
												<a href="{{route('allcategories',$cat->id)}}">{{$cat->category_name}}<i class="fas fa-chevron-right"></i></a>
											<ul>
												@php
												$subcategory = DB::table('subcategories')->where('category_id',$cat->id)->get();
												@endphp
												@foreach($subcategory as $row)
												<li class="hassubs">
													<a href="{{route('products',$row->id)}}">{{ $row->subcategory_name }}<i class="fas fa-chevron-right"></i></a>
												</li>
												@endforeach
											</ul>
										</li>
										@endforeach
									</ul>
							</div>

							<!-- Main Nav Menu -->

							<div class="main_nav_menu ml-auto">
								<ul class="standard_dropdown main_nav_dropdown">
									<li><a href="{{url('/')}}">Home<i class="fas fa-chevron-down"></i></a></li>
									<li class="hassubs">
										<a href="#">Super Deals<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li>
												<a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
												<ul>
													<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
												</ul>
											</li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
										</ul>
									</li>
									<li class="hassubs">
										<a href="#">Featured Brands<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li>
												<a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
												<ul>
													<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
												</ul>
											</li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
										</ul>
									</li>
									<li class="hassubs">
										<a href="#">Pages<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="shop.html">Shop<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="product.html">Product<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="blog_single.html">Blog Post<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="regular.html">Regular Post<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="cart.html">Cart<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>
										</ul>
									</li>
									<li><a href="{{route('blog.post')}}">Blog<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="{{route('contact.page')}}">Contact<i class="fas fa-chevron-down"></i></a></li>
								</ul>
							</div>

							<!-- Menu Trigger -->

							<div class="menu_trigger_container ml-auto">
								<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
									<div class="menu_burger">
										<div class="menu_trigger_text">menu</div>
										<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</nav>
		
		<!-- Menu -->

		<div class="page_menu">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="page_menu_content">
							
							<div class="page_menu_search">
								<form action="#">
									<input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
								</form>
							</div>
							<ul class="page_menu_nav">
								<li class="page_menu_item has-children">
									<a href="#">Language<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Currency<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item">
									<a href="#">Home<i class="fa fa-angle-down"></i></a>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
										<li class="page_menu_item has-children">
											<a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
											<ul class="page_menu_selection">
												<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
												<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
												<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
												<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											</ul>
										</li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li>
								<li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
							</ul>
							
							<div class="menu_contact">
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('frontend/images/phone_white.png')}}" alt=""></div>+38 068 005 3570</div>
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('frontend/images/mail_white.png')}}" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	
	</header>