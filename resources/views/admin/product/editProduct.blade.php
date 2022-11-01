@extends('admin.admin_master')
@section('title')
Update Product
@endsection
@section('admin')

<div class="sl-pagebody">


    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Product  Page  </h6>
         
        <div class="form-layout">
            <form action="{{route('update.product',$product->id)}}" method="POST"  >
                @csrf

          <div class="row mg-b-25">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label><br>
                <input class="form-control" type="text" name="product_name"  value="{{$product->product_name}}">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label><br>
                <input class="form-control" type="text" name="product_code"  value="{{$product->product_code}}" disabled>
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label><br>
                <input class="form-control" type="text" name="product_quantity" value="{{$product->product_quantity}}" >
                
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Discount Price: <span class="tx-danger">*</span></label><br>
                  <input class="form-control" type="text" name="discount_price"   value="{{$product->discount_price}}">
                  
                </div>
              </div><!-- col-4 -->
             
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Category: <span class="tx-danger">*</span></label><br>
                <select class="form-control select2" data-placeholder="Choose country" name="category_id">
                    <option label="Choose Category"></option>
                    @foreach($category as $row)
                    <option value="{{ $row->id }}" {{$product->category_id == $row->id  ?'selected': ''}}>{{ $row->category_name }}</option>
                    @endforeach
                  </select>
     
              </div>
            </div><!-- col-4 -->


            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label><br>
                <select class="form-control select2" data-placeholder="Choose country" name="subcategory_id">
                    @foreach($subcategory as $subrow)
                    <option value="{{ $subrow->id }}" {{$product->subcategory_id == $subrow->id  ?'selected': ''}}>{{ $subrow->subcategory_name	 }}</option>
                    @endforeach
                            </select>
     
              </div>
            </div><!-- col-4 -->



            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
        <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
        <select class="form-control select2" data-placeholder="Choose country" name="brand_id">
            <option label="Choose Brand"></option>

            @foreach($brand as $br)
            <option value="{{ $br->id }}" {{$product->brand_id == $br->id  ?'selected': ''}}>{{ $br->brand_name }}</option>
             @endforeach
          </select>
              </div>
            </div><!-- col-4 -->


<div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Product Size:  {{$product->size}}<span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="product_size" id="size" data-role="tagsinput"   value="{{$product->product_size}}" >
              </div>
            </div><!-- col-4 -->

<div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="product_color" id="color" data-role="tagsinput"  value="{{$product->product_color}}" >

              </div>
            </div><!-- col-4 -->

            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="selling_price"     value="{{$product->selling_price}}">
               
              </div>
            </div><!-- col-4 -->


            <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
  
            <textarea class="form-control" id="summernote"  name="product_details"> 
                {{$product->product_details}}
             </textarea>
                   
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                <input class="form-control" name="video_link"  value="{{$product->video_link}}" >
                 
              </div>
            </div><!-- col-4 -->




          </div><!-- row -->

<hr>
<br><br>

        <div class="row">

            <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="main_slider" value="1" {{$product->main_slider == '1' ? "checked" :''  }} >
                  <span>Main Slider</span>
                </label>
          
                </div> <!-- col-4 --> 

                <div class="col-lg-4">
                    <label class="ckbox">
                      <input type="checkbox" name="hot_deal" value="1"  {{$product->hot_deal == '1' ? "checked" :''  }} >
                      <span>Hot Deal</span>
                    </label>
              
                    </div> <!-- col-4 --> 



                    <div class="col-lg-4">
                        <label class="ckbox">
                          <input type="checkbox" name="best_rated" value="1" {{$product->best_rated == '1' ? "checked" :''  }} >
                          <span>Best Rated</span>
                        </label>
                  
                        </div> <!-- col-4 --> 

                        <div class="col-lg-4">
                            <label class="ckbox">
                              <input type="checkbox" name="trend" value="1" {{$product->trend == '1' ? "checked" :''  }} >
                              <span>Trend Product </span>
                            </label>
                      
                            </div> <!-- col-4 --> 

                            <div class="col-lg-4">
                                <label class="ckbox">
                                  <input type="checkbox" name="mid_slider" value="1" {{$product->trend == '1' ? "checked" :''  }} >
                                  <span>Mid Slider</span>
                                </label>
                          
                                </div> <!-- col-4 --> 
                                <div class="col-lg-4">
                                    <label class="ckbox">
                                      <input type="checkbox" name="hot_new" value="1" {{$product->hot_new == '1' ? "checked" :''  }} >
                                      <span>Hot New </span>
                                    </label>
                              
                                    </div> <!-- col-4 --> 
                                    <div class="col-lg-4">
                                      <label class="ckbox">
                                        <input type="checkbox" name="buyone_getone" value="1">
                                        <span>Buyone Getone</span>
                                      </label>
                                
                                      </div> <!-- col-4 --> 
                                    
                                    <button class="btn btn-info mg-r-5">Update</button>
                                    <button class="btn btn-secondary">Cancel</button>

        </div><!-- end row --> 

    </form>
          
        </div><!-- form-layout -->
      </div><!-- card -->
</div>
      <div class="sl-pagebody">
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Product  Page  </h6>
         
        <div class="form-layout">
            <form action="{{route('update.product_image',$product->id )}}" method="POST" enctype="multipart/form-data" >
              @csrf
            <div class="row mg-b-25">

              <!-- col-4 -->   
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image One : <span class="tx-danger">*</span></label><br>
                    <label class="custom-file"><br>
                       <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);" >
                           <span class="custom-file-control"></span><br>
                              <img src="{{asset($product->image_one)}}" id="one" width="100px">
                              <input type="hidden" value="{{$product->image_one}}" name="old_one">
                    </label>
                </div>
              </div>
              <!-- col-4 -->

              <!-- col-4 --> 
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label><br>
                    <label class="custom-file"><br>
                          <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this);"  >
                             <span class="custom-file-control"></span><br>
                                 <img src="{{asset($product->image_two)}}" id="two" width="100px">
                              <input type="hidden" value="{{$product->image_two}}" name="old_two">

                    </label>
                </div>
              </div>
              <!-- col-4 -->

              <!-- col-4 --> 
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label><br>
                    <label class="custom-file"><br>
                         <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL3(this);"  >
                          <span class="custom-file-control"></span><br>
                             <img src="{{asset($product->image_three)}}" id="three" width="100px">
                             <input type="hidden" value="{{$product->image_three}}" name="old_three">

                    </label>
                 </div> 
              </div>
              <!-- col-4 --> 
              
            </div>
            <br>
              <button type="submit" class="btn btn-sm btn-warning"> Update Photo</button>
            </form>
        </div>
      </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
   $('select[name="category_id"]').on('change',function(){
        var category_id = $(this).val();
        if (category_id) {
          
          $.ajax({
            url: "{{ url('/get/subcategory/') }}/"+category_id,
            type:"GET",
            dataType:"json",
            success:function(data) { 
            var d =$('select[name="subcategory_id"]').empty();
            $.each(data, function(key, value){
            
            $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

            });
            },
          });

        }else{
          alert('Please select Option');
        }

          });
    });

</script>
<script type="text/javascript">
    function readURL(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#one')
          .attr('src', e.target.result)
          .width(80)
          .height(80);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
  
   <script type="text/javascript">
    function readURL2(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#two')
          .attr('src', e.target.result)
          .width(80)
          .height(80);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
  
  
  
   <script type="text/javascript">
    function readURL3(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#three')
          .attr('src', e.target.result)
          .width(80)
          .height(80);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
@endsection