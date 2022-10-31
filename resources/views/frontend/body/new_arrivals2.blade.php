
@php
$category = DB::table('categories')->skip(3)->first();
$catid = $category->id;
$product = DB::table('products')->where('category_id',$catid)->where('status',1)->limit(10)->orderBy('id','DESC')->get();

@endphp

<div class="new_arrivals">
<div class="container">
    <div class="row">
        <div class="col">
            <div class="tabbed_container">
                <div class="tabs clearfix tabs-right">
                    <div class="new_arrivals_title">{{$category->category_name}}</div>
                    <ul class="clearfix">
                        <li class="active"></li>
                   
                    </ul>
                    <div class="tabs_line"><span></span></div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="z-index:1;">

                        <!-- Product Panel -->
                        <div class="product_panel panel active">
                            <div class="arrivals_slider slider">

                                <!-- Slider Item -->
                                @if(isset($product))
                                @foreach($product as $items)
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
                            <div class="arrivals_slider_dots_cover"></div>
                        </div>

                        <!-- Product Panel -->
                      

                        <!-- Product Panel -->
                      

                    </div>

        

                </div>
                        
            </div>
        </div>
    </div>
</div>		
</div>