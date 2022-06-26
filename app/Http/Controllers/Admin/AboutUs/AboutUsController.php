<?php

namespace App\Http\Controllers\Admin\AboutUs;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = AboutUs::all();
        return view('backend.aboutus.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.aboutus.create');
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
            $image->move(public_path('backend/images/aboutus'),$imageName);
            $data['image'] = $imageName;
        }
        AboutUs::create($data);
        return redirect()->route('about.view')->with('success','About Us Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $abouts = AboutUs::latest()->get();
        return view('frontend.about.about', compact('abouts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = AboutUs::findOrFail($id);
        return view('backend.aboutus.edit', compact('about'));
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
        $about = AboutUs::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $data = $request->except(['_token','image']);
        if($request->hasFile('image')){
            $image = $request->file('image');
            unlink(public_path('backend/images/aboutus/'.$about->image));
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('backend/images/aboutus'),$imageName);
            $data['image'] = $imageName;
        }
        else{
            $data['image'] = $about->image;
        }
        $about->update($data);
        return redirect()->route('about.view')->with('success','About Us Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AboutUs::findOrFail($id)->delete();
        return redirect()->route('about.view')->with('success','About Us Deleted Successfully');
    }
}
