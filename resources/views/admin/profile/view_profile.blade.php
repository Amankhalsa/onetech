@extends('admin.admin_master')
@section('admin')
<div class="sl-pagebody">

    <div class="row row-sm">
        <div class="row"> 
<div class="card" style="width: 18rem;">
    <img src="{{(!empty($getadminProfile->profile_photo_path))?url('upload/admin_images/'.$getadminProfile->profile_photo_path): url('upload/no_image.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">User Name : {{$getadminProfile->name}}</h5>
 
      <p class="card-text">User Email : {{$getadminProfile->email}}</p>


      <a href="{{route('edit.admin.profile')}}" class="btn btn-primary">Edit Profile</a>
    </div>
  </div>
</div>

</div>
</div>

@endsection