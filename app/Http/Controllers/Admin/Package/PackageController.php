<?php

namespace App\Http\Controllers\Admin\Package;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageType;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();
        return view('backend.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packageTypes = PackageType::all();
        return view('backend.package.create',compact('packageTypes'));
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
            'package_type_id' => 'required',
            'package_name' => 'required|unique:packages,package_name',
            'package_price' => 'required',
            'package_location' => 'required',
            'package_features' => 'required',
            'package_details' => 'required',
            'package_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = new Package();
        $data->package_type_id = $request->package_type_id;
        $data->package_name = $request->package_name;
        $data->package_price = $request->package_price;
        $data->package_location = $request->package_location;

        $data->package_features = $request->package_features;
        $data->package_details = $request->package_details;
        if($request->hasFile('package_image')){
            $image = $request->file('package_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('backend/images/package/'),$imageName);
            $data->package_image = $imageName;
        }
        $data->save();
        return back()->with('success','Package Created Successfully');
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
    public function edit(Package $package)
    {
        $packageTypes = PackageType::all();
        return view('backend.package.edit',compact('package','packageTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Package $package)
    {
        $validate = $request->validate([
            'package_type_id' => 'required',
            'package_name' => 'required|unique:packages,package_name,'.$package->id,
            'package_price' => 'required',
            'package_location' => 'required',
            'package_features' => 'required',
            'package_details' => 'required',
            'package_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $package->package_type_id = $request->package_type_id;
        $package->package_name = $request->package_name;
        $package->package_price = $request->package_price;
        $package->package_location = $request->package_location;
        $package->package_features = $request->package_features;
        $package->package_details = $request->package_details;
        if($request->hasFile('package_image')){

            $image = $request->file('package_image');
            unlink(public_path('backend/images/package/').$package->package_image);
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('backend/images/package/'),$imageName);
            $package->package_image = $imageName;
        }
        else{
            $package->package_image = $package->package_image;
        }
        $package->save();
        return back()->with('success','Package Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $package->delete();
        return back()->with('success','Package Deleted Successfully');
    }
    
}
