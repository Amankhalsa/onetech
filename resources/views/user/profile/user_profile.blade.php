@extends('user.user_master')
@section('user')
<div class="middle_content_wrapper">
    <!-- counter_area -->
    <section class="counter_area">
        <div class="row"> 
<div class="card" style="width: 18rem;">
    <img src="{{(!empty($getProfile->profile_photo_path))?url('upload/user_images/'.$getProfile->profile_photo_path): url('upload/no_image.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">User Name : {{$getProfile->name}}</h5>
 
      <p class="card-text">User Email : {{$getProfile->email}}</p>


      <a href="{{route('edit.profile')}}" class="btn btn-primary">Edit Profile</a>
    </div>
  </div>
</div>
    </section>
</div>
@endsection