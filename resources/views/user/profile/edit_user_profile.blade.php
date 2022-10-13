@extends('user.user_master')
@section('user')
<div class="middle_content_wrapper">
    <!-- counter_area -->
    <section class="counter_area col-md-6">
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
    </section>
</div>

@endsection