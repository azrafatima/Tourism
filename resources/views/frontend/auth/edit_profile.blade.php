@extends('frontend.master_layout')
@section('main')
<script src="{{ mix('js/app.js') }}"></script>

<style>
    input{
        text-transform: none;
    }
</style>
<section class="travel" id="travel">

    <div class="heading">
        <span>Edit Profile</span>
    </div>

    <div class="box-container">
        
        <div class="card " style="background-color: #222; color:#29d9d5;">
            <div class="card-header">
                <h3>Edit Profile</h3>
            </div>
            <div class="card-body" >
                <form action="{{ route('front.profile.update',Auth::user()->id) }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name"  style="background-color: #222; color:#fff;   border: 0.2rem solid #29d9d5;" placeholder="Enter Name" >
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3"  >
                        <label for="">Email</label>
                        <input type="email" class="form-control" value="{{ Auth::user()->email }}" name="email" style="background-color: #222; color:#fff;   border: 0.2rem solid #29d9d5;" placeholder="Enter Email" >
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                </div>
                    <div class="row">
                        <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="" class="mb-2">Profile Picture</label>
                        <input type="file" class="form-control" id="image" style="background-color: #222; color:#fff; text-transfrom:lower-case;   border: 0.2rem solid #29d9d5;" name="profile_photo_path"  >
                        @error('profile_photo_path')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>  
                    <div class="form-group mt-3">
                        <div class="control">
                            <img id="showImage" src="{{ (!empty(Auth::user()->profile_photo_path)) ? url('frontend/images/profile/'.Auth::user()->profile_photo_path) : ''}}"  width="100px" height="100px" style="border: 1px solid #000" alt="">
                        </div>
                    </div>
                        </div>
                </div>         
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
        
        
    </div>
    
    


</section>



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
