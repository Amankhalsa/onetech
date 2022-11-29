
	@extends('frontend.front_master')
	@section('content')
	<!-- Header -->

    
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/contact_styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/contact_responsive.css')}}">
	<!-- Banner -->
    <div class="contact_form">
        <div class="container"> 
          <div class="row">
            <div class="col-8 card">
              <table class="table table-response">
                <thead>
                  <tr>
                    <th scope="col">Payment Type </th>
                    <th scope="col">Return </th>
                    <th scope="col">Amount </th>
                    <th scope="col">Date </th>
       
                    <th scope="col">Status  </th>

                    <th scope="col">Action </th>
      
                  </tr>
                </thead>
                <tbody>
               @if(isset( $order))
               @foreach($order as $row)
                  <tr>
                    <td scope="col">{{	$row->payment_type}} </td>
                    <td scope="col">      
                        @if($row->return_order == 0)
                        <span class="badge badge-warning">No Request</span>
                        @elseif($row->return_order == 1)
                        <span class="badge badge-info">Pending</span>
                          @elseif($row->return_order == 2)
                          <span class="badge badge-warning">Success</span>
                           
                        @endif  
                         </td>


                    <td scope="col">{{	$row->paying_amount}} </td>
                    <td scope="col">  {{	$row->date}}</td>



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
      
                    <td scope="col">
            
                   @if($row->return_order == 0)
                   <a href="{{route('user.return.order',$row->id)}}" class="btn btn-sm btn-danger"> Return</a>
                    @elseif($row->return_order == 1)
                    <span class="badge badge-info">Pending</span>
                        @elseif($row->return_order == 2)
                        <span class="badge badge-warning">Success</span>
                                  
                               @endif  
                     </td>
                  </tr>

                 @endforeach
                 @endif
      
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