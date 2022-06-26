@extends('frontend.master_layout')
@section('main')

<section class="travel" id="travel">

    <div class="heading">
        <span>Top Transports</span>
        <h1>Select the best Transport Service</h1>
    </div>

    <div class="box-container">

        @foreach ($transports as $key => $transport)
            
        <div class="box" data-aos="fade-up" data-aos-delay="150">
            <div class="image">
                <img src="{{ asset('backend/images/transports/'.$transport->image) }}" alt="">
            </div>
            <div class="content">
                <h2>{{ $transport->name }}</h2>
                <h4>From : {{ $transport->Source  }} To {{ $transport->destination }}</h4>
                <h4>Price : Rs {{ $transport->price }}</h4>
                <p>Call Now : {{ $transport->phone }}</p>

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
            <br>

            <a href="{{ route('front.transport.show',$transport->id) }}">read more <i class="fas fa-angle-right"></i></a>

            
            </div>
        </div>
        @endforeach

        
        
    </div>
    
    
    
</section>




@endsection
