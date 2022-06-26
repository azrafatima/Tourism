<?php

namespace App\Http\Controllers\Admin\Package\PackageType;

use App\Http\Controllers\Controller;
use App\Models\PackageType;
use Illuminate\Http\Request;

class PackageTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PackageType $packageType)
    {
        $packageTypes = $packageType->all();
        return view('backend.package.package-type.index', compact('packageTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.package.package-type.create');
        
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
            'package_type_name' => 'required|unique:package_types,package_type_name',
           
        ]);
        PackageType::create($validate);
        return back()->with('success','Package Type Created Successfully');
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
    public function edit(PackageType $packageType)
    { 
        return view('backend.package.package-type.edit',compact('packageType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PackageType $packageType)
    {
        $validate = $request->validate([
            'package_type_name' => 'required|unique:package_types,package_type_name,'.$packageType->id,
           
        ]);
        $packageType->update($validate);
        return back()->with('success','Package Type Updated Successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageType $packageType)
    {
        $packageType->delete();
        return back()->with('error','Package Type Deleted Successfully');
    }
    
}
