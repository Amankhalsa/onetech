@extends('admin.admin_master')
@section('admin')
<div class="sl-pagebody">

    <div class="row row-sm">
      
            <form method="post" action="{{route('update.Admin.password')}}" >
                @csrf
                <div class="form-group">
                  <label for="name">Current Password </label>
                  <input id="current_password" type="password"  class="form-control" name="oldpassword" aria-describedby="name"  placeholder="Old Password">
                  @error('oldpassword') <span class="text-danger"> {{$message}}</span> @enderror
                </div>
                <div class="form-group">
                  <label for="password">New Password </label>
                  <input id="password" type="password" class="form-control" id="password" name="password" placeholder="New Password">
                  @error('password') <span class="text-danger"> {{$message}}</span> @enderror

                </div>
            
                <div class="form-group">
                    <label for="password">Confirm Password  </label>
                    <input type="password" class="form-control" id="password_confirmation"   name="password_confirmation" placeholder="Confirm Password">
                  @error('password') <span class="text-danger"> {{$message}}</span> @enderror

                  </div>

               
                <button type="submit" class="btn btn-primary">Update Password</button>
              </form>

</div>
</div>


@endsection