
	@extends('frontend.front_master')
	@section('content')
	<!-- Header -->

@php
    $getlang = Session::get('lang');
@endphp


<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{asset($getnlog->post_image)}}" data-speed="0.8"></div>
</div>
<div class="single_post">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="single_post_title">         
                    @if(Session::get('lang') == 'hindi')
                    {{$getnlog->post_title_in}}
                    @else
                    {{$getnlog->post_title_en}}

                    @endif
                
                </div>
                <div class="single_post_text">
                    <p>
                        
                 
                        @if(Session::get('lang') == 'hindi')
                        {{$getnlog->details_in}}
                        @else
                        {{$getnlog->details_en}}
    
                        @endif
                        .</p>

                    <div class="single_post_quote text-center">
                        <div class="quote_image"><img src="{{asset($getnlog->post_image)}}" alt=""></div>
                        <div class="quote_text">Quisque sagittis non ex eget vestibulum. Sed nec ultrices dui. Cras et sagittis erat. Maecenas pulvinar, turpis in dictum tincidunt, dolor nibh lacinia lacus.</div>
                        <div class="quote_name">Liam Neeson</div>
                    </div>

                    <p>Praesent ac magna sed massa euismod congue vitae vitae risus. Nulla lorem augue, mollis non est et, eleifend elementum ante. Nunc id pharetra magna.  Praesent vel orci ornare, blandit mi sed, aliquet nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <div class="blog">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="blog_posts d-flex flex-row align-items-start justify-content-between">

                    <!-- Blog post -->
                    <div class="blog_post">
                        <div class="blog_image" style="background-image:url(images/blog_4.jpg)"></div>
                        <div class="blog_text">Etiam leo nibh, consectetur nec orci et, tempus tempus ex</div>
                        <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                    </div>

                    <!-- Blog post -->
                    <div class="blog_post">
                        <div class="blog_image" style="background-image:url(images/blog_5.jpg)"></div>
                        <div class="blog_text">Sed viverra pellentesque dictum. Aenean ligula justo, viverra in lacus porttitor</div>
                        <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                    </div>

                    <!-- Blog post -->
                    <div class="blog_post">
                        <div class="blog_image" style="background-image:url(images/blog_6.jpg)"></div>
                        <div class="blog_text">In nisl tortor, tempus nec ex vitae, bibendum rutrum mi. Integer tempus nisi</div>
                        <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                    </div>

                </div>
            </div>	
        </div>
    </div>
</div> --}}
@endsection