<?php

namespace App\Http\Controllers\Admin\Footer;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Footer::all();
        return view('backend.footer.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.footer.create');
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
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'timings'=> 'required',
        ]);
        $data = $request->except(['_token']);
        Footer::create($data);
        return redirect()->route('footer.view')->with('success', 'Footer Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Footer::findOrFail($id);
        return view('backend.footer.edit', compact('contact'));
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
        $contact = Footer::findOrFail($id);
        $validate = $request->validate([
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'timings'=> 'required',
        ]);
        $data = $request->except(['_token']);
        $contact->update($data);
        return redirect()->route('footer.view')->with('success', 'Footer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Footer::findOrFail($id);
        $contact->delete();
        return redirect()->route('footer.view')->with('success', 'Footer Deleted Successfully');
    }
}
