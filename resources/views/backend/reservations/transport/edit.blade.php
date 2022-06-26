@extends('backend.admin_master')
@section('content')
<script src="{{ mix('js/app.js') }}"></script>




<div class="content-body">
    <div class="container-fluid">
        
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Transport Service</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('transport.update',$transport->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name"  value="{{ $transport->name }}"  placeholder="Enter Transport Name">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Contact Number</label>
                            <input type="text" class="form-control" name="phone" value="{{ $transport->phone }}"  placeholder="Enter the Source Location">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Source Location</label>
                            <input type="text" class="form-control" name="Source" value="{{ $transport->Source }}"  placeholder="Enter the Source Location">
                            @error('Source')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Destination</label>
                            <input type="text" class="form-control" name="destination" value="{{ $transport->destination }}"  placeholder="Enter the Destination">
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
                                    <option value="{{ $route->id }}" {{ ($route->id) ? 'selected':'' }}>{{ $route->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 col-md-6">
                           <label class="form-label">Transport Pricing</label>
                           <input type="text" class="form-control" name="price" value="{{ $transport->price }}"  placeholder="Enter the rent of this transport">
                           @error('price')
                           <span class="text-danger">{{ $message }}</span>
                       @enderror
                            </div>                          
                    </div>
                    <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="">Transport Description</label>
                                <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Enter details about transport">{{ $transport->description }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Transport Rating</label>
                                <input type="number" class="form-control" min="1" max="5"  value="{{ $transport->rating }}" name="rating" placeholder="Rate this Transport">
                                @error('rating')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                            <div class="row">
                            <div class="mb-3 col-md-6">
                               <div class="form-group">
                                <label>Transport Image</label>
                                <input type="file" class="form-control" name="image" id="image"  placeholder="Enter Services that the hotel will provide">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                               </div>
                               <div class="form-group mt-3 ">

                                <div class="control" >
                                    <img id="showImage" src="{{ (!empty($transport->image)) ? url('backend/images/transports/'.$transport->image) : ''}}"  width="100px" height="100px" style="border: 1px solid #000" alt="">
                                    
                                </div>

                            </div>
                            </div>
                        </div>
                        
                        
                       
                        <button type="submit" class="btn btn-primary">Update Transport</button>
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