
	@extends('frontend.front_master')
	@section('content')
	<!-- Header -->
@php
   $order =  DB::table('orders')->where('user_id', Auth::id())->orderBy('id','DESC')->limit(10)->get();
@endphp
    
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
                    <th scope="col">Payment ID </th>
                    <th scope="col">Amount </th>
                    <th scope="col">Date </th>
                    <th scope="col">Status  </th>
                    <th scope="col">Status Code </th>
                    <th scope="col">Action </th>
      
                  </tr>
                </thead>
                <tbody>
               @if(isset( $order))
               @foreach($order as $row)
                  <tr>
                    <td scope="col">{{	$row->payment_type}} </td>
                    <td scope="col">{{	Str::limit($row->payment_id, 15, $end='...')}} </td>


                    <td scope="col">{{	$row->paying_amount}} </td>
                    <td scope="col">  {{	$row->date}}</td>
                    <td scope="col">  {{	$row->status}}</td>
                    <td scope="col"> {{	$row->status_code}} </td>


                 
      
                    <td scope="col">
                   <a href="" class="btn btn-sm btn-info"> View</a>
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