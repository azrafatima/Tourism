@extends('backend.admin_master')
@section('content')





<div class="content-body">
    <div class="container-fluid">
        
        
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <a href="{{ route('admin.profile.edit') }}" class="mr-auto btn btn-info">Edit Profile</a>
                        <div style="margin-bottom: 150px"></div>
                        <div class="profile-photo offset-6 mb-3" >
                            <img src="{{ (!empty(Auth::user()->profile_photo_path))? url('backend/images/profile/'.Auth::user()->profile_photo_path): url('backend/images/no_image.jpg') }}" class="img-fluid rounded-circle" style="border: 2px solid #000" alt="">
                        </div>
                        <div class="profile-info offset-5">
                            
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{ Auth::user()->name }}</h4>
                                    <p>{{ Auth::user()->role }}</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{ Auth::user()->email }}</h4>
                                    <p>Email</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>



@endsection