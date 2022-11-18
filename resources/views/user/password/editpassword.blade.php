
	@extends('frontend.front_master')
	@section('content')
	<!-- Header -->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/contact_styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/contact_responsive.css')}}">
    
	<!-- Banner -->
    <div class="contact_form">
        <div class="container"> 
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Change Your Password') }}</div>
  
                  <div class="card-body">
                      <form method="POST" action="{{ route('password.update') }}" aria-label="{{ __('Reset Password') }}">
                          @csrf
  
  
                          <div class="form-group row">
                              <label for="oldpass" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>
  
                              <div class="col-md-6">
                                  <input id="oldpass" type="password" class="form-control" name="oldpassword"  required autofocus>
  
                                  @error('oldpassword') <span class="text-danger"> {{$message}}</span> @enderror
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
  
                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control" name="password" required>
  
                                  @error('password') <span class="text-danger"> {{$message}}</span> @enderror

                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
  
                              <div class="col-md-6">
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                  @error('password_confirmation') <span class="text-danger"> {{$message}}</span> @enderror

                              </div>
                          </div>
  
                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Reset Password') }}
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      
            {{-- profile right pane  --}}
                @include('user.body.profile_rightpane')
            {{-- profile right pane  --}}

          </div>
      
        </div>
        
      
      </div>

    @include('frontend.body.footer')

    <!-- Copyright -->
    @include('frontend.body.copyright')
@endsection