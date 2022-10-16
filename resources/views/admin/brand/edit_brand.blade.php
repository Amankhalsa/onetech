@extends('admin.admin_master')
@section('admin')

    <!-- ########## START: MAIN PANEL ########## -->
 
  
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Brand Table</h5>

          </div><!-- sl-page-title -->
  
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Brand update 
            </h6>

            <form method="post" action="{{route('updateBrand' ,$editebrand->id)}}" enctype="multipart/form-data">
                @csrf
           
                <div class="form-group">
                    <label for="exampleInputEmail1">Brand Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Category"
                    name="brand_name" value="{{$editebrand->brand_name}}">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Brand Logo</label>
                    <input type="file" class="form-control"  aria-describedby="emailHelp" placeholder="Brand Logo"
                     name="brand_logo">
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Old Brand Logo</label><br>

                    <img src="{{(!empty($editebrand->brand_logo)) 
                        ? asset($editebrand->brand_logo):url('upload/no_image.jpg')}}" alt="" height="70px" width="80px">
                    
                  </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info pd-x-20">Sumbit</button>
                  <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
            </form>
          </div>
          <!-- card -->
  
     
  



  

  
        </div><!-- sl-pagebody -->


      <!-- ########## END: MAIN PANEL ########## -->
@endsection