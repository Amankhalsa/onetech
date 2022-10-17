<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
   
    <link href="{{asset('adminbackend/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('adminbackend/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('adminbackend/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('adminbackend/lib/rickshaw/rickshaw.min.css')}}" rel="stylesheet">

     <!-- Tags Input CDN CSS -->
<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>

<!-- chart -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    <link href="{{asset('adminbackend/lib/highlightjs/github.css')}}" rel="stylesheet">
    <link href="{{asset('adminbackend/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('adminbackend/lib/select2/css/select2.min.css')}}" rel="stylesheet">
{{-- Editor  --}}
    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('adminbackend/css/starlight.css')}}">
        <link href="{{ asset('adminbackend/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">
{{-- Editor  --}}
  
      </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
@include('admin.body.sidebar')
    <!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
@include('admin.body.header')
 
    <!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->



    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        @include('admin.body.breadcrumb')
   
        
    
      @yield('admin')
      <!-- sl-pagebody -->
    @include('admin.body.footer')
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="{{asset('adminbackend/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('adminbackend/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('adminbackend/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('adminbackend/lib/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('adminbackend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>

    <script src="{{asset('adminbackend/lib/highlightjs/highlight.pack.js')}}"></script>
<script src="{{asset('adminbackend/lib/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('adminbackend/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
<script src="{{asset('adminbackend/lib/select2/js/select2.min.js')}}"></script>
<script>
  $(function(){
    'use strict';

    $('#datatable1').DataTable({
      responsive: true,
      language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
      }
    });

    $('#datatable2').DataTable({
      bLengthChange: false,
      searching: false,
      responsive: true
    });

    // Select2
    $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

  });
</script>

    <script src="{{asset('adminbackend/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('adminbackend/lib/d3/d3.js')}}"></script>
    <script src="{{asset('adminbackend/lib/rickshaw/rickshaw.min.js')}}"></script>
    <script src="{{asset('adminbackend/lib/chart.js/Chart.js')}}"></script>
    <script src="{{asset('adminbackend/lib/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('adminbackend/lib/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('adminbackend/lib/Flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('adminbackend/lib/flot-spline/jquery.flot.spline.js')}}"></script>

{{-- Texteditor --}}
    <script src="{{ asset('adminbackend/lib/medium-editor/medium-editor.js') }}"></script>
    <script src="{{ asset('adminbackend/lib/summernote/summernote-bs4.min.js') }}"></script>
   
   <script>
     $(function(){
       'use strict';

       // Inline editor
       var editor = new MediumEditor('.editable');

       // Summernote editor
       $('#summernote').summernote({
         height: 150,
         tooltip: false
       })
     });
   </script>
{{-- Texteditor --}}

    <script src="{{asset('adminbackend/js/starlight.js')}}"></script>
    <script src="{{asset('adminbackend/js/ResizeSensor.js')}}"></script>
    <script src="{{asset('adminbackend/js/dashboard.js')}}"></script>
     <!-- Toaster Javascript cdn -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>


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
   
   <script>  
    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
           swal({
             title: "Are you Want to delete?",
             text: "Once Delete, This will be Permanently Delete!",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
                  window.location.href = link;
             } else {
               swal("Safe Data!");
             }
           });
       });
</script>

  </body>
</html>
