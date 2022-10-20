@extends('admin.admin_master')
@section('title')
Blog Category 
@endsection
@section('admin')

    <!-- ########## START: MAIN PANEL ########## -->
 
  
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Blog Category update</h5>

          </div><!-- sl-page-title -->
  
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Blog Category update 
                <a href="{{route('blogcategory_list')}}" class="btn btn-sm btn-success" style="float: right;" 
               >Back</a>
            </h6>
{{-- category_name_en --}}
@error('category_name_en')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
{{-- category_name_in --}}
@error('category_name_in')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
         



<form method="post" action="{{route('update.blogcategory' ,$editblogcat->id)}}">
    @csrf
     <div class="modal-body pd-20"> 
    <div class="form-group">
      <label for="exampleInputEmail1">Category Name Eng</label>
      <input type="text" class="form-control"  placeholder="Category English"
       name="category_name_en"   value="{{$editblogcat->category_name_en}}">
      
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Category Name Hin</label>
      <input type="text" class="form-control"  placeholder="Category Hindi"
       name="category_name_in"    value="{{$editblogcat->category_name_in}}">
      
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