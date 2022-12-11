@extends('admin.admin_master')
@section('admin')

    <!-- ########## START: MAIN PANEL ########## -->
 
  
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Newsletter Table</h5>

          </div><!-- sl-page-title -->


          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Order List  </h6>
             
  
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">Name</th>
                    <th class="wd-15p">Phone</th>
                    <th class="wd-15p">Email</th>
                    <th class="wd-20p">Message</th> 
                    <th class="wd-20p">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($message as $row)
                  <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->phone }}</td>
                    <td>{{ $row->email }}  </td>
                    <td>{{ $row->message }}  </td>
                    
  
                    <td>
                      <a href="javascript:void(0)" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modaldemo{{$row->id}}">View</a>
                      
                    </td>
                     
                  </tr>

                    <!-- LARGE MODAL -->
        <div id="modaldemo{{$row->id}}" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Message Preview</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-20">
                  <h4 class=" lh-3 mg-b-20"><a href="" class="tx-inverse hover-primary">
                Message View     
                </a></h4>
                  <p class="mg-b-5">
                    {{ $row->message }}    
                </p>
                </div><!-- modal-body -->
                <div class="modal-footer">
    
                </div>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->
                  @endforeach
                   
                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card -->
        </div>

@endsection