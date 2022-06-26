@extends('frontend.master_layout')
@section('main')


<section class="details" id="package_detail">
   

    <div class="video-container" data-aos="fade-right" data-aos-delay="300">
        <img src="{{ asset('frontend/images/profile/'.Auth::user()->profile_photo_path) }}" width="90%" class="image"  alt="">
    </div>

    <div class="content" data-aos="fade-left" data-aos-delay="600">
        <h3>Profile Details</h3>
        <h5>Name <span>{{ Auth::user()->name }}</span></h5>
        <h5>User Email <span>{{ Auth::user()->email }}</span></h5>
        
        <a href="{{ route('front.edit.profile') }}" class="btn">Edit Profile</a>
        
    </div>

</section>

@endsection