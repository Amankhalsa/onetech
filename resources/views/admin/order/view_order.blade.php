@extends('admin.admin_master')
@section('admin')

    <!-- ########## START: MAIN PANEL ########## -->
 
  
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5> Order Detail:</h5>

            <div class="row">
                <div class="col-md-6">
                      <div class="card">
                          <div class="card-header"><strong>Order</strong> Details</div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                <th> Name: </th>
                                <th> {{ $order->name }} </th>		
                                    </tr>
                                    <tr>
                                <th> Phone: </th>
                                <th> {{ $order->phone }} </th>		
                                    </tr>
                                    <tr>
                                <th> Payment Type: </th>
                                <th>{{ isset($order->payment_type) ? $order->payment_type :"NA" }} </th>		
                                    </tr>
                                    <tr>
                                <th> Payment Id: </th>
                                <th> {{ $order->payment_id }} </th>		
                                    </tr>
                                    <tr>
                                <th> Total : </th>
                                <th> {{ $order->total }} $ </th>		
                                    </tr>
                                    <tr>
                                <th> Month: </th>
                                <th> {{ $order->month }} </th>		
                                    </tr>
                                        <tr>
                                <th> Date: </th>
                                <th> {{ $order->date }} </th>		
                                    </tr>
                                </table>
                         </div>
                    </div>
                </div>  

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><strong>Shipping</strong> Details</div>
                 <div class="card-body">
                     <table class="table">
                         <tr>
                     <th> Name: </th>
                     <th> {{ isset($shipping->ship_name) ? $shipping->ship_name : "NA" }} </th>		
                         </tr>
                         <tr>
                     <th> Phone: </th>
                     <th> {{isset( $shipping->ship_phone) ?  $shipping->ship_phone : "NA" }} </th>		
                         </tr>
                         <tr>
                     <th> Email: </th>
                     <th>{{isset( $shipping->ship_email) ?  $shipping->ship_email : "NA" }} </th>		
                         </tr>
                         <tr>
                     <th> Address: </th>
                     <th> {{ isset($shipping->ship_address) ? $shipping->ship_address : "NA" }} </th>		
                         </tr>
                         <tr>
                     <th> City : </th>
                     <th> {{ isset($shipping->ship_city) ? $shipping->ship_city : "NA" }} </th>		
                         </tr>
                         <tr>
                            <th> Status: </th>
                            <th>
                                @if($order->status == 0)
                                <span class="badge badge-warning">Pending</span>
                                @elseif($order->status == 1)
                                <span class="badge badge-info">Payment Accept</span>
                                @elseif($order->status == 2)
                                <span class="badge badge-info">Progress</span>
                                @elseif($order->status == 3)
                                <span class="badge badge-success">Delevered</span>
                                @else
                                <span class="badge badge-danger">Cancle</span>
                                @endif  
                            </th>	
                         </tr>
                     </table> 
                   </div> 
                 </div>     
            </div>

            </div> 


            {{-- ======================================= --}}
            <div class="row">
                <div class="col-md-12">
                      <div class="card">
                          <div class="card-header"><strong>Order</strong> Details</div>
                            <div class="card-body">
                                <table class="table display responsive nowrap">
                                    <thead>
                                      <tr>
                                        <th class="wd-15p">Product ID</th>
                                        <th class="wd-15p">Product Name</th>
                                        <th class="wd-15p">Image</th>
                                        <th class="wd-15p">Color</th>
                                        <th class="wd-15p">Size</th>
                                        <th class="wd-15p">Quantity</th>
                                        <th class="wd-15p">Unit Price</th>
                                        <th class="wd-20p">Total</th>
                                        
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($details as $row)
                                      <tr>
                                        <td>{{ $row->product_code }}</td>
                                        <td>{{ $row->product_name }}</td>
                      
                                   <td> <img src="{{ URL::to($row->image_one) }}" height="50px;" width="50px;"> </td>
                                       <td>{{ $row->color }}</td>
                                       <td>{{ $row->size }}</td>
                                       <td>{{ $row->quantity }}</td>
                                       <td>{{ $row->singleprice }}</td>
                                       <td>{{ $row->totalprice }}</td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                  </table>

                         </div>
                    </div>
                </div>  
            </div> 
            {{-- ============================================= --}} 
                 @if($order->status == 0)
                 <a href="{{ route('admin.payment.accept',$order->id) }}" class="btn btn-info">Payment Accept </a>
                 <a href="{{ route('admin.payment.cancel',$order->id) }}" class="btn btn-danger">Order Cancel </a>
                 @elseif($order->status == 1)
                 <a href="{{ route('admin.delevery.process',$order->id) }}" class="btn btn-info">Process Delevery </a>
                 @elseif($order->status == 2)
                 <a href="{{ route('admin.delevery.done',$order->id) }}" class="btn btn-success">Delevery Done </a>
                 @elseif($order->status == 4)
                 <strong class="text-danger text-center"> This order are not valid  </strong>
                 @else
                 <strong class="text-success text-center">This product are successfuly Deleverd  </strong>
                 @endif

          </div>
        </div>
        @endsection