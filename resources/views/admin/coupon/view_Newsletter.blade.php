@extends('admin.admin_master')
@section('admin')

    <!-- ########## START: MAIN PANEL ########## -->
 
  
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Newsletter Table</h5>

          </div><!-- sl-page-title -->
  
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Newsletter list 
                <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New</a>
            </h6>


            <div class="table-wrapper">
              <form action="{{ route('all.delete') }}"  method="post"  >
                <button class="btn btn-success" type="submit" >All delete</button>
            @csrf
            @method('DELETE')
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Email</th>
                  <th class="wd-15p">Subscribiing Time</th>
                  <th class="wd-20p">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if (isset($viewNewsletter))
                  @foreach ($viewNewsletter as $key => $row )
                  <tr>
                    <td><input type="checkbox" name="ids[]" value="{{$row->id}}" class='check_del'> {{$key+1}}</td>
                    <td>{{$row->email	}}</td>
                    <td>{{ \Carbon\Carbon::parse($row->created_at)->diffForhumans()  }}</td>
                    <td> <a href="{{route('deletenewsletter',$row->id)}}" class="btn btn-sm btn-danger " id="delete"> Delete </a></td>
                  </tr>
                  @endforeach
                  @else
                    <tr><td colspan="4" class="text-center">No Record found</td></tr>
                  @endif
            


                </tbody>
              </table>
            </form>
            </div><!-- table-wrapper -->
          </div><!-- card -->
  
     
  
  <!-- LARGE MODAL -->
  <div id="modaldemo3" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content tx-size-sm">
        <div class="modal-header pd-x-20">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Newsletter Add</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
       

    <form method="post" action="{{route('store.coupon')}}">
        @csrf
        <div class="modal-body pd-20"> 

            <div class="form-group">
                <label for="Coupon">Newsletter Name</label>
                <input type="text" class="form-control" id="Coupon" aria-describedby="emailHelp" placeholder="email "
                name="email">
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