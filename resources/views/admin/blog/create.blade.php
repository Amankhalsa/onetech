@extends('admin.admin_master')
@section('title')
 Create Blog post
@endsection
@section('admin')

<div class="sl-pagebody">


    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title"> Create Blog post </h6>
         
        <div class="form-layout">
            <form action="" method="POST"  >
                @csrf

         <div class="row mg-b-25">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Post Title Eng <span class="tx-danger">*</span></label><br>
                <input class="form-control" type="text" name="post_title_en"  placeholder="Post title eng"  >
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Post Title Hin <span class="tx-danger">*</span></label><br>
                <input class="form-control" type="text" name="post_title_in"    placeholder="Post title hin">
              </div>
            </div><!-- col-4 -->
      
       
             
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Blog Category: <span class="tx-danger">*</span></label><br>
                <select class="form-control select2" data-placeholder="Choose country" name="category_id">
                    <option label="Choose Category"></option>
                    @foreach($category as $row)
                    <option >{{ $row->category_name_en }}</option>
                    @endforeach
                  </select>
     
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Post  Details eng: <span class="tx-danger">*</span></label>
  
            <textarea class="form-control" id="summernote"  name="product_details"> 
  
             </textarea>
                   
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image : <span class="tx-danger">*</span></label>
                 <label class="custom-file">
          <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this);"  required="">
          <span class="custom-file-control"></span><br>
          <img src="{{asset('upload/no_image.jpg')}}" id="two" width="100px">
            </label>
  
                </div>
              </div><!-- col-4 -->
    

        </div><!-- row -->


                    <div class="row">
                            <button class="btn btn-info mg-r-5">Update</button>
                            <button class="btn btn-secondary">Cancel</button>

                            </div
                        ><!-- end row --> 

    </form>
          
        </div><!-- form-layout -->
      </div><!-- card -->
</div>


  

@endsection