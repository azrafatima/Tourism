@extends('backend.admin_master')
@section('content')



<div class="content-body">
    <div class="container-fluid">
        
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Route Details</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('route.update',$route->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Route Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $route->title }}" placeholder="Enter Transport Name">
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Source Location</label>
                            <input type="text" class="form-control" name="source" value="{{ $route->source }}" placeholder="Enter the Source Location">
                            @error('source')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label>Destination</label>
                            <input type="text" class="form-control" name="destination" value="{{ $route->destination }}" placeholder="Enter the Destination">
                            @error('destination')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3 col-md-6">
                           <label class="form-label">Visiting Spots</label>
                           <input type="text" class="form-control" name="visiting_spots" value="{{ $route->visiting_spots }}" placeholder="Enter the visiting spots that come between source and destination">
                           @error('visiting_spots')
                           <span class="text-danger">{{ $message }}</span>
                       @enderror
                            </div>                          
                    </div>
                    <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Enter details about transport">{{ $route->description }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                       
                        <button type="submit" class="btn btn-primary">Update Route</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>

@endsection