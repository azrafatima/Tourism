<?php

namespace App\Http\Controllers\Admin\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotels;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotels::all();
        return view('backend.reservations.hotel.index',compact('hotels'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.reservations.hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'hotel_name' => 'required',
            'hotel_address' => 'required',
            'hotel_phone' => 'required',
            'hotel_email' => 'required',
            'hotel_services' => 'required',
            'hotel_type' => 'required',
            'hotel_price' => 'required',
            'hotel_images' => 'required',
            'hotel_rating'=>'required',
        ]);
    
        $data = $request->except('_token','hotel_images');
        if($request->hasFile('hotel_images')){
            $image = $request->file('hotel_images');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('backend/images/hotel/');
            $image->move($destinationPath,$image_name);
            $data['hotel_images'] = $image_name;
        }
            Hotels::create($data);
            return redirect()->back()->with('success','Hotel Created Successfully');
           
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
    public function edit(Hotels $hotel)
    {
        return view('backend.reservations.hotel.edit',compact('hotel'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotels $hotel)
    {
        $validate = $request->validate([
            'hotel_name' => 'required',
            'hotel_address' => 'required',
            'hotel_phone' => 'required',
            'hotel_email' => 'required',
            'hotel_services' => 'required',
            'hotel_type' => 'required',
            'hotel_price' => 'required',
            'hotel_rating'=>'required',
        ]);
    
        $data = $request->except('_token','hotel_images');
        if($request->hasFile('hotel_images')){
            $image = $request->file('hotel_images');
            unlink(public_path('backend/images/hotel/'.$hotel->hotel_images));
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('backend/images/hotel/');
            $image->move($destinationPath,$image_name);
            $data['hotel_images'] = $image_name;
        }
        else{
            $data['hotel_images'] = $hotel->hotel_images;
        }
            $hotel->update($data);
            return redirect()->back()->with('success','Hotel Updated Successfully');
           
        }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotels $hotel)
    {
        unlink(public_path('backend/images/hotel/'.$hotel->hotel_images));
        $hotel->delete();
        return redirect()->back()->with('success','Hotel Deleted Successfully');
    }
   
}
