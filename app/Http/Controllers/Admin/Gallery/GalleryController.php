<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('backend.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.gallery.create');
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
            'title' => 'required',
            'subtitle' => 'required',
            'image' => 'required',
        ]);
        $data = $request->except(['_token','image']);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('backend/images/gallery'), $imageName);
            $data['image'] = $imageName;
        }
      
        Gallery::create($data);
        return redirect()->back()->with('success', 'Gallery Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $galleries = Gallery::all();
        return view('frontend.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('backend.gallery.edit', compact('gallery'));
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
        $validate = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'image' => 'required',
        ]);
        $gallery = Gallery::findOrFail($id);
        $data = $request->except(['_token','image']);
        if($request->hasFile('image')){
            $image = $request->file('image');
            unlink(public_path('backend/images/gallery/'.$gallery->image));
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('backend/images/gallery'), $imageName);
            $data['image'] = $imageName;
        }
        else{
            $data['image'] = $gallery->image;
        }
        $gallery->update($data);
        return redirect()->back()->with('success', 'Gallery Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();
        return redirect()->back()->with('success', 'Gallery Deleted Successfully');
    }
}
