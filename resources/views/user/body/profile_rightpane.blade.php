<div class="col-4">
    <div class="card">
      <img src="{{(!empty(Auth::user()->profile_photo_path)) 
          ? asset('upload/user_images/'.Auth::user()->profile_photo_path):url('upload/no_image.jpg')}}" class="pt-3 rounded-circle card-img-top" style="width: 100px;   display: block; margin-left: auto; margin-right: auto; width: 30%;">
      <div class="card-body">
          <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
        
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"> <a href="{{route('user.changepassword')}}">Change Password</a>  </li>
         <li class="list-group-item"> <a href="{{route('edit.profile')}}"> Edit Profile </a></li>
          <li class="list-group-item"><a href=""> Return Order</a> </li> 
      </ul>

      <div class="card-body">
        <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
        
      </div>
      
    </div>
    
  </div>