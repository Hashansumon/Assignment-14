@extends('admin.admin_master')
@section('admin')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}

<div class="page-content">
 <div class="container-fluid">


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Change Password Page</h4><br><br>

                    @if(count($errors))
                     @foreach ($errors->all() as $error)
                        <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
                     @endforeach
                    @endif
                   <form method="Post" action="{{route('update.password')}}">
                    @csrf
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                            <input name="oldpassword" class="form-control" type="password"  id="oldpassword">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                            <input name="newpassword" class="form-control" type="password"  id="newpassword">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input name="confirm_password" class="form-control" type="password"  id="confirm_password">
                        </div>
                    </div>

                    {{-- <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">User Email</label>
                        <div class="col-sm-10">
                            <input name="email" class="form-control" type="text" value="{{ $editData->email }}" id="example-text-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                            <input name="username" class="form-control" type="text" value="{{ $editData->username }}" id="example-text-input">
                        </div>
                    </div> --}}

                    {{-- <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-10">
                            <input name="profile_image" class="form-control" type="file"  id="image">
                        </div>
                    </div>

                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" src="{{(!empty($editData->profile_image))? url('upload/admin_image/'.$editData->profile_image):url('upload/no_image.png')}}" alt="Card image cap">
                        </div>
                    </div> --}}
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">

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
