@extends('frontend.master_layout')
@section('main')
<section class="travel" id="travel">

    <div class="heading">
        <span>Top Hotels</span>
        <h1>Select the best Hotel</h1>
    </div>

    <div class="box-container">

        @foreach ($hotels as $key => $hotel)
            
        <div class="box" data-aos="fade-up" data-aos-delay="150">
            <div class="image">
                <img src="{{ asset('backend/images/hotel/'.$hotel->hotel_images) }}" alt="">
            </div>
            <div class="content">
                <h2>{{ $hotel->hotel_name }}</h2>
                <h4>{{ $hotel->hotel_type  }} hotel</h4>
                <h4><span>Manager : </span>{{ $hotel->hotel_phone }}</h4>
                <p>Services : {{ $hotel->hotel_services }}</p>

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
            <br>

            <a href="{{ route('front.hotel.show',$hotel->id) }}">read more <i class="fas fa-angle-right"></i></a>

            </div>
        </div>
        @endforeach

        
        
    </div>
    
    


</section>


@endsection
