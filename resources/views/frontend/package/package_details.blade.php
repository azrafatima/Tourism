@extends('frontend.master_layout')
@section('main')


<section class="details" id="package_detail">
   

    <div class="video-container" data-aos="fade-right" data-aos-delay="300">
        <img src="{{ asset('backend/images/package/'.$package->package_image) }}" width="90%" class="image"  alt="">
    </div>

    <div class="content" data-aos="fade-left" data-aos-delay="600">
        <h3>Package Details</h3>
        <h5>Package Name <span>{{ $package->package_name }}</span></h5>
        <h5>Package Location <span>{{ $package->package_location }}</span></h5>
        <h5>Package Features <span>{{ $package->package_features }}</span></h5>
        <h5>Package Price <span> Rs {{ $package->package_price }} </span></h5><br>
        <h5>Details</h5>
        <p>{{ $package->package_details }}</p>
        <a href="{{ route('package.booking.view') }}" class="btn">Book Now</a>
    </div>

</section>

@endsection