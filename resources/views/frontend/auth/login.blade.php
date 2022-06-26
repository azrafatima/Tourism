@extends('frontend.master_layout')
@section('main')
<style>
    input{
        text-transform: none;
    }
</style>
<section class="travel" id="travel">

    <div class="heading">
        <span>Login</span>
    </div>

    <div class="box-container">
        
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="card " style="background-color: #222; color:#29d9d5;">
                    <div class="card-header">
                        <h3>Login to Book Tour</h3>
                    </div>
                    <div class="card-body" >
                        <form action="{{ route('front.login.process') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                                
                        
                        <div class="col-md-12">
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
                            <div class="col-md-12">
                                <div class="form-group mb-3"  >
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" name="password"  style="background-color: #222; color:#fff;   border: 0.2rem solid #29d9d5;" placeholder="Enter Password" >
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        
                                     
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    
    


</section>

@endsection
