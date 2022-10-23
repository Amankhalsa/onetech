@extends('admin.admin_master')
@section('title')
 Create Blog post
@endsection
@section('admin')

<div class="sl-pagebody">


    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title"> Create Blog post </h6>
         
        <div class="form-layout">
            <form action="{{route('store.blog_post')}}" method="POST"   enctype="multipart/form-data">
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
                    <option value="{{$row->id}}" >{{ $row->category_name_en }}</option>
                    @endforeach
                  </select>
     
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Post  Details eng: <span class="tx-danger">*</span></label>
  
            <textarea class="form-control" id="summernote"  name="details_en"> 
  
             </textarea>
                   
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Post  Details Hin: <span class="tx-danger">*</span></label>
  
            <textarea class="form-control" id="summernote2"  name="details_in"> 
  
             </textarea>
                   
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image : <span class="tx-danger">*</span></label>
                 <label class="custom-file">

 

          <input name="post_image" class="custom-file-input"   type="file" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
         
          <span class="custom-file-control"></span><br>
          <img id="output" src="{{asset('upload/no_image.jpg')}}" width="100" height="100">
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