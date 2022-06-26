@extends('frontend.master_layout')
@section('main')
    
<section class="package" id="package">

    <div class="heading">
        <h1>Our Packages</h1>
    </div>

    <div class="box-container">

        @foreach($packages as $package)
        <div class="box" data-aos="fade-up" data-aos-delay="150">
            <div class="image">
                <img src="{{ asset('backend/images/package/'.$package->package_image) }}" alt="">
            </div>
            <div class="content">
                <h2>{{ $package->package_name }}</h2>
                <h4>{{ $package->packageType->package_type_name }}</h4>
                <p>{{ $package->package_features }}</p>
                <a href="{{ route('front.package.show',$package->id) }}">read more <i class="fas fa-angle-right"></i></a>
            </div>
        </div>
        @endforeach

    
    </div>

</section>


@endsection
