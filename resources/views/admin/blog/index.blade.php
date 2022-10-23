@extends('admin.admin_master')
@section('title')
View Blog Post
@endsection
@section('admin')

    <!-- ########## START: MAIN PANEL ########## -->
 
  
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>All Blog Post</h5>

          </div><!-- sl-page-title -->
  
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Product list 
                <a href="{{route('add_Blog_Post')}}" class="btn btn-sm btn-warning" style="float: right;"  >Add Product</a>
            </h6>


            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p" >	Category</th>
                    <th class="wd-15p" >	Blog Post title</th>
                    <th class="wd-15p" >	Image</th>
                    <th class="wd-15p" >	Details</th>               
                    <th class="wd-15p" >Status</th>
                    <th class="wd-20p" >Action</th>

                  </tr>
                </thead>
                <tbody>
   
               
                  @foreach($blogpost as $row)
                  <tr>
                      <td>{{ $row->category_name_en }}</td>
                    <td>{{ $row->post_title_en }}</td>
                    <td> <img src="{{ URL::to($row->post_image) }}" height="50px;" width="50px;"> </td>
                    <td>
                        {{Str::limit(	$row->details_en ,30,$end='....')}}
                    </td>
  <td></td>
                    <td>
              <a href="{{route('edit.blogPost' , $row->id)}}" class="btn btn-sm btn-info" title="edit"><i class="fa fa-edit"></i></a>
              {{-- <a href="{{route('show.product' , $row->id)}}" class="btn btn-sm btn-warning" title="Show"><i class="fa fa-eye"></i></a> --}}
              <a href="{{route('delete.blogpost' , $row->id)}}" class="btn btn-sm btn-danger" title="delete" id="delete"><i class="fa fa-trash"></i></a>

        
  
  
                    </td>
                     
                  </tr>
                  @endforeach


                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card -->
  
     
  



  

  
        </div><!-- sl-pagebody -->


      <!-- ########## END: MAIN PANEL ########## -->
@endsection