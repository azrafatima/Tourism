@extends('frontend.master_layout')
@section('main')


<section class="details">
   

    <div class="video-container" data-aos="fade-right" data-aos-delay="300">
        <img src="{{ asset('backend/images/travels/'.$travelAgency->image) }}" width="90%" class="image"  alt="">
    </div>

    <div class="content" data-aos="fade-left" data-aos-delay="600">
        <h3>Travel Agency Details</h3>
        <h5>Name <span>{{ $travelAgency->Name }}</span></h5>
        <h5>License Number <span>{{ $travelAgency->license_Number }}</span></h5>
        <h5>Tourism Department <span>{{ $travelAgency->tourism_department }}</span></h5>
        <h5>Traveling Area <span>{{ $travelAgency->traveling_area }}</span></h5>
        <h5>Address <span>{{ $travelAgency->address }}</span></h5>
        <h5>Phone Number <span> {{ $travelAgency->phone_Number }} </span></h5>
        <h5>Email <span>{{ $travelAgency->email }}</span></h5>
        <h5>Ratings <span>
            @php $rating = $travelAgency->ratings; @endphp  

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
        <a href="{{ route('travelAgency.booking.view') }}" class="btn">Book Now</a>


        
    </div>

</section>

@endsection