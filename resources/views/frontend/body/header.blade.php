
<header class="header">

    <div id="menu-btn" class="fas fa-bars"></div>

    <a data-aos="zoom-in-left" data-aos-delay="150" href="#" class="logo"> <i class="fas fa-paper-plane"></i>Journey </a>

    <nav class="navbar">
        <li class="nav-item"><a data-aos="zoom-in-left"   class="nav-link" data-aos-delay="300" href="{{ route('user.home') }}">home</a></li>
        <li class="nav-item"> <a data-aos="zoom-in-left"  class="nav-link"  data-aos-delay="450" href="{{ route('front.about.view') }}">about</a></li>
        <li class="nav-item"> <a data-aos="zoom-in-left"  class="nav-link"  data-aos-delay="600" href="{{ route('front.gallery.view') }}">gallery</a></li>
       @auth
        <li class="nav-item dropdown"><a data-aos="zoom-in-left" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" data-aos-delay="750" href="pages/testomonials.html">Tetomonials</a>
            <ul class="dropdown-menu" style="background-color: #222;" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="{{ route('suggestion.create') }}">Suggestions</a></li>
                <li><a class="dropdown-item" href="{{ route('complaint.view') }}">Complaint</a></li>
                <li><a class="dropdown-item" href="{{ route('front.complaint.view') }}">View All Complaints</a></li>
                <li><a class="dropdown-item" href="{{ route('front.suggestion.view') }}">View All Suggestions</a></li>
                
              </ul>
        </li>
        <li class="nav-item"> <a data-aos="zoom-in-left" class="nav-link" data-aos-delay="900" href="{{ route('front.all.booking.view') }}">view All Bookings</a> </li>
        @endauth
        <li class="nav-item"> <a data-aos="zoom-in-left"  class="nav-link"  data-aos-delay="600" href="{{ route('front.package.view') }}">Packages</a></li>
        <li class="nav-item"> <a data-aos="zoom-in-left"  class="nav-link"  data-aos-delay="600" href="{{ route('front.travel.agency.view') }}">Travel Agecny</a></li>
        <li class="nav-item"> <a data-aos="zoom-in-left"  class="nav-link"  data-aos-delay="600" href="{{ route('front.hotel.view') }}">Hotels</a></li>
    
    </nav>
<div style="display: inline-block">
    
    @auth
    <ul class="navbar-nav header-right">           
        <li class="nav-item dropdown  header-profile">
            <a class="nav-link" href="javascript:void(0);" role="button" class="dropdown-toggle" data-bs-toggle="dropdown">
				<img src="{{ !empty(Auth::user()->profile_photo_path)? url('frontend/images/profile/'.Auth::user()->profile_photo_path): url('backend/admin/no_image.jpg') }}" width="56" alt="">

                
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="{{ route('front.view.profile') }}" class="dropdown-item ai-icon">
                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    <span class="ms-2">Profile </span>
                </a>
                <a href="{{ route('front.change.password') }}" class="dropdown-item ai-icon">
                    <i class="fas fa-key"></i>
                    <span class="ms-2">Update Password </span>
                </a>
              
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item ai-icon">
                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                    <span class="ms-2">Logout </span>
                </a>
                <form action="{{ route('front.logout') }}" id="logout-form" style="display: none" method="post">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
    @else
    <a data-aos="zoom-in-left" data-aos-delay="1300" href="{{ route('front.login') }}" style="padding: 0.5rem 1rem; margin-right:10px" class="btn">Login</a>
    <a data-aos="zoom-in-right" data-aos-delay="1300" href="{{ route('front.register') }}" style="padding: 0.5rem 1rem; " class="btn">Register</a>    
    
    @endauth
    
</div>
</header>