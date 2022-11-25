@extends('admin.admin_master')


@section('title')
Update User
@endsection
@section('admin')

<div class="sl-pagebody">

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update User

        </h6>
        <p class="mg-b-20 mg-sm-b-30">New Admin Add </p>

     <form method="post" action="{{ route('update.adminrole',$editRoles->id) }}" >    
      @csrf

        <div class="form-layout">
          <div class="row mg-b-25">
            <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label"> Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="name"  value="{{$editRoles->name}}" required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone"  value="{{$editRoles->phone}}" required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="email"   value="{{$editRoles->email}}" required="">
                </div>
              </div><!-- col-4 -->





          </div><!-- row -->


          <div class="row">

            <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" name="category" value="1" {{$editRoles->category == 1 ? 'checked' : ''}}  >
              <span>Category</span>
            </label>
    
            </div> <!-- col-4 --> 
    
             <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" name="coupon" value="1" {{$editRoles->coupon == 1 ? 'checked' : ''}}>
              <span>Coupon</span>
            </label>
    
            </div> <!-- col-4 --> 
    
    
    
             <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" name="product" value="1" {{$editRoles->product == 1 ? 'checked' : ''}}>
              <span>Product</span>
            </label>
    
            </div> <!-- col-4 --> 
    
    
             <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" name="blog" value="1" {{$editRoles->blog == 1 ? 'checked' : ''}}>
              <span>  Blog </span>
            </label>
    
            </div> <!-- col-4 --> 
    
     <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" name="order" value="1" {{$editRoles->order == 1 ? 'checked' : ''}}>
              <span>Order</span>
            </label>
    
            </div> <!-- col-4 --> 
    
    <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" name="other" value="1" {{$editRoles->other == 1 ? 'checked' : ''}}>
              <span>Other </span>
            </label>
    
            </div> <!-- col-4 --> 
    
    
            <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" name="report" value="1"  {{$editRoles->report == 1 ? 'checked' : ''}}>
              <span> Report</span>
            </label>
    
            </div> <!-- col-4 --> 
    
    
             <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" name="role" value="1"  {{$editRoles->role == 1 ? 'checked' : ''}}>
              <span> Role</span>
            </label>
    
            </div> <!-- col-4 --> 
    
    
             <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" name="return" value="1" {{$editRoles->return == 1 ? 'checked' : ''}}>
              <span>  Return</span>
            </label>
    
            </div> <!-- col-4 --> 
    
    
    
             <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" name="contact" value="1"  {{$editRoles->contact == 1 ? 'checked' : ''}}>
              <span>  Contact</span>
            </label>
    
            </div> <!-- col-4 --> 
    
    
             <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" name="comment" value="1" {{$editRoles->comment == 1 ? 'checked' : ''}}>
              <span>  Comment</span>
            </label>
    
            </div> <!-- col-4 --> 
    
    
             <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" name="setting" value="1" {{$editRoles->setting == 1 ? 'checked' : ''}}>
              <span>  Setting</span>
            </label>
    
            </div> <!-- col-4 --> 
    
    
             <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" name="stock" value="1" {{$editRoles->stock == 1 ? 'checked' : ''}}>
              <span>  Stock</span>
            </label>
    
            </div> <!-- col-4 --> 
    
    
    
     
    
              </div><!-- end row --> 
<br><br>


          <div class="form-layout-footer">
            <button type="submit" class="btn btn-info mg-r-5">Submit  </button>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
      </div><!-- card -->

      </form> 

</div>

@endsection