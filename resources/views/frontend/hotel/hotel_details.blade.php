@extends('frontend.master_layout')
@section('main')


<section class="details" id="package_detail">
   

    <div class="video-container" data-aos="fade-right" data-aos-delay="300">
        <img src="{{ asset('backend/images/hotel/'.$hotel->hotel_images) }}" width="90%" class="image"  alt="">
    </div>

    <div class="content" data-aos="fade-left" data-aos-delay="600">
        <h3>Hotel Details</h3>
        <h5>Hotel Name <span>{{ $hotel->hotel_name }}</span></h5>
        <h5>Hotel Type <span>{{ $hotel->hotel_type }}</span></h5>
        <h5>Hotel Services <span>{{ $hotel->hotel_services }}</span></h5>
        <h5>Hotel Price <span> Rs {{ $hotel->hotel_price }} </span></h5>
        <h5>Hotel Phone Number <span>{{ $hotel->hotel_phone }}</span></h5>
        <h5>Hotel Email <span>{{ $hotel->hotel_email }}</span></h5>
        <h5>Hotel Address <span>{{ $hotel->hotel_address }}</span></h5>
        <h5>Hotel Rating <span>
            @php $rating = $hotel->hotel_rating; @endphp  

            @foreach(range(1,5) as $i)
                <span class="fa-stack" style="width:1em">
                    <i class="far fa-star fa-stack-1x" style="color: #fff"></i>

                    @if($rating >0)
                        @if($rating >0.5)
                            <i class="fas fa-star fa-stack-1x" style="color: yellow;"></i>
                        @else
                            <i class="fas fa-star-half fa-stack-1x" style="color: yellow"></i>
                        @endif
                    @endif
                    @php $rating--; @endphp
                </span>
            @endforeach
            </span></h5>
        <a href="{{ route('hotel.booking.view') }}" class="btn">Book Now</a>
    </div>

</section>

@endsection