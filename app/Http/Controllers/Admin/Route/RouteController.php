<?php

namespace App\Http\Controllers\Admin\Route;

use App\Http\Controllers\Controller;
use App\Models\Routes;
use App\Models\Transports;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = Routes::all();
        return view('backend.Routes.index',compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Routes.create');
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
            'source' => 'required',
            'destination' => 'required',
            'visiting_spots' => 'required',
            'description' => 'required'
        ]);
        
       $data = $request->except(['_token']);
        
        Routes::create($data);
        
        return redirect()->route('route.view')->with('success','Route Added Successfully');
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
    public function edit(Routes $route)
    {
        return view('backend.Routes.edit',compact('route'));
    }
    
        
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Routes $route)
    {
        $validate = $request->validate([
            'title' => 'required',            
            'source' => 'required',
            'destination' => 'required',
            'visiting_spots' => 'required',
            'description' => 'required'
        ]);
        
       $data = $request->except(['_token']);
        
        $route->update($data);
        
        return redirect()->route('route.view')->with('success','Route Updated Successfully');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Routes $route)
    {
        $route->delete();
        return redirect()->route('route.view')->with('success','Route Deleted Successfully');
    }
    
}
