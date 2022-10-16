@extends('admin.admin_master')
@section('admin')

    <!-- ########## START: MAIN PANEL ########## -->
 
  
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Brand Table</h5>

          </div><!-- sl-page-title -->
  
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Brand list 
                <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New</a>
            </h6>

@error('brand_name')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">#</th>
                    <th class="wd-15p">Brand  name</th>
                    <th class="wd-15p">Brand  Logo</th>

                    <th class="wd-20p">Action</th>

                  </tr>
                </thead>
                <tbody>
                  @if (isset($viewbrands))
                  @foreach ($viewbrands as $key => $items )
                  <tr>
                    <td>{{$key+1}}</td>

                    <td>{{$items->brand_name}}</td>
                    <td>
                        <img src="{{(!empty($items->brand_logo)) 
                        ? asset($items->brand_logo):url('upload/no_image.jpg')}}" alt="" height="70px" width="80px">
                        </td>

                    <td> 
                        <a href="{{route('editbrand' ,$items->id)}}" class="btn btn-sm btn-info "> Edit </a>
                        <a href="{{route('deleteBrand',$items->id)}}" class="btn btn-sm btn-danger " id="delete"> Delete </a>

                    </td>
                  </tr>
                  @endforeach
                  @else
                    <tr><td>No Brand Record found</td></tr>
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
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Brand Add</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
       

 <form method="post" action="{{route('store.Brand')}}" enctype="multipart/form-data">
  @csrf
   <div class="modal-body pd-20"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Brand Name</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Brand"
     name="brand_name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Brand Logo</label>
    <input type="file" class="form-control"  aria-describedby="emailHelp" placeholder="Brand Logo"
     name="brand_logo">
    
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