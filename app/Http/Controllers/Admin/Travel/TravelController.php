<?php

namespace App\Http\Controllers\Admin\Travel;

use App\Http\Controllers\Controller;
use App\Models\TravelAgency;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $travelAgencies = TravelAgency::all();
        return view('backend.travel.index',compact('travelAgencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.travel.create');
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
            'Name'=> 'required|max:255',
            'email'=> 'required|email|max:255',
            'phone_Number'=> 'required|max:255',
            'address'=> 'required|max:500',
            'license_Number'=> 'required|max:255',
            'tourism_department' => 'required|max:255',
            'traveling_area' => 'required|max:255',
            'ratings' => 'required|min:1|max:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->except('image','_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('backend/images/travels/'),$imageName);
            $data['image'] = $imageName;
        }
        TravelAgency::create($data);
        return redirect()->back()->with('success','Travel Agency Created Successfully');
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
    public function edit(TravelAgency $travelAgency)
    {
        return view('backend.travel.edit',compact('travelAgency'));
    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TravelAgency $travelAgency)
    {
        $validate = $request->validate([
            'Name'=> 'required|max:255',
            'email'=> 'required|email|max:255',
            'phone_Number'=> 'required|max:255',
            'address'=> 'required|max:500',
            'license_Number'=> 'required|max:255',
            'tourism_department' => 'required|max:255',
            'traveling_area' => 'required|max:255',
            'ratings' => 'required|min:1|max:5',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->except('image','_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            unlink(public_path('backend/images/travels/').$travelAgency->image);
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('backend/images/travels/'),$imageName);
            $data['image'] = $imageName;
        }
        else{
            $data['image'] = $travelAgency->image;
        }
        $travelAgency->update($data);
        return redirect()->back()->with('success','Travel Agency Updated Successfully');
    }
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TravelAgency $travelAgency)
    {
        $travelAgency->delete();
        return redirect()->back()->with('success','Travel Agency Deleted Successfully');
    }
   
}
