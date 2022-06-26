@extends('backend.admin_master')
@section('content')
<script src="{{ mix('js/app.js') }}"></script>




<div class="content-body">
    <div class="container-fluid">
        
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Banner</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('banner.update',$banner->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" value="{{ $banner->title }}" name="title" placeholder="Enter Title">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Sub Ttitle</label>
                                <input type="text" class="form-control" value="{{ $banner->subtitle }}" name="subtitle" placeholder="Enter the Sub title">
                                @error('subtitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                    
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Banner Description</label>
                                <textarea name="description" class="form-control" cols="30" rows="10">{{ $banner->description }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">Banner Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="form-group mt-3 mb-3">
                                <div class="control" >
                                    <img id="showImage" src="{{ (!empty($banner->image)) ? url('backend/images/banner/'.$banner->image) : ''}}"  width="100px" height="100px" style="border: 1px solid #000" alt="">        
                                </div>
                            </div>
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