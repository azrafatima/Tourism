@extends('frontend.master_layout')
@section('main')
    
<section class="travel" id="travel">

    <div class="heading">
        <h1>Travel Agencies</h1>
    </div>

    <div class="box-container">

        @foreach($travels as $travel)
        <div class="box" data-aos="fade-up" data-aos-delay="150">
            <div class="image">
                <img src="{{ asset('backend/images/travels/'.$travel->image) }}" alt="">
            </div>
            <div class="content">
                <h2>{{ $travel->Name }}</h2>
                <h4>{{ $travel->tourism_department }}</h4>
                <p>{{ $travel->traveling_area }}</p>

                @php $rating = $travel->ratings; @endphp  

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
                <a href="{{ route('front.travel.agency.show',$travel->id) }}">read more <i class="fas fa-angle-right"></i></a>
            </div>
        </div>
        @endforeach

    
    </div>

</section>


@endsection
