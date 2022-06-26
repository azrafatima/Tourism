<section class="footer">
<style>
    .links{
        text-decoration: none;
    }
</style>
    <div class="box-container">

        <div class="box" data-aos="fade-up" data-aos-delay="150">
            <a href="#" class="logo"> <i class="fas fa-paper-plane"></i>Journey </a>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="300">
            <h3>quick links</h3>
               <a href="{{ route('user.home') }}" class="links"> <i class="fas fa-arrow-right"></i> home </a>
              <a href="{{ route('front.about.view') }}" class="links"> <i class="fas fa-arrow-right"></i> about </a>           
            <a href="{{ route('front.gallery.view') }}" class="links"> <i class="fas fa-arrow-right"></i> gallery </a>
            @auth
            <a href="{{ route('front.all.booking.view') }}" class="links"> <i class="fas fa-arrow-right"></i> View All Bookings </a>
            @endauth
            <a href="{{ route('front.package.view') }}" class="links"> <i class="fas fa-arrow-right"></i> Packages </a>
            <a href="{{ route('front.travel.agency.view') }}" class="links"> <i class="fas fa-arrow-right"></i> Travel Agency </a>
            <a href="{{ route('front.hotel.view') }}" class="links"> <i class="fas fa-arrow-right"></i> Hotels </a>
            
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="450">
            @php
             $footers = \App\Models\Footer::latest()->get();   
            @endphp
            @foreach($footers as $key => $footer)
            <h3>contact info</h3>
            <p> <i class="fas fa-map"></i> {{ $footer->city }} </p>
            <p> <i class="fas fa-phone"></i> {{ $footer->phone }} </p>
            <p> <i class="fas fa-envelope"></i> {{ $footer->email }} </p>
            <p> <i class="fas fa-clock"></i> {{ $footer->timings }} </p>
            @endforeach
        </div>

        

    </div>

</section>
<div class="credit">Kashmir <span>Tourism Website</span> 2022 | all rights reserved!</div>
