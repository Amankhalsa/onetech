@php
    $featured = DB::table('products')->where('status',1)->orderBy('id','DESC')->limit(12)->get();

    $trend = DB::table('products')->where('status',1)->where('trend',1)->orderBy('id','DESC')->limit(8)->get();
    $bestrated = DB::table('products')->where('status',1)->where('best_rated',1)->orderBy('id','DESC')->limit(8)->get();


    $hot = DB::table('products')
				->join('brands', 'products.brand_id','brands.id')
				->select('products.*' , 'brands.brand_name')
				->where('hot_deal',1)->orderBy('id','DESC')->limit(3)->get();



@endphp

<div class="deals_featured">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
                
                <!-- Deals -->

                <div class="deals">
                    <div class="deals_title">Deals of the Week</div>
                    <div class="deals_slider_container">
                        
                        <!-- Deals Slider -->
                        <div class="owl-carousel owl-theme deals_slider">
                            
                            @if(isset($hot))
                            @foreach($hot as $items)
                            <!-- Deals Item -->
                            <div class="owl-item deals_item">
                                <div class="deals_image"><img src="{{asset($items->image_one)}}" alt=""></div>
                                <div class="deals_content">
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_category"><a href="#">{{$items->brand_name}}</a></div>

                                        @if($items->discount_price == Null)
                                        @else 
                                        <div class="deals_item_price_a ml-auto">${{$items->selling_price}}</div>
                                        @endif
                                    </div>
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_name"> 
                                            {{Str::limit($items->product_name,15,$end='....')}}
                                        </div>
                                        @if($items->discount_price == Null)

                                        <div class="deals_item_price ml-auto">${{$items->selling_price}}</div>
                                        @else 
                                      

                                        @endif
                                        @if($items->discount_price != Null)

                                        <div class="deals_item_price ml-auto">${{$items->discount_price}}</div>
                                        @else 
                                      

                                        @endif
                                    </div>
                                    <div class="available">
                                        <div class="available_line d-flex flex-row justify-content-start">
                                            <div class="available_title">Available: <span>{{$items->product_quantity}}</span></div>
                                            <div class="sold_title ml-auto">Already sold: <span>28</span></div>
                                        </div>
                                        <div class="available_bar"><span style="width:17%"></span></div>
                                    </div>
                                    <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                        <div class="deals_timer_title_container">
                                            <div class="deals_timer_title">Hurry Up</div>
                                            <div class="deals_timer_subtitle">Offer ends in:</div>
                                        </div>
                                        <div class="deals_timer_content ml-auto">
                                            <div class="deals_timer_box clearfix" data-target-time="">
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                    <span>hours</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                    <span>mins</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                    <span>secs</span>
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

                    <div class="deals_slider_nav_container">
                        <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
                        <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
                    </div>
                </div>
                
                <!-- Featured -->
                <div class="featured">
                    <div class="tabbed_container">
                        <div class="tabs">
                            <ul class="clearfix">
                                <li class="active">Featured</li>
                                <li>Trend</li>
                                <li>Best Rated</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>

                        <!-- Product Panel -->
                        <div class="product_panel panel active">
                            <div class="featured_slider slider">
                        @if(isset($featured))
                        @foreach($featured as $items)

                                <!-- Slider Item -->
                                <div class="featured_slider_item">
                                    <div class="border_active"></div>
                                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                            <img src="{{asset($items->image_two)}}" alt="" style="height: 120px; width:100px;"></div>
                                        <div class="product_content">
                                            <div class="product_price discount">
                                                @if($items->discount_price == Null)
                                                    ${{$items->selling_price}}
                                                @else
                                                $ {{$items->discount_price}}<span>$ {{$items->selling_price}}</span>

                                                @endif
                                            </div>
                                            <div class="product_name"><div><a href="{{url('product/details/'.$items->id. '/'.$items->product_name )}}"> {{Str::limit($items->product_name,10,$end='....')}}</a></div></div>
                                            <div class="product_extras">
                                                <div class="product_color">
                                                    <input type="radio" checked name="product_color" style="background:#b19c83">
                                                    <input type="radio" name="product_color" style="background:#000000">
                                                    <input type="radio" name="product_color" style="background:#999999">
                                                </div>
                                                <button class="product_cart_button addtocart" data-iD="{{$items->id}}">Add to Cart</button>
                                            </div>
                                        </div>

                                        
                                            <button class="addwishlist" data-id="{{ $items->id }}" >
                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                           </button>
                                        <ul class="product_marks">
                                            @if($items->discount_price == Null)
                                            <li class="product_mark product_discount" style="background: #0e8ce4;">New</li>

                                           @else

                                            <li class="product_mark product_discount">
                                                @php
                                                    $amt = $items->selling_price - $items->discount_price ;
                                                    $discount = $amt/$items->selling_price *100 ;
                                                @endphp
                            
                                                
                                                {{  intval($discount)}}%</li>
                                            
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                        @endforeach
                         @endif
                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

                        <!-- Product Panel -->

                        <div class="product_panel panel">
                            <div class="featured_slider slider">
                                {{-- Trend  --}}
                @if(isset($trend))
                @foreach($trend as $items)
                                <!-- Slider Item -->
                                <div class="featured_slider_item">
                                    <div class="border_active"></div>
                                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                            <img src="{{asset($items->image_two)}}" alt="" style="height: 120px; width:100px;"></div>
                                        <div class="product_content">
                                            <div class="product_price discount">
                                                @if($items->discount_price == Null)
                                                    ${{$items->selling_price}}
                                                @else
                                                $ {{$items->discount_price}}<span>$ {{$items->selling_price}}</span>

                                                @endif
                                            </div>
                                            <div class="product_name"><div><a href="product.html"> {{Str::limit($items->product_name,10,$end='....')}}</a></div></div>
                                            <div class="product_extras">
                                                <div class="product_color">
                                                    <input type="radio" checked name="product_color" style="background:#b19c83">
                                                    <input type="radio" name="product_color" style="background:#000000">
                                                    <input type="radio" name="product_color" style="background:#999999">
                                                </div>
                                                <button class="product_cart_button">Add to Cart</button>
                                            </div>
                                        </div>

                                                                         
      
                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
         
                                        <ul class="product_marks">
                                            @if($items->discount_price == Null)
                                            <li class="product_mark product_discount" style="background: #0e8ce4;">New</li>

                                           @else

                                            <li class="product_mark product_discount">
                                                @php
                                                    $amt = $items->selling_price - $items->discount_price ;
                                                    $discount = $amt/$items->selling_price *100 ;
                                                @endphp
                            
                                                
                                                {{  intval($discount)}}%</li>
                                            
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                                {{-- Trend  --}}

                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

                        <!-- Product Panel -->

                        <div class="product_panel panel">
                            <div class="featured_slider slider">

                                <!-- Slider Item -->
                                @if(isset($bestrated))
                                @foreach($bestrated as $items)
                                                <!-- Slider Item -->
                                                <div class="featured_slider_item">
                                                    <div class="border_active"></div>
                                                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                        <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                            <img src="{{asset($items->image_two)}}" alt="" style="height: 120px; width:100px;"></div>
                                                        <div class="product_content">
                                                            <div class="product_price discount">
                                                                @if($items->discount_price == Null)
                                                                    ${{$items->selling_price}}
                                                                @else
                                                                $ {{$items->discount_price}}<span>$ {{$items->selling_price}}</span>
                
                                                                @endif
                                                            </div>
                                                            <div class="product_name"><div><a href="product.html"> {{Str::limit($items->product_name,10,$end='....')}}</a></div></div>
                                                            <div class="product_extras">
                                                                <div class="product_color">
                                                                    <input type="radio" checked name="product_color" style="background:#b19c83">
                                                                    <input type="radio" name="product_color" style="background:#000000">
                                                                    <input type="radio" name="product_color" style="background:#999999">
                                                                </div>
                                                                <button class="product_cart_button">Add to Cart</button>
                                                            </div>
                                                        </div>
                                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                        <ul class="product_marks">
                                                            @if($items->discount_price == Null)
                                                            <li class="product_mark product_discount" style="background: #0e8ce4;">New</li>
                
                                                           @else
                
                                                            <li class="product_mark product_discount">
                                                                @php
                                                                    $amt = $items->selling_price - $items->discount_price ;
                                                                    $discount = $amt/$items->selling_price *100 ;
                                                                @endphp
                                            
                                                                
                                                                {{  intval($discount)}}%</li>
                                                            
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @endif


                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>