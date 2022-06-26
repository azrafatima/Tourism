@extends('frontend.master_layout')
@section('main')
 


<!-- gallery section starts  -->

<section class="gallery" id="gallery">

    <div class="heading">
        <span>our gallery</span>
        <h1>we record memories</h1>
    </div>
    
    <div class="box-container">
    @foreach($galleries as $key=> $gallery)
        <div class="box" data-aos="zoom-in-up" data-aos-delay="150">
            <img src="{{ asset('backend/images/gallery/'.$gallery->image) }}" alt="">
            <span>{{ $gallery->title }}</span>
            <h3>{{ $gallery->subtitle }}</h3>
        </div>
    @endforeach

       

         

    </div>

</section>

<!-- gallery section ends -->


@endsection