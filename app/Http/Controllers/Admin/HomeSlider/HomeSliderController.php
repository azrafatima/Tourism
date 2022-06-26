<?php

namespace App\Http\Controllers\Admin\HomeSlider;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeSliders = HomeSlider::all();
        return view('backend.homeslider.index',compact('homeSliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.homeslider.create');
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
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $data = $request->except(['_token','image']);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('backend/images/homeslider'),$imageName);
            $data['image'] = $imageName;
        }
        HomeSlider::create($data);
        return redirect()->route('home.slider.view')->with('success','Home Slider Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $homesliders = HomeSlider::all();
        // return view()
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $homeslider = HomeSlider::findOrFail($id);
        return view('backend.homeslider.edit',compact('homeslider'));
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
        $homeslider = HomeSlider::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
        ]);
        $data = $request->except(['_token','image']);
        if($request->hasFile('image')){
            $image = $request->file('image');
            unlink(public_path('backend/images/homeslider/'.$homeslider->image));
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('backend/images/homeslider'),$imageName);
            $data['image'] = $imageName;
        }
        else{
            $data['image'] = $homeslider->image;
        }
        // dd($homeslider);
        $homeslider->update($data);
        return redirect()->route('home.slider.view')->with('success','Home Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homeslider=HomeSlider::findOrFail($id);
        $homeslider->delete();
        return redirect()->route('home.slider.view')->with('success','Home Slider Deleted Successfully');
    }
}
