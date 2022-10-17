@extends('admin.admin_master')
@section('title')
All Product
@endsection
@section('admin')

    <!-- ########## START: MAIN PANEL ########## -->
 
  
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>All Product Table</h5>

          </div><!-- sl-page-title -->
  
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Product list 
                <a href="{{route('create_Product')}}" class="btn btn-sm btn-warning" style="float: right;"  >Add Product</a>
            </h6>


            <div class="table-wrapper">
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
   
               
            


                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card -->
  
     
  



  

  
        </div><!-- sl-pagebody -->


      <!-- ########## END: MAIN PANEL ########## -->
@endsection