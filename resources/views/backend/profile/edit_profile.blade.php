@extends('backend.admin_master')
@section('content')
<script src="{{ mix('js/app.js') }}"></script>





<div class="content-body">
    <div class="container-fluid">
        
        
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="mb-1"><strong>Full Name</strong></label>
                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" placeholder="Enter Full Name" required autofocus autocomplete="name">
                    </div>
                    <div class="mb-3">
                        <label class="mb-1"><strong>Email</strong></label>
                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="hello@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Profile Picture</label>
                        <input type="file" name="profile_photo_path" id="image"  class="form-control" required>
                        <div class="form-group mt-3">
                            <div class="control">
                                <img id="showImage" src="{{ (!empty(Auth::user()->profile_photo_path)) ? url('backend/images/profile/'.Auth::user()->profile_photo_path) : url('backend/images/no_image.jpg')}}"  width="100px" height="100px" style="border: 1px solid #000" alt="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
</div>
</div>




<script>
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