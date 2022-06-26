<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('backend.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
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
       $data=$request->except(['_token','image']);
       if($request->hasFile('image')){
           $image=$request->file('image');
           $imageName=time().'.'.$image->getClientOriginalExtension();
           $image->move(public_path('backend/images/banner/'),$imageName);
           $data['image']=$imageName;
       }
         Banner::create($data);
        return redirect()->route('banner.view')->with('success','Banner created successfully');

        return redirect()->route('banner.view')->with('success', 'Banner created successfully');
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
        $banner = Banner::findOrFail($id);
        return view('backend.banner.edit', compact('banner'));
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
        $banner = Banner::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
         $data=$request->except(['_token','image']);
         if($request->hasFile('image')){
              $image=$request->file('image');
              unlink(public_path('backend/images/banner/'.$banner->image));
              $imageName=time().'.'.$image->getClientOriginalExtension();
              $image->move(public_path('backend/images/banner/'),$imageName);
              $data['image']=$imageName;
         }
         else{
                $data['image']=$banner->image;
         }
            $banner->update($data);
        return redirect()->route('banner.view')->with('success', 'Banner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        return redirect()->route('banner.view')->with('success', 'Banner deleted successfully');
    }
}
