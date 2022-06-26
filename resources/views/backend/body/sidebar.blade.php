<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
               

            </li>   
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                <i class="fas fa-info-circle"></i>
                    <span class="nav-text">Administrator</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.profile.view') }}">Profile</a></li>
                   
                   
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-box"></i>
                    <span class="nav-text">Package</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('package.type.create') }}">Create Package Type</a></li>
                    <li><a href="{{ route('package.type.view') }}">View Package Types</a></li>
                    <li><a href="{{ route('package.create') }}">Add Package</a></li>
                    <li><a href="{{ route('package.view') }}">View Packages</a></li>
                    
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-store"></i>
                    <span class="nav-text">Travel Agency</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('travel.agency.create') }}">Add Travel Agency</a></li>
                    <li><a href="{{ route('travel.agency.view') }}">View Travel Agency</a></li>

                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                <i class="fas fa-route"></i>
                <span class="nav-text">Routes</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('route.create') }}">Add Route</a></li>
                <li><a href="{{ route('route.view') }}">view All Routes</a></li>
            </ul>
        </li>
           
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                <i class="fas fa-calendar-check"></i>
                    <span class="nav-text">Reservations</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="form-element.html" class="has-arrow" aria-expanded="false">Hotels</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('hotel.create') }}">Add Hotel</a></li>
                            <li><a href="{{ route('hotel.view') }}">View Hotel</a></li>
                            
                            
                        </ul>
                    </li>
                    <li><a href="#" class="has-arrow">Transports</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('transport.create') }}">Add Transport Service</a></li>
                            <li><a href="{{ route('transport.view') }}">View Transport Service</a></li>
                            
                            
                        </ul>
                    </li>
                    
                </ul>
            </li>
           
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                <i class="fas fa-calendar-alt"></i>
                <span class="nav-text">Bookings</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('front.tour.booking.view') }}">View Tour Booking</a></li>
                <li><a href="{{ route('front.hotel.booking.view') }}">View Hotel Booking Only</a></li>
                <li><a href="{{ route('front.transport.booking.view') }}">View Transport Booking Only</a></li>
                <li><a href="{{ route('front.package.booking.view') }}">View Package Booking Only</a></li>
                <li><a href="{{ route('front.travel.booking.view') }}">View Tavel Agency Booking Only</a></li>
            </ul>
        </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                <i class="fas fa-comment"></i>
                <span class="nav-text">Testomonial</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('admin.complaint.view') }}">Complaints</a></li>
                <li><a href="{{ route('admin.suggestion.view') }}">Suggestions</a></li>
            </ul>
        </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-clone"></i>
                    <span class="nav-text">Front End Pages</span>
                </a>
                <ul aria-expanded="false">
                    
                    
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Home Slider</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('home.slider.create') }}">Add Home Slider</a></li>
                            <li><a href="{{ route('home.slider.view') }}">View Home Slider</a></li>                            
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">About Us</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('about.create') }}">Add About Details</a></li>
                            <li><a href="{{ route('about.view') }}">View About Details</a></li>                            
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Banner</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('banner.create') }}">Add Banner</a></li>
                            <li><a href="{{ route('banner.view') }}">View Banner</a></li>                            
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Footer Contact</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('footer.create') }}">Add Footer Contact</a></li>
                            <li><a href="{{ route('footer.view') }}">View Footer Contact</a></li>                            
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Gallery</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('gallery.create') }}">Add Gallery Images</a></li>
                            <li><a href="{{ route('gallery.view') }}">View Gallery</a></li>                            
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        
        
    </div>
</div>