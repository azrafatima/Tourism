@extends('backend.admin_master')
@section('content')
<script src="{{ mix('js/app.js') }}"></script>



<div class="content-body">
    <div class="container-fluid">
        
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Travel Agency</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('travel.agency.update',$travelAgency->id) }}" method="post" enctype="multipart/form-data">
@csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Agency Name</label>
                                <input type="text" class="form-control" name="Name" value="{{ $travelAgency->Name }}" placeholder="Enter Travel Agency Name">
                                @error('Name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                             <div class="mb-3 col-md-6">
                                <label class="form-label">License Number</label>
                                <input type="text" class="form-control" name="license_Number"  value="{{ $travelAgency->license_Number }}" placeholder="Enter License Number">
                                @error('license_Number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="">Address</label>
                                <textarea name="address" class="form-control" cols="30" rows="10" placeholder="Enter the address">{{ $travelAgency->address }}</textarea>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                            <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone_Number" value="{{ $travelAgency->phone_Number }}" placeholder="Enter Phone Number">
                                @error('phone_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email" value="{{ $travelAgency->email }}" placeholder="Enter Email of travel agency">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Tourism Department</label>
                                <input type="text" class="form-control" name="tourism_department" value="{{ $travelAgency->tourism_department }}" placeholder="Enter Tourism Department Name Here">
                                @error('tourism_department')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Traveling Area</label>
                                <input type="text" class="form-control" name="traveling_area" value="{{ $travelAgency->traveling_area }}" placeholder="Enter dealing area where the agency deals">
                                @error('traveling_area')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                           
                            
                        
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Ratings</label>
                                <input type="number" class="form-control" min="1" max="5" name="ratings" value="{{ $travelAgency->ratings }}" placeholder="Enter the Ratings here">
                                @error('ratings')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                              <div class="form-group">
                                <label>Travel Agency Image</label>
                                <input type="file" id="image" class="form-control" name="image">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                              <div class="form-group mt-3">
                                <div class="control">
                                    <img id="showImage" src="{{ (!empty($travelAgency->image)) ? url('backend/images/travels/'.$travelAgency->image) : ''}}"  width="100px" height="100px" style="border: 1px solid #000" alt="">
                                </div>
                            </div>
                            </div>
                            
                        </div>

                       
                        <button type="submit" class="btn btn-primary">Update Travel Agency</button>
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