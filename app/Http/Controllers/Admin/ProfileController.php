<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.profile.view_profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'profile_photo_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->except('profile_photo_path','password_confirmation','_token');
        if($request->hasFile('profile_photo_path')){
            $image = $request->file('profile_photo_path');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('frontend/images/profile/'),$imageName);
            $data['profile_photo_path'] = $imageName;
        }
        $user = User::create($data);
        return redirect()->route('admin.profile.view')->with('success','Profile created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('backend.profile.change_password');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('backend.profile.edit_profile');
    }
    public function updatePassword(Request $request){
        $validate = $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
        $user = User::find(auth()->user()->id);
        if(Hash::check($request->old_password,$user->password)){
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('admin.profile.view')->with('success','Password changed successfully');
        }else{
            return redirect()->route('admin.profile.view')->with('error','Old password is incorrect');
        }
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function adminLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->except(['_token']);

        $user = User::where('email',$request->email)->where('role','admin')->first();
        

        if (auth()->attempt($credentials)) {

            return redirect()->route('admin.dashboard');

        }else{
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->has('profile_photo_path')){
            $image = $request->file('profile_photo_path');
            if(isset(Auth::user()->profile_photo_path)){
                unlink(public_path('backend/images/profile/').Auth::user()->profile_photo_path);
            }
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('backend/images/profile/'),$imageName);
            $user->profile_photo_path = $imageName;
        }
        else{
            $user->profile_photo_path = $user->profile_photo_path;
        }
        $user->save();
        return redirect()->route('admin.profile.view')->with('success','Profile Updated Successfully');
    }

    public function AdminLogout(){
        Auth::logout();
        return redirect()->route('admin.login.form');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
