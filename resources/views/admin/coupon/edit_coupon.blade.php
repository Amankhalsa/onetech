@extends('admin.admin_master')
@section('admin')

    <!-- ########## START: MAIN PANEL ########## -->
 
  
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Update Coupon </h5>

          </div><!-- sl-page-title -->
  
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update Coupon  
            </h6>

            @error('category_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
         

            <form method="post" action="{{route('update.coupon' , $editCoupon->id)}}">
                @csrf
                <div class="modal-body pd-20"> 
        
                    <div class="form-group">
                        <label for="Coupon">Coupon Name</label>
                        <input type="text" class="form-control" id="Coupon" aria-describedby="emailHelp" placeholder="Coupon code"
                        name="coupon" value="{{$editCoupon->coupon}}">
                    </div>
        
                    <div class="form-group">
                        <label for="discount">Coupon discount</label>
                        <input type="text" class="form-control" id="discount" aria-describedby="emailHelp" placeholder="Coupon discount "
                        name="discount" value="{{$editCoupon->discount}}">
                    </div>
            
                </div><!-- modal-body -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info pd-x-20">Sumbit</button>
                  <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
            </form>
          </div><!-- card -->
  
     




  

  
        </div><!-- sl-pagebody -->


      <!-- ########## END: MAIN PANEL ########## -->
@endsection