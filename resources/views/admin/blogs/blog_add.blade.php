@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    }
</style>

<div class="page-content">
 <div class="container-fluid">


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add Blog Page</h4><br><br>
                   <form method="Post" action="{{route('store.blog')}}" enctype="multipart/form-data">
                    @csrf
                    {{-- <input type="hidden" name="id" value="{{ $aboutpage->id }}"> --}}
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                        <div class="col-sm-10">
                            <select name="blog_category_id" class="form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                @foreach($blogcategories as $cat)
                                <option value="{{$cat->id}}">{{$cat->blog_category}}</option>
                                @endforeach
                                {{-- <option value="2">Two</option>
                                <option value="3">Three</option> --}}
                                </select>

                            {{-- <input name="portfolio_name" class="form-control" type="text"  id="example-text-input">
                            @error('portfolio_name')
                             <span class="text-danger">{{$message}}</span>
                            @enderror --}}
                        </div>
                    </div>
                    {{-- value="{{ $aboutpage->title }}" --}}

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title</label>
                        <div class="col-sm-10">
                            <input name="blog_title" class="form-control" type="text"  id="example-text-input">
                            @error('blog_title')
                             <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags</label>
                        <div class="col-sm-10">
                            <input name="blog_tags" value="home,tech" class="form-control" type="text"  data-role="tagsinput">
                            {{-- @error('blog_title')
                             <span class="text-danger">{{$message}}</span>
                            @enderror --}}
                        </div>
                    </div>


                    {{-- value="{{ $aboutpage->short_title }}" --}}

                    {{-- <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description</label>
                        <div class="col-sm-10">
                            <textarea required="" name="portfolio_description" class="form-control" rows="5"></textarea> --}}
                            {{-- {{ $aboutpage->short_description }} --}}
                            {{-- <input name="short_description" class="form-control" type="text"  id="example-text-input" value="{{ $aboutpage->short_description }}"> --}}
                        {{-- </div> --}}
                    {{-- </div> --}}


                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Blog Description</label>
                        <div class="col-sm-10">
                            <textarea id="elm1" name="blog_description"></textarea>

                            </textarea>
                        </div>
                    </div>

                    {{-- {{ $aboutpage->portfolio_description }} --}}

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image</label>
                        <div class="col-sm-10">
                            <input name="blog_image" class="form-control" type="file"  id="image" >
                        </div>
                    </div>

                    {{-- value="{{ $homeslide->video_url }}" --}}
                    {{-- Card image cap --}}
                    {{-- 'upload/home_slide/'. --}}

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <img id="showImage" class="rounded avatar-lg" src="{{url('upload/no_image.png')}}" alt="Card image cap">
                    </div>
                    {{-- upload/home_slide/'. --}}
                </div>
                    <input type="submit" class="btn btn-info waves-effect waves-light" value=" Insert Blog Data ">

                </form>
                    <!-- end row -->
                </div>
            </div>
        </div> <!-- end col -->
    </div>

 </div>

    </div>



 <script type="text/javascript">

  $(document).ready(function(){
    $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
  });

</script>


@endsection
