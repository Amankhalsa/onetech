
@php
        $buyonegetone = DB::table('products')
				->join('brands', 'products.brand_id','brands.id')
				->select('products.*' , 'brands.brand_name')->where('status',1)
				->where('buyone_getone',1)->orderBy('id','DESC')->limit(3)->get();
@endphp
<div class="trends">
    <div class="trends_background" style="background-image:url(images/trends_background.jpg)"></div>
    <div class="trends_overlay"></div>
    <div class="container">
        <div class="row">

            <!-- Trends Content -->
            <div class="col-lg-3">
                <div class="trends_container">
                    <h2 class="trends_title">Buy One Get One</h2>
                    <div class="trends_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p></div>
                    <div class="trends_slider_nav">
                        <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                        <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                    </div>
                </div>
            </div>

            <!-- Trends Slider -->
            <div class="col-lg-9">
                <div class="trends_slider_container">

                    <!-- Trends Slider -->

                    <div class="owl-carousel owl-theme trends_slider">
@if(isset($buyonegetone))
                        <!-- Trends Slider Item -->
                        @foreach($buyonegetone as $items)
                        <div class="owl-item">
                            <div class="trends_item is_new">
                                <div class="trends_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{asset($items->image_one)}}" alt=""></div>
                                <div class="trends_content">
                                    <div class="trends_category"><a href="#">{{$items->brand_name}}</a></div>
                                    <div class="trends_info clearfix">
                                        <div class="trends_name"><a href="product.html">     {{Str::limit($items->product_name,15,$end='....')}}</a></div>
                                        @if($items->discount_price == NULL)
                                        <div class="product_price discount">${{ $items->selling_price }}<span> </div>
                                              @else
                                        <div class="product_price discount">${{ $items->discount_price }}<span>${{ $items->selling_price }}</span></div>
                                              @endif
                                    </div>
                                </div>
                                <ul class="trends_marks">
                                    <li class="trends_mark trends_discount">-25%</li>
                                    <li class="trends_mark trends_new">new</li>
                                </ul>
                            


                                
                                <button class="btn btn-danger addwishlist" data-id="{{ $items->id }}" >
                                    Add to wishlist
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    </button>
                                    
  
                            </div>
                        </div>
                        @endforeach


@endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>