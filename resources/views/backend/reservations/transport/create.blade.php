@extends('backend.admin_master')
@section('content')



<div class="content-body">
    <div class="container-fluid">
        
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Transport Service</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('transport.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Transport Name">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Contact Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter the Contact Number">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Source Location</label>
                            <input type="text" class="form-control" name="Source" placeholder="Enter the Source Location">
                            @error('Source')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Destination</label>
                            <input type="text" class="form-control" name="destination" placeholder="Enter the Destination">
                            @error('destination')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Routes</label>
                                <select name="route_id" class="form-control" >
                                    <option value="">Select Route</option>
                                    @foreach($routes as $route)
                                    <option value="{{ $route->id }}">{{ $route->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                           <label class="form-label">Transport Pricing</label>
                           <input type="text" class="form-control" name="price" placeholder="Enter the rent of this transport">
                           @error('price')
                           <span class="text-danger">{{ $message }}</span>
                       @enderror
                            </div>                          
                    </div>
                    <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="">Transport Description</label>
                                <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Enter details about transport"></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Transport Rating</label>
                                <input type="number" class="form-control" min="1" max="5" name="rating" placeholder="Rate this Transport">
                                @error('rating')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                            <div class="row">
                            <div class="mb-3 col-md-6">
                                <label>Transport Image</label>
                                <input type="file" class="form-control" name="image" placeholder="Enter Services that the hotel will provide">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        
                       
                        <button type="submit" class="btn btn-primary">Add Transport Service</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>

@endsection