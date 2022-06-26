@extends('frontend.master_layout')
@section('main')
    
<!-- home section starts  -->
@foreach($sliders as $key => $slider)

<section class="home" id="home" style="background: linear-gradient(rgba(17, 17, 17, 0.7), rgba(17, 17, 17, 0.7)), url({{ asset('backend/images/homeslider/'.$slider->image) }}) no-repeat; background-size: cover;
background-position: center;">

    <div class="content">
        <span data-aos="fade-up" data-aos-delay="150">{{ $slider->title }}</span>
        <h3 data-aos="fade-up" data-aos-delay="300">{{ $slider->subtitle }}</h3>
        <p data-aos="fade-up" data-aos-delay="450">{{ $slider->description }}</p>
            @if($key==0)
                @break
            
            @endif
        @endforeach
        <a data-aos="fade-up" data-aos-delay="600" href="{{ route('booking.view') }}" class="btn">book now</a>
    </div>

</section>

<!-- home section ends -->

{{-- Package Section starts --}}

<section class="package" id="package">

    <div class="heading">
        <span>our Packages</span>
        <h1>Select Your Package</h1>
    </div>

    <div class="box-container">
        @foreach ($packages as $key => $package) 
            
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
            @if($key == 2){
                @break;
            }
            @endif
        </div>
        @endforeach

  
        
    </div>
    
    
</section>
<div class="row">
    <div style="margin-left:5rem">
        <a data-aos="fade-up" data-aos-delay="600" style="width: 20%; margin:0 auto;" href="{{ route('front.package.view') }}" class="btn">More Packages</a>
    </div>
</div>


{{-- Package Section ends --}}

{{-- Travel Agencies --}}


<section class="travel" id="travel">

    <div class="heading">
        <span>Top Travel Agencies</span>
        <h1>Select the best Travel agency</h1>
    </div>

    <div class="box-container">

        @foreach ($travels as $key => $travel)
            
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

            @if($key == 2){
                @break;
            }
            @endif
            </div>
        </div>
        @endforeach

        
        
    </div>
    
    
    
</section>
<div class="row">
    <div style="margin-left: 5rem">

        <a data-aos="fade-up" data-aos-delay="600" style="width: 23%; margin-top:20px;" href="{{ route('front.travel.agency.view') }}" class="btn">More Travel Agencies</a>
    </div>

</div>




{{-- Travel Agencies ends --}}


{{-- Hotels starts --}}


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

            @if($key == 2){
                @break;
            }
            @endif
            </div>
        </div>
        @endforeach

        
        
    </div>
    
    
    
</section>
<div class="row">
    <div style="margin-left: 5rem">
        <a data-aos="fade-up" data-aos-delay="600" style="width: 15%; margin-top:20px;" href="{{ route('front.hotel.view') }}" class="btn">More Hotels</a>
    </div>
</div>


{{-- Hotels ENds --}}



{{-- Transport starts --}}


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

            @if($key == 2){
                @break;
            }
            @endif
            </div>
        </div>
        @endforeach

        
        
    </div>
    
    
    
</section>
<div class="row">
    <div style="margin-left: 5rem">
        <a data-aos="fade-up" data-aos-delay="600" style="width: 25%; margin-top:20px;" href="{{ route('front.transport.view') }}" class="btn">More Transport Services</a>
        
    </div>

{{-- Transport ENds --}}
</div>


{{-- Transport ENds --}}



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
        @if($key == 2)
            @break
        
        @endif
        @endforeach

       

         

    </div>

</section>

<!-- gallery section ends -->

<!-- blogs section starts  -->



<!-- blogs section ends -->

<!-- banner section starts  -->
@foreach($banners as $key => $banner)
<div class="banner" style="background: linear-gradient(rgba(17, 17, 17, 0.7), rgba(17, 17, 17, 0.7)), url({{ asset('backend/images/banner/'.$banner->image) }}) no-repeat; background-size: cover; background-position: center;">

    <div class="content" data-aos="zoom-in-up" data-aos-delay="300">
        <span>{{ $banner->title }}</span>
        <h3>{{ $banner->subtitle }}</h3>
        <p>{{ $banner->description }}</p>
        <a href="{{ route('booking.view') }}" class="btn">book now</a>
    </div>

</div>
@endforeach

<!-- banner section ends -->
@endsection