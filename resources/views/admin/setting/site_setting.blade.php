@extends('admin.admin_master')
@section('title')
Site Setting
@endsection
@section('admin') 

        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>@yield('title')</h5>
          </div><!-- sl-page-title -->

          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Site Setting   </h6>
             
  
         <form method="post" action="{{ route('admin.update.sitesetting',$setting->id )  }}" >    
                 @csrf
            <div class="form-layout">
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label"> Phone One: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="phone_one" required="" value="{{ $setting->phone_one }}">
                  </div>
                </div><!-- col-4 -->
  
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Phone Two: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="phone_two" required="" value="{{ $setting->phone_two }}">
                  </div>
                </div><!-- col-4 -->
  
  
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="email" name="email" required="" value="{{ $setting->email }}">
                  </div>
                </div><!-- col-4 -->
  
  
  
  
  <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Compay Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="company_name" required="" value="{{ $setting->company_name }}">
                  </div>
                </div><!-- col-4 -->
   
                  <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Company Address: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="company_address" required="" value="{{ $setting->company_address }}">
                  </div>
                </div><!-- col-4 -->
  
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Facebook: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="facebook" required="" value="{{ $setting->facebook }}">
                  </div>
                </div><!-- col-4 -->
  
  
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Youtube: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="youtube" required="" value="{{ $setting->youtube }}">
                  </div>
                </div><!-- col-4 -->
  
  
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">  Instagram: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="instagram" required="" value="{{ $setting->instagram }}">
                  </div>
                </div><!-- col-4 -->
  
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">twitter: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="twitter" required="" value="{{ $setting->twitter }}">
                  </div>
                </div><!-- col-4 -->
  
  
   
  
              </div><!-- row -->
  
    <hr>
   
   
  
            </div><!-- end row --> 
  <br><br>
  
  
              <div class="form-layout-footer">
                <button type="submit" class="btn btn-info mg-r-5">Update  </button>
             
              </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </div>
@endsection