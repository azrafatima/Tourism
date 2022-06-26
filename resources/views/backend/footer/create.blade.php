@extends('backend.admin_master')
@section('content')



<div class="content-body">
    <div class="container-fluid">
        
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Footer Contact</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('footer.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">City & Country</label>
                                <input type="text" class="form-control" name="city" placeholder="Enter City and Country">
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter the Phone Number">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter contact email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">Timings</label>
                                <input type="text" name="timings" class="form-control" placeholder="Enter Timings">
                                @error('timings')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                       
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>

@endsection