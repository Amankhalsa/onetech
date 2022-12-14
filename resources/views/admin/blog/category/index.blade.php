@extends('admin.admin_master')
@section('title')
Blog Category 
@endsection
@section('admin')

    <!-- ########## START: MAIN PANEL ########## -->
 
  
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Blog Category Table</h5>

          </div><!-- sl-page-title -->
  
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Blog Category list 
                <a href="#" class="btn btn-sm btn-warning" style="float: right;" 
                data-toggle="modal" data-target="#modaldemo3">Add New Category</a>
            </h6>
{{-- category_name_en --}}
@error('category_name_en')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
{{-- category_name_in --}}
@error('category_name_in')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">#</th>
                    <th class="wd-15p">Category  name en</th>
                    <th class="wd-15p">Category  name hin</th>

                    <th class="wd-20p">Action</th>

                  </tr>
                </thead>
                <tbody>
                  @if (isset($blogcat))
                  @foreach ($blogcat as $key => $row )
                  <tr>
                    <td>{{$key+1}}</td>

                    <td>{{$row->category_name_en	}}</td>
                    <td>{{$row->category_name_in	}}</td>

                    <td> 
                        <a href="{{route('edit_blog_cat' ,$row->id)}}" class="btn btn-sm btn-info "> Edit </a>
                        <a href="{{route('delete_blog_cat',$row->id)}}" class="btn btn-sm btn-danger " id="delete"> Delete </a>

                    </td>
                  </tr>
                  @endforeach
             
                  @endif
            


                </tbody>
              </table>
            </div><!-- table-wrapper -->
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
       

 <form method="post" action="{{route('store.blogcategory')}}">
  @csrf
   <div class="modal-body pd-20"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Category Name Eng</label>
    <input type="text" class="form-control"  placeholder="Category English"
     name="category_name_en">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Category Name Hin</label>
    <input type="text" class="form-control"  placeholder="Category Hindi"
     name="category_name_in">
    
  </div>
    
        </div><!-- modal-body -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info pd-x-20">Sumbit</button>
          <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
        </div>
          </form>
      </div>
    </div><!-- modal-dialog -->
  </div><!-- modal -->



  

  
        </div><!-- sl-pagebody -->


      <!-- ########## END: MAIN PANEL ########## -->
@endsection