@extends('frontend.master_layout')
@section('main')


<section class="details" id="package_detail">
   

    <div class="video-container" data-aos="fade-right" data-aos-delay="300">
        <img src="{{ asset('backend/images/transports/'.$transport->image) }}" width="90%" class="image"  alt="">
    </div>

    <div class="content" data-aos="fade-left" data-aos-delay="600">
        <h3>Transport Service Details</h3>
        <h5>Transport Name <span>{{ $transport->name }}</span></h5>
        <h5>Transport Phone Number <span>{{ $transport->phone }}</span></h5>
        <h5>Source Location <span> {{ $transport->Source }} </span></h5>
        <h5>Destination  <span>{{ $transport->destination }}</span></h5>
        <h5>Price  <span>Rs {{ $transport->price }}</span></h5>
        <h5>Transport Rating <span>
            @php $rating = $transport->rating; @endphp  
            
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
        <h5>Transport Details <br><span>{{ $transport->description }}</span></h5><br>
        <h4 style="color: #29d9d5">Route Details</h4>


        <h5>Transport Route <span>{{ $transport->routes->title }}</span></h5>
        <h5>Route Source <span>{{ $transport->routes->source }}</span></h5>
        <h5>Route Destination <span>{{ $transport->routes->destination }}</span></h5>
        <h5>Visiting Spots on the way <span>{{ $transport->routes->visiting_spots }}</span></h5>
        <h5>Description of the Route <span>{{ $transport->routes->description }}</span></h5>

        <a href="{{ route('transport.booking.view') }}" class="btn">Book Now</a>
    </div>
    
</section>

@endsection