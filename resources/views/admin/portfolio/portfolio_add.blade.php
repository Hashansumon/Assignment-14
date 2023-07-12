@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
 <div class="container-fluid">


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Portfolio Page</h4><br><br>
                   <form method="Post" action="{{route('store.portfolio')}}" enctype="multipart/form-data">
                    @csrf
                    {{-- <input type="hidden" name="id" value="{{ $aboutpage->id }}"> --}}
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Name</label>
                        <div class="col-sm-10">
                            <input name="portfolio_name" class="form-control" type="text"  id="example-text-input">
                            @error('portfolio_name')
                             <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- value="{{ $aboutpage->title }}" --}}

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Title</label>
                        <div class="col-sm-10">
                            <input name="portfolio_title" class="form-control" type="text"  id="example-text-input">
                            @error('portfolio_title')
                             <span class="text-danger">{{$message}}</span>
                            @enderror
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
                        <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description</label>
                        <div class="col-sm-10">
                            <textarea id="elm1" name="portfolio_description"></textarea>

                            </textarea>
                        </div>
                    </div>

                    {{-- {{ $aboutpage->portfolio_description }} --}}

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Image</label>
                        <div class="col-sm-10">
                            <input name="portfolio_image" class="form-control" type="file"  id="image" >
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
                    <input type="submit" class="btn btn-info waves-effect waves-light" value=" Insert Portfolio Data ">

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
