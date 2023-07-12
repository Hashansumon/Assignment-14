@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
 <div class="container-fluid">


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Footer Page</h4><br><br>
                   <form method="Post" action="{{route('update.footer')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $footerall->id }}">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Number</label>
                        <div class="col-sm-10">
                            <input name="number" class="form-control" type="text" value="{{ $footerall->number }}" id="example-text-input">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                        <div class="col-sm-10">
                            <textarea required="" name="short_description" class="form-control" rows="5">
                                {{ $footerall->short_description }}
                            </textarea>

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input name="address" class="form-control" type="text" value="{{ $footerall->address }}" id="example-text-input">
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input name="email" class="form-control" type="email" value="{{ $footerall->email }}" id="example-text-input">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                        <div class="col-sm-10">
                            <input name="facebook" class="form-control" type="text" value="{{ $footerall->facebook }}" id="example-text-input">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                        <div class="col-sm-10">
                            <input name="twitter" class="form-control" type="text" value="{{ $footerall->twitter }}" id="example-text-input">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Copyright</label>
                        <div class="col-sm-10">
                            <input name="copyright" class="form-control" type="text" value="{{ $footerall->copyright }}" id="example-text-input">
                        </div>
                    </div>

                {{-- </div> --}}
                    <input type="submit" class="btn btn-info waves-effect waves-light" value=" update Footer Page ">

                </form>
                    <!-- end row -->
                </div>
            </div>
        </div> <!-- end col -->
    </div>

 </div>

    </div>



 {{-- <script type="text/javascript">

  $(document).ready(function(){
    $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
  });

</script> --}}


@endsection
