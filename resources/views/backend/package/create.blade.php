@extends('backend.admin_master')
@section('content')



<div class="content-body">
    <div class="container-fluid">
        
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Package</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('package.store') }}" method="post" enctype="multipart/form-data">
@csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Package Name</label>
                                <input type="text" class="form-control" name="package_name" placeholder="Enter Package Name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Package Type</label>
                                <select id="inputState" name="package_type_id" class="default-select form-control wide">
                                    <option selected="">Choose Package Type</option>
                                @foreach($packageTypes as $packageType)
                                    <option value="{{ $packageType->id }}">{{ $packageType->package_type_name }}</option>
                                @endforeach
                                    
                                </select>
                                @error('package_type_id')

                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                            <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Package Location</label>
                                <input type="text" class="form-control" name="package_location" placeholder="Enter the Package Location">
                                @error('package_location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label>Package Price</label>
                                <input type="text" class="form-control" name="package_price" placeholder="Enter the Package Price">
                                @error('package_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Package Features</label>
                                <input type="text" class="form-control" name="package_features" placeholder="Enter Package Nmae">
                                @error('package_features')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                           
                            <div class="mb-3 col-md-6">
                                <label>Package Image</label>
                                <input type="file" class="form-control" name="package_image">
                                @error('package_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Package Details</label>
                                <textarea name="package_details" class="form-control" cols="30" rows="10"></textarea>
                                @error('package_details')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                       
                        <button type="submit" class="btn btn-primary">Create Package</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>

@endsection