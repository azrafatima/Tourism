@extends('backend.admin_master')
@section('content')
<script src="{{ mix('js/app.js') }}"></script>




<div class="content-body">
    <div class="container-fluid">
        
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Footer Contact</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('footer.update',$contact->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">City & Country</label>
                                <input type="text" class="form-control" value="{{ $contact->city }}" name="city" placeholder="Enter City & Country">
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" value="{{ $contact->phone }}" name="phone" placeholder="Enter the phone">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                    
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="email" class="form-control" value="{{ $contact->email }}" name="email" placeholder="Enter Email">
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">Timings</label>
                                <input type="text" class="form-control" value="{{ $contact->timings }}" name="timings" placeholder="Enter Timings">
                                @error('timings')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                    
                        </div>
                        </div>
                    
                       
                        <button type="submit" class="btn btn-primary">Update </button>
                    </form>
                </div>
            </div>
        </div>
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