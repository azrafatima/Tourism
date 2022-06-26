@extends('backend.admin_master')
@section('content')
<script src="{{ mix('js/app.js') }}"></script>



<div class="content-body">
    <div class="container-fluid">
        
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Package</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('package.update',$package->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                <label class="form-label">Package Name</label>
                                <input type="text" class="form-control" value="{{ $package->package_name }}" name="package_name" placeholder="Enter Package Name">
                            </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                <label class="form-label">Package Type</label>
                                <select id="inputState" name="package_type_id" class="default-select form-control wide">
                                    <option selected="">Choose Package Type</option>
                                @foreach($packageTypes as $packageType)
                                    <option value="{{ $packageType->id }}" {{ ($packageType->id) ? 'selected' : ''  }} >{{ $packageType->package_type_name }}</option>
                                @endforeach
                                    
                                </select>
                                @error('package_type_id')

                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                            <div class="row">
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                <label class="form-label">Package Location</label>
                                <input type="text" class="form-control" name="package_location" value="{{ $package->package_location }}" placeholder="Enter the Package Location">
                                @error('package_location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                <label>Package Price</label>
                                <input type="text" class="form-control" value="{{ $package->package_price }}" name="package_price" placeholder="Enter the Package Price">
                                @error('package_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                <label class="form-label">Package Features</label>
                                <input type="text" class="form-control" name="package_features" value="{{ $package->package_features }}" placeholder="Enter Package Nmae">
                                @error('package_features')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                           
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                <label>Package Image</label>
                                <input type="file" id="image" class="form-control" name="package_image">
                                @error('package_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <div class="control">
                                        <img id="showImage" src="{{ (!empty($package->package_image)) ? url('backend/images/package/'.$package->package_image):''}}"  width="100px"height="100px" style="border: 1px solid #000" alt="">
                                    </div>
                                </div>


                            </div>
                        
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="">Package Details</label>
                                <textarea name="package_details" class="form-control" cols="30" rows="10">{{ $package->package_details }}</textarea>
                                @error('package_details')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>
                        </div>

                       <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Update Package</button>
                    </div>
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