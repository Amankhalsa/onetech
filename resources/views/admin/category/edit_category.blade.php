@extends('admin.admin_master')
@section('admin')

    <!-- ########## START: MAIN PANEL ########## -->
 
  
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Category Table</h5>

          </div><!-- sl-page-title -->
  
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Category update 
            </h6>

            <form method="post" action="{{route('updateCategory' ,$editCategory->id)}}">
                @csrf
           
                <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Category"
                    name="category_name" value="{{$editCategory->category_name}}">
                    
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