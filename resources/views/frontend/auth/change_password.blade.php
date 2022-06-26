@extends('frontend.master_layout')
@section('main')
<style>
    input{
        text-transform: none;
    }
</style>
<section class="travel" id="travel">

    <div class="heading">
        <span>Update Password</span>
    </div>

    <div class="box-container">
        
        <div class="card " style="background-color: #222; color:#29d9d5;">
            <div class="card-header">
                <h3>Change Password</h3>
            </div>
            <div class="card-body" >
                <form action="{{ route('front.update.password') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3"  >
                                <label for="">Old Password</label>
                                <input type="password" class="form-control" name="old_password"  style="background-color: #222; color:#fff;   border: 0.2rem solid #29d9d5;" placeholder="Enter old Password" >
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group mb-3"  >
                        <label for="">New Password</label>
                        <input type="password" class="form-control" name="password"  style="background-color: #222; color:#fff;   border: 0.2rem solid #29d9d5;" placeholder="Enter New Password" >
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
                             
                    <button type="submit" class="btn btn-primary">Change password</button>
                </form>
            </div>
        </div>
        
        
    </div>
    
    


</section>

@endsection
