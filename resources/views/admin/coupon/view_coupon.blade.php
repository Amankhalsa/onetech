@extends('admin.admin_master')
@section('admin')

    <!-- ########## START: MAIN PANEL ########## -->
 
  
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Coupon Table</h5>

          </div><!-- sl-page-title -->
  
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Coupon list 
                <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New</a>
            </h6>

@error('category_name')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">#</th>
                    <th class="wd-15p">Coupon  code</th>
                    <th class="wd-15p">Coupon  Discount</th>

                    <th class="wd-20p">Action</th>

                  </tr>
                </thead>
                <tbody>
                  @if (isset($viewCoupon))
                  @foreach ($viewCoupon as $key => $row )
                  <tr>
                    <td>{{$key+1}}</td>

                    <td>{{$row->coupon	}}</td>
                    <td>{{$row->discount	}}%</td>

                    <td> 
                        <a href="{{route('editcoupon' ,$row ->id )}}" class="btn btn-sm btn-info "> Edit </a>
                        <a href="{{route('deletecoupon',$row ->id )}}" class="btn btn-sm btn-danger " id="delete"> Delete </a>

                    </td>
                  </tr>
                  @endforeach
                  @else
                    <tr><td colspan="3" class="text-center">No Record found</td></tr>
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
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Coupon Add</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
       

    <form method="post" action="{{route('store.coupon')}}">
        @csrf
        <div class="modal-body pd-20"> 

            <div class="form-group">
                <label for="Coupon">Coupon Name</label>
                <input type="text" class="form-control" id="Coupon" aria-describedby="emailHelp" placeholder="Coupon code"
                name="coupon">
            </div>

            <div class="form-group">
                <label for="discount">Coupon discount</label>
                <input type="text" class="form-control" id="discount" aria-describedby="emailHelp" placeholder="Coupon discount "
                name="discount">
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