@extends('backend.admin_master')
@section('content')



<div class="content-body">
    <div class="container-fluid">
        
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Package Type</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('package.type.update',$packageType->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Package Type</label>
                                <input type="text" class="form-control" name="package_type_name" value="{{ $packageType->package_type_name }}" placeholder="Enter Package Type">
                                @error('package_type_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                       
                        <button type="submit" class="btn btn-primary">Update Package Type</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>

@endsection