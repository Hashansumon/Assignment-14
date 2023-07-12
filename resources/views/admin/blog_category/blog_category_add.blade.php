@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
 <div class="container-fluid">


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add Blog Category Page</h4><br><br>
                   <form method="Post" action="{{route('store.blog.category')}}">
                    {{-- enctype="multipart/form-data" --}}
                    @csrf
                    {{-- <input type="hidden" name="id" value="{{ $aboutpage->id }}"> --}}
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                        <div class="col-sm-10">
                            <input name="blog_category" class="form-control" type="text"  id="example-text-input">
                            @error('blog_category')
                             <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                {{-- </div> --}}
                    <input type="submit" class="btn btn-info waves-effect waves-light" value=" Insert Blog Category Data ">

                </form>
                    <!-- end row -->
                </div>
            </div>
        </div> <!-- end col -->
    </div>

 </div>

     </div>



@endsection
