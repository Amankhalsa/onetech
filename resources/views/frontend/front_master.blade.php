<!DOCTYPE html>
<html lang="en">
<head>
<title>OneTech</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">

{{-- new --}}
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/bootstrap4/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}} ">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/slick-1.8.0/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/responsive.css')}}">

<!-- chart -->
         <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

         <link rel="stylesheet" href="sweetalert2.min.css">

     <script src="https://js.stripe.com/v3/"></script>
{{-- new --}}


</head>

<body>
    <div class="super_container">
      @include('frontend.body.header')
      <!-- Banner -->
    
  
@yield('content')

@include('frontend.body.newsletter')
<!-- Footer -->

@include('frontend.body.footer')

<!-- Copyright -->
@include('frontend.body.copyright')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Your Status Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   <form method="post" action="{{ route('order.tracking') }}">
    @csrf
    <div class="modal-body">
        <label> Status Code</label>
        <input type="text" name="code" required="" class="form-control" placeholder="Your Order Status Code">        
    </div>
     
     <button class="btn btn-danger" type="submit">Track Now </button>  

   </form>
  
        
      </div>
       
    </div>
  </div>
</div>

    </div>



<script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('frontend/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('frontend/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{asset('frontend/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{asset('frontend/plugins/easing/easing.js')}}"></script>
<script src="{{asset('frontend/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
<script src="{{asset('frontend/js/blog_custom.js')}}"></script>
<script src="{{asset('frontend/js/blog_single_custom.js')}}"></script>
<script src="{{asset('frontend/js/cart_custom.js')}}"></script>
<script src="{{asset('frontend/js/custom.js')}}"></script>
{{-- @if(Request::is('login') )  --}}
<script src="{{asset('frontend/js/contact_custom.js')}}"></script>

{{-- @endif --}}
@if(Route::is('product_detail') ) 
<script src="{{asset('frontend/js/product_custom.js')}}"></script>
@endif
{{-- smart alert  --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
     <!-- Toaster Javascript cdn -->
    
{{-- add to --}}

<script type="text/javascript">
    
    $(document).ready(function(){
      $('.addwishlist').on('click', function(){
         var id = $(this).data('id');
         if (id) {
             $.ajax({
                 url: " {{ url('add-to-wishlist/') }}/"+id,
                 type:"GET",
                 datType:"json",
                 success:function(data){
              const Toast = Swal.mixin({
                   toast: true,
                   position: 'top-end',
                   showConfirmButton: false,
                   timer: 3000,
                   timerProgressBar: true,
                   onOpen: (toast) => {
                     toast.addEventListener('mouseenter', Swal.stopTimer)
                     toast.addEventListener('mouseleave', Swal.resumeTimer)
                   }
                 })
 
              if ($.isEmptyObject(data.error)) {
 
                 Toast.fire({
                   icon: 'success',
                   title: data.success
                 })
              }else{
                  Toast.fire({
                   icon: 'error',
                   title: data.error
                 })
              }
  
 
                 },
             });
 
         }else{
             alert('danger');
         }
      });
 
    });
 
 
 </script>
 {{-- add to cart  --}}
 

 {{-- add to cart  --}}

 {{-- add to cart  --}}

 {{-- <script type="text/javascript">
    
  $(document).ready(function(){
    $('.addtocart').on('click', function(){
       var id = $(this).data('id');
       if (id) {
           $.ajax({
               url: " {{ url('add-to-cart/') }}/"+id,
               type:"GET",
               datType:"json",
               success:function(data){
            const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 showConfirmButton: false,
                 timer: 3000,
                 timerProgressBar: true,
                 onOpen: (toast) => {
                   toast.addEventListener('mouseenter', Swal.stopTimer)
                   toast.addEventListener('mouseleave', Swal.resumeTimer)
                 }
               })

            if ($.isEmptyObject(data.error)) {

               Toast.fire({
                 icon: 'success',
                 title: data.success
               })
            }else{
                Toast.fire({
                 icon: 'error',
                 title: data.error
               })
            }


               },
           });

       }else{
           alert('danger');
       }
    });

  });


</script> --}}
<!-- Large modal -->

<script type="text/javascript">
  function productview(id){
      $.ajax({
       url: "{{ url('cart/product/view/') }}/"+id, 
       type: "GET",
       dataType:"json",
       success:function(data){
      $('#pname').text(data.product.product_name);
      $('#pimage').attr('src',data.product.image_one);
      $('#pcode').text(data.product.product_code);
      $('#pcat').text(data.product.category_name);
      $('#psub').text(data.product.subcategory_name);
      $('#pbrand').text(data.product.brand_name);
      $('#product_id').val(data.product.id);


      var d = $('select[name="color"]').empty();
       $.each(data.color,function(key,value){
       $('select[name="color"]').append('<option value="'+value+'">'+value+'</option>'); 
        });
        var d = $('select[name="size"]').empty();
       $.each(data.size,function(key,value){
       $('select[name="size"]').append('<option value="'+value+'">'+value+'</option>'); 
        });

    }
  })
}
 </script>
<!-- Large modal -->
<div class="modal fade" id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLavel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLavel">Product Quick View</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="modal-body">
         <div class="row">
          {{-- col md 4 start  --}}

          <div class="col-md-4">
            <div class="card text-center">
              <img src="" alt="" id="pimage" style="height: 220px; width: 200px;">
              <div class="card-body">
               <h5 class="card-title text-center" id="pname" >  </h5>
               
              </div>
            </div>
            
          </div>
          {{-- col md 4 end  --}}
            {{-- col md 4 start  --}}

            <div class="col-md-4">
              <ul class="list-group">
                <li class="list-group-item">Product Code:<span id="pcode"></span> </li>
                <li class="list-group-item">Category: <span id="pcat"></span></li>
                <li class="list-group-item">Subcategory: <span id="psub"></span></li>
                <li class="list-group-item">Brand:<span id="pbrand"></span> </li>
                <li class="list-group-item">Stock: <span class="badge" style="background: green;color: white;" > Available</span> </li>
              </ul>
              
            </div>
            {{-- col md 4 end  --}}
                    {{-- col md 4 start  --}}
            <form action="{{route('insert.into.cart')}}" method="POST" >
              @csrf 
              <input type="hidden" name="product_id" id="product_id">

                     <div class="col-md-4">
                      <div class="form-group">
                          <label for="exampleinputcolor">Color</label>
                          <select name="color" class="form-control" id="color">
                            

                          </select>


                      </div>
                      <div class="form-group">
                        <label for="exampleinputcolor">Size</label>
                        <select name="size" class="form-control" id="size">
                

                        </select>


                    </div>
                    <div class="form-group">
                      <label for="exampleinputcolor">Qyt</label>
                      <input type="number" class="form-control" name="qty" value="1">
                  </div>
                      
                  <button class="btn btn-primary">Add to Cart</button>
                    </div>
                  </form>

                    {{-- col md 4 end  --}}
         </div>
      </div>
      <div class="modal-footer">

      </div>

    </div>
  </div>
</div>

<!-- Small modal -->

<!-- Small modal -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
     
     
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
       case 'info':
       toastr.info(" {{ Session::get('message') }} ");
       break;
   
       case 'success':
       toastr.success(" {{ Session::get('message') }} ");
       break;
   
       case 'warning':
       toastr.warning(" {{ Session::get('message') }} ");
       break;
   
       case 'error':
       toastr.error(" {{ Session::get('message') }} ");
       break; 
    }
    @endif 
   </script>
   		
</body>


</html>