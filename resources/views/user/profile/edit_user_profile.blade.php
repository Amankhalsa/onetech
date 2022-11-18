
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
                    <form method="post" action="{{route('profile.store')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="name">User Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{{$editProfile->name}}">
                  
                      </div>
                      <div class="form-group">
                        <label for="email">User Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$editProfile->email}}">
                      </div>
                   
                      <div class="form-group">
                          <label for="image">User Profile </label>
                      
                          <input name="profile_photo_path"  class="form-control" type="file" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                        </div>
      
                        <div class="form-group">
          <img src="{{(!empty($editProfile->profile_photo_path))?url('upload/user_images/'.$editProfile->profile_photo_path): url('upload/no_image.jpg')}}" 
          class="card-img-top" alt="..."   style="width:100px" id="output">
                      
                        </div>
                      <button type="submit" class="btn btn-primary">Update profile</button>
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