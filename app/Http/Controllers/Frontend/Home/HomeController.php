<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Gallery;
use App\Models\HomeSlider;
use App\Models\Hotels;
use App\Models\Package;
use App\Models\Transports;
use App\Models\TravelAgency;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        $banners = Banner::latest()->get();
        $sliders = HomeSlider::orderBy('id','desc')->get();
        $packages = Package::all();
        $travels = TravelAgency::all();
        $hotels = Hotels::all();
        $transports = Transports::all();
        return view('frontend.index',compact('packages','travels','hotels','transports','sliders','banners','galleries'));
    }

    public function adminIndex(){
        return view('backend.index');
    }
    public function redirectUser()
    {
        
        if(auth()->user()->hasRole('user')){
            return redirect()->route('user.home');
        }
        if(auth()->user()->hasRole('admin')){
            return redirect()->route('admin.dashboard');
        }
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
        //
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
        //
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
