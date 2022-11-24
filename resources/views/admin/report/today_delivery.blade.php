@extends('admin.admin_master')
@section('admin')

    <!-- ########## START: MAIN PANEL ########## -->
 
  
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Today  Delivery </h5>

          </div><!-- sl-page-title -->
  
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Today Delivery
                <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New</a>
            </h6>

@error('category_name')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">Payment Type</th>
                    <th class="wd-15p">Transction ID</th>
                    <th class="wd-15p">SubTotal</th>
                    <th class="wd-20p">Shipping</th>
                    <th class="wd-20p">Total</th>
                    <th class="wd-20p">Date</th>
                    <th class="wd-20p">Status</th>
                    <th class="wd-20p">Action</th>

                  </tr>
                </thead>
                <tbody>
                  @if (isset($orders))
                  @foreach ($orders as $key => $row )
                  <tr>
                    <td>{{$row->payment_type}}</td>
                    <td>{{$row->blnc_transection}}</td>
                    <td>${{$row->subtotal}}</td>
                    <td>{{$row->shipping}}</td>
                    <td>${{$row->total}}</td>
                    <td>{{$row->date}}</td>
                    <td>         
                        @if($row->status == 0)
                        <span class="badge badge-warning">Pending</span>
                        @elseif($row->status == 1)
                        <span class="badge badge-info">Payment Accept</span>
                        @elseif($row->status == 2)
                        <span class="badge badge-warning">Progress</span>
                        @elseif($row->status == 3)
                        <span class="badge badge-success">Delevered</span>
                        @else
                        <span class="badge badge-danger">Cancle</span>
                          @endif  
                         </td>
                    <td> 
                        <a href="{{route('admin.view.order', $row->id)}}" class="btn btn-sm btn-info "> View </a>
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
  
     
  




  

  
        </div><!-- sl-pagebody -->


      <!-- ########## END: MAIN PANEL ########## -->
@endsection