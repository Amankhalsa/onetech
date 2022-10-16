@extends('admin.admin_master')
@section('admin')

    <!-- ########## START: MAIN PANEL ########## -->
 
  
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Sub Category </h5>

          </div><!-- sl-page-title -->
  
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update Sub Category  
  
            </h6>

            @error('subcategory_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
         

            <form method="post" action="{{route('update.subcategory' ,$editSubcat->id)}}">
                @csrf
                 <div class="modal-body pd-20"> 
              
              
                <div class="form-group">
                  <label for="exampleInputEmail1">Sub Category Name</label>
              
                   <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sub Category"
                   name="subcategory_name" value="{{$editSubcat->subcategory_name}}">
                   @error('subcategory_name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name</label>
              
              <select  class="form-control" name="category_id">
                  <option disabled selected>Choose Options</option>
                  @if(isset($category))
                  @foreach ($category as $val )
                      
                  <option value="{{$val->id}}"  {{$val->id == $editSubcat->category_id ? 'selected' : '' }}>{{$val->category_name}}</option>
                  @endforeach
                  @endif
              
              
              </select>
              @error('category_id')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                </div>
                  
                      </div><!-- modal-body -->
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Sumbit</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                      </div>
                        </form>

          </div><!-- card -->
  
     
  
  <!-- LARGE MODAL -->
  <div id="modaldemo3" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content tx-size-sm">
        <div class="modal-header pd-x-20">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Category Add</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
       

      </div>
    </div><!-- modal-dialog -->
  </div><!-- modal -->



  

  
        </div><!-- sl-pagebody -->


      <!-- ########## END: MAIN PANEL ########## -->
@endsection