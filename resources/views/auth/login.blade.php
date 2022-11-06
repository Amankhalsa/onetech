
	@extends('frontend.front_master')
	@section('content')
	<!-- Header -->

	<!-- Banner -->



	@if (session('status'))
	<div class="mb-4 font-medium text-sm text-green-600">
		{{ session('status') }}
	</div>
@endif

	<div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px; border-radius: 25px;">
					<div class="contact_form_container">
						<div class="contact_form_title text-center">Sign in </div>

						{{-- <form action="#" id="contact_form"> --}}
							<form method="POST" action="{{ isset($guard) ? url($guard.'/login') :  route('login') }}" id="contact_form">
								@csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email or Phone</label>
                                <input  id="email"  type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  aria-describedby="emailHelp"  required="">
                                         @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                         @enderror
                                     </div>
                            
                                  <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"  aria-describedby="emailHelp" name="password" required="">
                                           @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                
                                                 </div>

							<div class="contact_form_button">
								<button type="submit" class="button contact_submit_button">Login</button>
							</div>
						</form>
                        <br>
                        <a href="{{ route('password.request') }}">I forgot my password</a>   <br> <br>          
            
               <button type="submit" class="btn btn-primary btn-block"><i class="fab fa-facebook-square"></i> Login with Facebook </button>
               
                <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger btn-block"><i class="fab fa-google"></i> Login with Google </a>  
					</div>
				</div>


                <div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px; border-radius: 25px;">
					<div class="contact_form_container">
						<div class="contact_form_title text-center">Sign up</div>


							<form method="POST" action="{{ route('register') }}" id="contact_form">
								@csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Full Name</label>
                                <input id="name" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your Full Name " name="name" required="">
                                     </div>
                            
                            
                                    <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  aria-describedby="emailHelp" placeholder="Enter Your Phone " required="">
                                     </div>
                            
                            
                                     <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  aria-describedby="emailHelp" placeholder="Enter Your Email " required="">
                                     </div>
                            
                            
                            
                                     <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input id="password"  type="password" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your Password " name="password" required="">
                                     </div>
                            
                                     <div class="form-group">
                                <label for="exampleInputEmail1">Confirm Password</label>
                                <input  id="password_confirmation" type="password" class="form-control"  aria-describedby="emailHelp" placeholder="Re-Type Password " name="password_confirmation" required="">
                                     </div>

							<div class="contact_form_button">
								<button type="submit" class="button contact_submit_button">Sign up</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
	</div>


	<!-- Footer -->

    @include('frontend.body.footer')

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><a href="#"><img src="images/logos_1.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_2.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_3.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_4.png" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection