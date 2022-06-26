@extends('backend.admin_master')
@section('content')
<script src="{{ mix('js/app.js') }}"></script>





<div class="content-body">
    <div class="container-fluid">
        
        
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('admin.password.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="mb-1"><strong>Old Password</strong></label>
                        <input type="password" name="old_password" class="form-control" placeholder="Password" required autocomplete="new-password">
                    </div>
                    <div class="mb-3">
                        <label class="mb-1"><strong>Password</strong></label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="new-password">
                    </div>
                    <div class="mb-3">
                        <label class="mb-1"><strong>Confirm Password</strong></label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required autocomplete="new-password">
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-block">Update Password</button>
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