@extends('backend.admin_master')
@section('content')
<script src="{{ mix('js/app.js') }}"></script>




<div class="content-body">
    <div class="container-fluid">
        
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Hotel</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('hotel.update',$hotel->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Hotel Name</label>
                                <input type="text" class="form-control" name="hotel_name" value="{{ $hotel->hotel_name }}" placeholder="Enter Hotel Name">
                                @error('hotel_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                             <div class="mb-3 col-md-6">
                                <label class="form-label">Hotel Email</label>
                                <input type="email" class="form-control" name="hotel_email" value="{{ $hotel->hotel_email }}"  placeholder="Enter Email Address">
                                @error('hotel_email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="">Hotel Address</label>
                                <textarea name="hotel_address" class="form-control" cols="30" rows="10" placeholder="Enter Hotel address">{{ $hotel->hotel_address }}</textarea>
                                @error('hotel_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                            <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="hotel_phone" value="{{ $hotel->hotel_phone }}" placeholder="Enter Hotel Phone Number">
                                @error('hotel_phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label>Hotel Services</label>
                                <input type="text" class="form-control" name="hotel_services" value="{{ $hotel->hotel_services }}" placeholder="Enter Services that the hotel will provide">
                                @error('hotel_services')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Hotel Type</label>
                                <input type="text" class="form-control" name="hotel_type" value="{{ $hotel->hotel_type }}" placeholder="Enter Hotel Type whether 2 star 3 star etc">
                                @error('hotel_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Hotel Staying Price</label>
                                <input type="text" class="form-control" name="hotel_price" value="{{ $hotel->hotel_price }}" placeholder="Enter Price per night">
                                @error('hotel_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                           
                            
                        
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Hotel Ratings</label>
                                <input type="number" class="form-control" min="1" max="5" name="hotel_rating" value="{{ $hotel->hotel_rating }}" placeholder="Enter hotel Ratings here">
                                @error('hotel_rating')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="from-group">
                                <label>Hotel Images</label>
                                <input type="file" class="form-control" name="hotel_images" id="image">
                                @error('hotel_images')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group mt-3 ">

                                    <div class="control" >
                                        <img id="showImage" src="{{ (!empty($hotel->hotel_images)) ? url('backend/images/hotel/'.$hotel->hotel_images) : ''}}"  width="100px" height="100px" style="border: 1px solid #000" alt="">
                                        
                                    </div>

                                </div>
                            </div>
                            
                            
                        </div>

                       
                        <button type="submit" class="btn btn-primary">Update Hotel</button>
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