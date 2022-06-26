@extends('frontend.master_layout')
@section('main')
<section class="about" id="about">

    @foreach($abouts as $key => $about)
    <div class="video-container" data-aos="fade-right" data-aos-delay="300">
        <img src="{{ asset('backend/images/aboutus/'.$about->image) }}" width="90%" class="image">
        
    </div>

    <div class="content" data-aos="fade-left" data-aos-delay="600">
        <span>{{ $about->title }}</span>
        <h3>{{ $about->subtitle }}</h3>
        <p>{{ $about->description }}</p>
        
    </div>
    @if($key == 0)
    @break
    @endif
@endforeach
</section>


@endsection
