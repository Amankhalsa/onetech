
	@extends('frontend.front_master')
	@section('content')
	<!-- Header -->

    
	<!-- Banner -->
    <div class="contact_form">
        <div class="container"> 
          <div class="row">
            <div class="col-8 card">
              <table class="table table-response">
                <thead>
                  <tr>
                    <th scope="col">Payment Type </th>
                    <th scope="col">Payment ID </th>
                    <th scope="col">Amount </th>
                    <th scope="col">Date </th>
                    <th scope="col">Status  </th>
                    <th scope="col">Status Code </th>
                    <th scope="col">Action </th>
      
                  </tr>
                </thead>
                <tbody>
               
                  <tr>
                    <td scope="col"> </td>
                    <td scope="col"> </td>
                 
      
                     <td scope="col">
      
             
      
                      </td>
      
                    <td scope="col"> </td>
                    <td scope="col">
                   <a href="" class="btn btn-sm btn-info"> View</a>
                     </td>
                  </tr>
                 
      
                </tbody>
                
              </table>
              
            </div>
      
         {{-- profile right pane  --}}
      @include('user.body.profile_rightpane')
      {{-- profile right pane  --}}
      
          </div>
      
        </div>
        
      
      </div>

    @include('frontend.body.footer')

    <!-- Copyright -->
    @include('frontend.body.copyright')
@endsection