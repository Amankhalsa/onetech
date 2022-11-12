
	@extends('frontend.front_master')
	@section('content')
	<!-- Header -->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/blog_styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/blog_responsive.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/blog_single_styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/blog_single_responsive.css')}}">
@php
    $getlang = Session::get('lang');
@endphp
	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">
                        @foreach($post as $val)
						<!-- Blog post -->
						<div class="blog_post">
							<div class="blog_image" style="background-image:url({{asset($val->post_image)}}"></div>
							<div class="blog_text">

                                @if(Session::get('lang') == 'hindi')
                                {{$val->post_title_in}}
                                @else
                                {{$val->post_title_en}}

                                @endif
                                </div>
							<div class="blog_button"><a href="{{route('continue.reading',$val->id )}}">Continue Reading</a></div>
						</div>
                   
                @endforeach
						
					</div>
				</div>
					
			</div>
		</div>
	</div>
    @endsection