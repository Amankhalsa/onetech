
	@extends('frontend.front_master')
	@section('content')
	<!-- Header -->
	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 ">
					<div class="cart_container">
						<div class="cart_title">Wishlist  Prodcut</div>
						<div class="cart_items">
							<ul class="cart_list">
            @if(isset($product))
            @foreach($product as $row)
                <li class="cart_item clearfix">
                    <div class="cart_item_image"><img src="{{ asset($row->image_one) }} " alt=""  style="width: 70px; width: 70px;"></div>
                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                        <div class="cart_item_name cart_info_col">
                            <div class="cart_item_title">Name</div>
                            <div class="cart_item_text">{!!str_limit($row->product_name , $limit= 12) !!}</div>
                        </div>
                    	@if($row->product_color == NULL)
                        <div class="cart_item_color cart_info_col">
                            <div class="cart_item_title">Color</div>
                            <div class="cart_item_text"> NA</div>
                        </div>
                @else
				<div class="cart_item_color cart_info_col">
					<div class="cart_item_title">Color</div>
					<div class="cart_item_text"> {{ $row->product_color }}</div>
				</div>
				 @endif


                 @if($row->product_size == NULL)
                 <div class="cart_item_color cart_info_col">
                    <div class="cart_item_title">Size</div>
                    <div class="cart_item_text">NA</div>
                </div>
                 @else
                 <div class="cart_item_color cart_info_col">
                     <div class="cart_item_title">Size</div>
                     <div class="cart_item_text"> {{ $row->product_size }}</div>
                 </div>
                 @endif


                <div class="cart_item_total cart_info_col">
					<div class="cart_item_title">Action</div><br>
	             <a href="{{ route('remove-cart',$row->id ) }}" class="btn btn-sm btn-danger">Add To cart</a>
				</div>
                    </div>
                </li>
                @endforeach
                @endif
							</ul>
						</div>
						
						<!-- Order Total -->
				

						
					</div>
				</div>
			</div>
		</div>
	</div>
    @endsection