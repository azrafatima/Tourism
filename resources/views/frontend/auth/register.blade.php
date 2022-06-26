@extends('frontend.master_layout')
@section('main')
<style>
    input{
        text-transform: none;
    }
</style>
<section class="travel" id="travel">

    <div class="heading">
        <span>Registration</span>
    </div>

    <div class="box-container">
        
        <div class="card " style="background-color: #222; color:#29d9d5;">
            <div class="card-header">
                <h3>Register to Book Tour</h3>
            </div>
            <div class="card-body" >
                <form action="{{ route('front.register.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name"  style="background-color: #222; color:#fff;   border: 0.2rem solid #29d9d5;" placeholder="Enter Name" >
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3"  >
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" style="background-color: #222; color:#fff;   border: 0.2rem solid #29d9d5;" placeholder="Enter Email" >
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group mb-3"  >
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password"  style="background-color: #222; color:#fff;   border: 0.2rem solid #29d9d5;" placeholder="Enter Password" >
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3"  >
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation"  style="background-color: #222; color:#fff;   border: 0.2rem solid #29d9d5;" placeholder="Confirm Your Password" >
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                </div>
                    <div class="row">
                        <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="" class="mb-2">Profile Picture</label>
                        <input type="file" class="form-control" style="background-color: #222; color:#fff; text-transfrom:lower-case;   border: 0.2rem solid #29d9d5;" name="profile_photo_path"  >
                        @error('profile_photo_path')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>  
                        </div>
                </div>         
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
        
        
    </div>
    
    


</section>

@endsection
