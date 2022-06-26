<?php

use App\Http\Controllers\Admin\AboutUs\AboutUsController;
use App\Http\Controllers\Admin\Banner\BannerController;
use App\Http\Controllers\Admin\Bookings\BookingController;
use App\Http\Controllers\Admin\Footer\FooterController;
use App\Http\Controllers\Admin\Gallery\GalleryController;
use App\Http\Controllers\Admin\HomeSlider\HomeSliderController;
use App\Http\Controllers\Admin\Hotel\HotelController;
use App\Http\Controllers\Admin\Package\PackageType\PackageTypeController;
use App\Http\Controllers\Admin\Package\PackageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\Route\RouteController;
use App\Http\Controllers\Admin\Testomonials\TestomonialController;
use App\Http\Controllers\Admin\Transports\TransportController;
use App\Http\Controllers\Admin\Travel\TravelController;
use App\Http\Controllers\Frontend\Auth\AuthController;
use App\Http\Controllers\Frontend\Home\HomeController;
use App\Http\Controllers\Frontend\Hotel\HotelController as FrontHotelController;
use App\Http\Controllers\Frontend\Package\FrontPackageController;
use App\Http\Controllers\Frontend\Transport\FrontTransportController;
use App\Http\Controllers\Frontend\Travel\FrontTravelController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
// */
// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function(){
//     Route::get('/',[HomeController::class,'redirectUser']);
// });

// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','role:user'])->group(function(){
//     Route::get('/',[HomeController::class,'index'])->name('user.home');
// });

// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','role:admin'])->group(function(){
//     Route::get('/admin',[HomeController::class,'adminIndex'])->name('admin.dashboard');
// });

Route::get('/',[HomeController::class,'index'])->name('user.home');

// Route::get('/admin/dashboard',[HomeController::class,'adminIndex'])->name('admin.dashboard');



Route::prefix('admin')->middleware(['auth','role:admin'])->group(function(){

    Route::get('/',[HomeController::class,'adminIndex'])->name('admin.dashboard');

Route::prefix('package-type')->group(function(){
    Route::get('/view',[PackageTypeController::class,'index'])->name('package.type.view');
    Route::get('/create',[PackageTypeController::class,'create'])->name('package.type.create');
    Route::post('/store',[PackageTypeController::class,'store'])->name('package.type.store');
    Route::get('/edit/{packageType}',[PackageTypeController::class,'edit'])->name('package.type.edit');
    Route::post('/update/{packageType}',[PackageTypeController::class,'update'])->name('package.type.update');
    Route::get('/delete/{packageType}',[PackageTypeController::class,'destroy'])->name('package.type.destroy');



});

Route::prefix('package')->group(function(){
    Route::get('/view',[PackageController::class,'index'])->name('package.view');
    Route::get('/create',[PackageController::class,'create'])->name('package.create');
    Route::post('/store',[PackageController::class,'store'])->name('package.store');
    Route::get('/edit/{package}',[PackageController::class,'edit'])->name('package.edit');
    Route::post('/update/{package}',[PackageController::class,'update'])->name('package.update');
    Route::get('/delete/{package}',[PackageController::class,'destroy'])->name('package.destroy');

});

Route::prefix('travel-agency')->group(function(){
    Route::get('/view',[TravelController::class,'index'])->name('travel.agency.view');
    Route::get('/create',[TravelController::class,'create'])->name('travel.agency.create');
    Route::post('/store',[TravelController::class,'store'])->name('travel.agency.store');
    Route::get('/edit/{travelAgency}',[TravelController::class,'edit'])->name('travel.agency.edit');
    Route::post('/update/{travelAgency}',[TravelController::class,'update'])->name('travel.agency.update');
    Route::get('/delete/{travelAgency}',[TravelController::class,'destroy'])->name('travel.agency.destroy');
});

Route::prefix('hotel')->group(function(){
    Route::get('/view',[HotelController::class,'index'])->name('hotel.view');
    Route::get('/create',[HotelController::class,'create'])->name('hotel.create');
    Route::post('/store',[HotelController::class,'store'])->name('hotel.store');
    Route::get('/edit/{hotel}',[HotelController::class,'edit'])->name('hotel.edit');
    Route::post('/update/{hotel}',[HotelController::class,'update'])->name('hotel.update');
    Route::get('/delete/{hotel}',[HotelController::class,'destroy'])->name('hotel.destroy');
});
Route::prefix('transport')->group(function(){
    Route::get('/view',[TransportController::class,'index'])->name('transport.view');
    Route::get('/create',[TransportController::class,'create'])->name('transport.create');
    Route::post('/store',[TransportController::class,'store'])->name('transport.store');
    Route::get('/edit/{transport}',[TransportController::class,'edit'])->name('transport.edit');
    Route::post('/update/{transport}',[TransportController::class,'update'])->name('transport.update');
    Route::get('/delete/{transport}',[TransportController::class,'destroy'])->name('transport.destroy');
    
});
Route::prefix('routes')->group(function(){
    Route::get('/view',[RouteController::class,'index'])->name('route.view');
    Route::get('/create',[RouteController::class,'create'])->name('route.create');
    Route::post('/store',[RouteController::class,'store'])->name('route.store');
    Route::get('/edit/{route}',[RouteController::class,'edit'])->name('route.edit');
    Route::post('/update/{route}',[RouteController::class,'update'])->name('route.update');
    Route::get('/delete/{route}',[RouteController::class,'destroy'])->name('route.destroy');
});
Route::prefix('/testomonial')->group(function(){
    Route::get('/complaints/view',[TestomonialController::class,'viewComplaints'])->name('admin.complaint.view');
    Route::get('/suggestions/view',[TestomonialController::class,'viewSuggestions'])->name('admin.suggestion.view');
    
    Route::get('/complaint/{testomonial}/{action}',[TestomonialController::class,'complaintAction'])->name('complaint.action');
    Route::get('/suggestion/{testomonial}/{action}',[TestomonialController::class,'suggestionAction'])->name('suggestion.action');
    Route::post('/update/{testomonial}',[TestomonialController::class,'update'])->name('testomonial.update');
    Route::get('/delete/{testomonial}',[TestomonialController::class,'destroy'])->name('testomonial.destroy');

    
});
Route::prefix('/profile')->group(function(){
    Route::get('/view',[ProfileController::class,'index'])->name('admin.profile.view');
    Route::get('/edit',[ProfileController::class,'edit'])->name('admin.profile.edit');
    Route::post('/update',[ProfileController::class,'update'])->name('admin.profile.update');
    Route::get('/edit/password',[ProfileController::class,'show'])->name('admin.password.edit');
    Route::post('/update/password',[ProfileController::class,'updatePassword'])->name('admin.password.update');

});

    // Front Home Slider
    Route::get('/home-slider',[HomeSliderController::class,'index'])->name('home.slider.view');
    Route::get('/home-slider/create',[HomeSliderController::class,'create'])->name('home.slider.create');
    Route::post('/home-slider/store',[HomeSliderController::class,'store'])->name('home.slider.store');
    Route::get('/home-slider/edit/{id}',[HomeSliderController::class,'edit'])->name('home.slider.edit');
    Route::post('/home-slider/update/{homeSlider}',[HomeSliderController::class,'update'])->name('home.slider.update');
    Route::get('/home-slider/delete/{homeSlider}',[HomeSliderController::class,'destroy'])->name('home.slider.destroy');

    Route::prefix('about')->group(function(){
        Route::get('/view',[AboutUsController::class,'index'])->name('about.view');
        Route::get('/create',[AboutUsController::class,'create'])->name('about.create');
        Route::post('/store',[AboutUsController::class,'store'])->name('about.store');
        Route::get('/edit/{about}',[AboutUsController::class,'edit'])->name('about.edit');
        Route::post('/update/{about}',[AboutUsController::class,'update'])->name('about.update');
        Route::get('/delete/{about}',[AboutUsController::class,'destroy'])->name('about.destroy');
    });
    Route::prefix('banner')->group(function(){
        Route::get('/view',[BannerController::class,'index'])->name('banner.view');
        Route::get('/create',[BannerController::class,'create'])->name('banner.create');
        Route::post('/store',[BannerController::class,'store'])->name('banner.store');
        Route::get('/edit/{banner}',[BannerController::class,'edit'])->name('banner.edit');
        Route::post('/update/{banner}',[BannerController::class,'update'])->name('banner.update');
        Route::get('/delete/{banner}',[BannerController::class,'destroy'])->name('banner.destroy');
    });
    Route::prefix('footer')->group(function(){
        Route::get('/view',[FooterController::class,'index'])->name('footer.view');
        Route::get('/create',[FooterController::class,'create'])->name('footer.create');
        Route::post('/store',[FooterController::class,'store'])->name('footer.store');
        Route::get('/edit/{footer}',[FooterController::class,'edit'])->name('footer.edit');
        Route::post('/update/{footer}',[FooterController::class,'update'])->name('footer.update');
        Route::get('/delete/{footer}',[FooterController::class,'destroy'])->name('footer.destroy');
    });
    Route::prefix('gallery')->group(function(){
        Route::get('/view',[GalleryController::class,'index'])->name('gallery.view');
        Route::get('/create',[GalleryController::class,'create'])->name('gallery.create');
        Route::post('/store',[GalleryController::class,'store'])->name('gallery.store');
        Route::get('/edit/{gallery}',[GalleryController::class,'edit'])->name('gallery.edit');
        Route::post('/update/{gallery}',[GalleryController::class,'update'])->name('gallery.update');
        Route::get('/delete/{gallery}',[GalleryController::class,'destroy'])->name('gallery.destroy');
    });
    Route::prefix('bookings')->group(function(){
        Route::get('/package/view',[BookingController::class,'packageBookingView'])->name('front.package.booking.view');
        Route::get('/hotel/view',[BookingController::class,'hotelBookingView'])->name('front.hotel.booking.view');
        Route::get('/transport/view',[BookingController::class,'TransportBookingView'])->name('front.transport.booking.view');
        Route::get('/travel-agency/view',[BookingController::class,'travelAgencyBookingView'])->name('front.travel.booking.view');
        Route::get('/tour/view',[BookingController::class,'tourBookingView'])->name('front.tour.booking.view');
        
    });
    Route::post('admin/logout',[ProfileController::class,'AdminLogout'])->name('admin.logout');
    
});
Route::get('admin/login/form',[ProfileController::class,'showLoginForm'])->name('admin.login.form');
Route::post('admin/login',[ProfileController::class,'adminLogin'])->name('admin.login');






// Package
Route::get('/package',[FrontPackageController::class,'index'])->name('front.package.view');
Route::get('/package/details/{package}',[FrontPackageController::class,'show'])->name('front.package.show');


// Travel
Route::get('travel-agency',[FrontTravelController::class,'index'])->name('front.travel.agency.view');
Route::get('travel-agency/details/{travelAgency}',[FrontTravelController::class,'show'])->name('front.travel.agency.show');

// Hotel
Route::get('/hotel',[FrontHotelController::class,'index'])->name('front.hotel.view');
Route::get('hotel/details/{hotel}',[FrontHotelController::class,'show'])->name('front.hotel.show');


// Transport
Route::get('/transport',[FrontTransportController::class,'index'])->name('front.transport.view');
Route::get('transport/details/{transport}',[FrontTransportController::class,'show'])->name('front.transport.show')->middleware('user_auth');


// Complaint
Route::middleware(['user_auth'])->group(function(){
    Route::get('/complaint',[TestomonialController::class,'index'])->name('complaint.view');
    Route::get('/complaints/view',[TestomonialController::class,'viewComplaintsFront'])->name('front.complaint.view');
    Route::post('/complaint/store',[TestomonialController::class,'store'])->name('complaint.store');
    Route::get('/suggestion',[TestomonialController::class,'create'])->name('suggestion.create');
    Route::get('/suggestion/view',[TestomonialController::class,'viewSuggestionsFront'])->name('front.suggestion.view');
    Route::post('/suggestion/store',[TestomonialController::class,'insertSuggestion'])->name('suggestion.store');
    
});


// Booking
Route::post('/booking/store',[BookingController::class,'store'])->name('booking.store');
Route::get('/booking/package/{booking}/{action}',[BookingController::class,'bookingAction'])->name('package.booking.action');
Route::get('/booking/hotel/{booking}/{action}',[BookingController::class,'bookingAction'])->name('hotel.booking.action');
Route::get('/booking/transport/{booking}/{action}',[BookingController::class,'bookingAction'])->name('transport.booking.action');
Route::get('/booking/travel-agency/{booking}/{action}',[BookingController::class,'bookingAction'])->name('travel.booking.action');
Route::get('/booking/tour/{booking}/{action}',[BookingController::class,'bookingAction'])->name('tour.booking.action');

Route::middleware(['user_auth'])->group(function(){
    
    Route::get('/booking',[BookingController::class,'index'])->name('booking.view');
    Route::get('/transport/booking',[BookingController::class,'transportBooking'])->name('transport.booking.view');
    Route::get('/hotel/booking',[BookingController::class,'hotelBooking'])->name('hotel.booking.view');
    Route::get('/travel-agency/booking',[BookingController::class,'travelAgencyBooking'])->name('travelAgency.booking.view');
    Route::get('/package/booking',[BookingController::class,'packageBooking'])->name('package.booking.view');
    Route::get('/all/bookings',[BookingController::class,'TourTable'])->name('front.all.booking.view');
});


// Front Auth
Route::get('/user/register',[AuthController::class,'register'])->name('front.register');
Route::post('/user/register/store',[AuthController::class,'store'])->name('front.register.store');
Route::get('/user/login',[AuthController::class,'login'])->name('front.login');
Route::post('/user/login',[AuthController::class,'userLogin'])->name('front.login.process');
Route::middleware(['user_auth'])->group(function(){

    Route::get('/user/change-password',[AuthController::class,'show'])->name('front.change.password');
    Route::post('/user/update-password',[AuthController::class,'changePassword'])->name('front.update.password');
    Route::get('/user/edit-profile',[AuthController::class,'edit'])->name('front.edit.profile');
    Route::get('/user/view-profile',[AuthController::class,'viewProfile'])->name('front.view.profile');
    Route::post('/user/update-profile/{id}',[AuthController::class,'update'])->name('front.profile.update');
});

Route::post('/user/logout',[AuthController::class,'logout'])->name('front.logout');

// Front Gallery
Route::get('/gallery',[GalleryController::class,'show'])->name('front.gallery.view');


// About Us Frontend
Route::get('/about-us',[AboutUsController::class,'show'])->name('front.about.view');

