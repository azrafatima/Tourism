<?php

namespace App\Http\Controllers\Admin\Bookings;

use App\Http\Controllers\Controller;
use App\Models\CustomerBooking;
use App\Models\Hotels;
use App\Models\Package;
use App\Models\Transports;
use App\Models\TravelAgency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transports = Transports::all();
        $hotels = Hotels::all();
        $travel_agencies = TravelAgency::all();
        return view('frontend.booking.tour_booking',compact('transports','hotels','travel_agencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([            
            'name' => 'required',
            'guardian_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'nic'=>'required',
            'address' => 'required',
            'covid_19_status'=>'required',
            'covid_19_certificate'=>'required|image|mimes:jpeg,jpg,png,pdf',
        ]);
        if(isset($request->transport_id,$request->hotel_id,$request->travel_agency_id)){

        $data = $request->except(['_token','covid_19_certificate']);
        $data['user_id'] = Auth::user()->id;
        if($request->hasFile('covid_19_certificate')){
            $file = $request->file('covid_19_certificate');
            $image_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/backend/images/booking/covid_certificates/covid_19_certificate/',$image_name);
            $data['covid_19_certificate'] = $image_name;
        }
        CustomerBooking::create($data);
        return redirect()->back()->with($notification=array(
            'message'=>'Booking Successfully',
            'alert-type'=>'success'
        ));
    }
    // transport
    else if(isset($request->transport_id)){
        $data = $request->except(['_token','covid_19_certificate']);
        $data['user_id'] = Auth::user()->id;
        if($request->hasFile('covid_19_certificate')){
            $file = $request->file('covid_19_certificate');
            $image_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/backend/images/booking/covid_certificates/covid_19_certificate/',$image_name);
            $data['covid_19_certificate'] = $image_name;
        }
        CustomerBooking::create($data);
        return redirect()->back()->with($notification=array(
            'message'=>'Booking Successfully',
            'alert-type'=>'success'
        ));
    }
    // hotel
    else if(isset($request->hotel_id)){
        $data = $request->except(['_token','covid_19_certificate']);
        $data['user_id'] = Auth::user()->id;
        if($request->hasFile('covid_19_certificate')){
            $file = $request->file('covid_19_certificate');
            $image_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/backend/images/booking/covid_certificates/covid_19_certificate/',$image_name);
            $data['covid_19_certificate'] = $image_name;
        }
        CustomerBooking::create($data);
        return redirect()->back()->with($notification=array(
            'message'=>'Booking Successfully',
            'alert-type'=>'success'
        ));
    }
    // travel agency
    else if(isset($request->travel_agency_id)){
        $data = $request->except(['_token','covid_19_certificate']);
        $data['user_id'] = Auth::user()->id;
        if($request->hasFile('covid_19_certificate')){
            $file = $request->file('covid_19_certificate');
            $image_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/backend/images/booking/covid_certificates/covid_19_certificate/',$image_name);
            $data['covid_19_certificate'] = $image_name;
        }
        CustomerBooking::create($data);
        return redirect()->back()->with($notification=array(
            'message'=>'Booking Successfully',
            'alert-type'=>'success'
        ));
    }
    // package
    else if(isset($request->package_id)){
        $data = $request->except(['_token','covid_19_certificate']);
        $data['user_id'] = Auth::user()->id;
        if($request->hasFile('covid_19_certificate')){
            $file = $request->file('covid_19_certificate');
            $image_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/backend/images/booking/covid_certificates/covid_19_certificate/',$image_name);
            $data['covid_19_certificate'] = $image_name;
        }
        CustomerBooking::create($data);
        return redirect()->back()->with($notification=array(
            'message'=>'Booking Successfully',
            'alert-type'=>'success'
        ));
        }

    }

    // Hotel Booking
    public function hotelBooking(Request $request){
        $hotels = Hotels::all();
        return view('frontend.booking.hotel_booking',compact('hotels'));


    }
    // Transport Booking
     public function transportBooking(Request $request){
        $transports = Transports::all();
        return view('frontend.booking.transport_booking',compact('transports'));


    }
    // Travel Agency Booking
     public function travelAgencyBooking(Request $request){
        $travel_agencies = TravelAgency::all();
        return view('frontend.booking.travel_agency_booking',compact('travel_agencies'));


    }
    // Pacakge Booking
     public function packageBooking(Request $request){
        $packages = Package::all();
        return view('frontend.booking.package_booking',compact('packages'));


    }

    // Pacakge Booking view
    public function packageBookingView(Request $request){
        $packages = CustomerBooking::where('package_id','!=','')->get();
        
        return view('backend.booking.view_package_booking',compact('packages'));


    }
    // Hotel Booking view
        public function hotelBookingView(Request $request){
            $hotels = CustomerBooking::where('hotel_id','!=','')->where('transport_id',null)->where('travel_agency_id',null)->where('package_id',null)->get();
        
            return view('backend.booking.view_hotel_booking',compact('hotels'));


        }
    // Transport Booking view
            public function TransportBookingView(Request $request){
                $transports = CustomerBooking::where('hotel_id',null)->where('transport_id','!=',null)->where('travel_agency_id',null)->where('package_id',null)->get();
            
                return view('backend.booking.view_transport_booking',compact('transports'));


            }
    // Travel agency Booking view
            public function travelAgencyBookingView(Request $request){
                $travels = CustomerBooking::where('hotel_id',null)->where('transport_id',null)->where('travel_agency_id','!=',null)->where('package_id',null)->get();
            
                return view('backend.booking.view_travel_booking',compact('travels'));


            }
            // Tour agency Booking view
            public function TourBookingView(Request $request){
                $tours = CustomerBooking::where('hotel_id','!=',null)->where('transport_id','!=',null)->where('travel_agency_id','!=',null)->get();
                // dd($tours);
                return view('backend.booking.view_tour_booking',compact('tours'));


            }
            // Fron Tour Table 
            public function TourTable(Request $request){

            $tours = CustomerBooking::where('user_id',Auth::user()->id)->get();
                // dd($tours);
                return view('frontend.booking.view_bookings',compact('tours'));

            }

    // Booking Action
    public function bookingAction($id,$action){
        $booking = CustomerBooking::find($id);
        if($action == 'approve'){
            $booking->status = 'Approved';
            $booking->save();
            return redirect()->back()->with($notification=array(
                'message'=>'Booking Successfully Approved',
                'alert-type'=>'success'
            ));
        }
       
        else if($action == 'reject'){
            $booking->status = 'Rejected';
            $booking->save();
            return redirect()->back()->with($notification=array(
                'message'=>'Booking Successfully Rejected',
                'alert-type'=>'success'
            ));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
