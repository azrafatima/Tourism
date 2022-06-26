<?php

namespace App\Http\Controllers\Admin\Transports;

use App\Http\Controllers\Controller;
use App\Models\Routes;
use App\Models\Transports;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transports = Transports::all();
        return view('backend.reservations.transport.index', compact('transports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routes = Routes::all();
        return view('backend.reservations.transport.create',compact('routes'));
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
            'name'=> 'required|max:255',
            'description' => 'required|max:500',
            'Source' => 'required|max:255',
            'destination' => 'required|max:255',
            'price' => 'required',
            'rating' => 'required|min:1|max:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $data = $request->except('image','_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('backend/images/transports/'),$imageName);
            $data['image'] = $imageName;
        }
        Transports::create($data);
        return redirect()->back()->with('success','Transport Created Successfully');
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
    public function edit(Transports $transport)
    {
        $routes = Routes::all();
        return view('backend.reservations.transport.edit', compact('transport','routes'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transports $transport)
    {
        $validate = $request->validate([
            'name'=> 'required|max:255',
            'description' => 'required|max:500',
            'Source' => 'required|max:255',
            'destination' => 'required|max:255',
            'price' => 'required',
            'rating' => 'required|min:1|max:5',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->except('image','_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            unlink(public_path('backend/images/transports/'.$transport->image));
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('backend/images/transports/'),$imageName);
            $data['image'] = $imageName;
        }
        else{
            $data['image'] = $transport->image;
        }
        $transport->update($data);
        return redirect()->back()->with('success','Transport Updated Successfully');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transports $transport)
    {
        unlink(public_path('backend/images/transports/'.$transport->image));
        $transport->delete();
        return redirect()->back()->with('success','Transport Deleted Successfully');
    }
   
}
