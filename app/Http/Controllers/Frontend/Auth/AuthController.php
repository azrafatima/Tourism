<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('frontend.auth.register');
    }
  public function login()
    {
        return view('frontend.auth.login');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('front.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->except(['_token']);

        $user = User::where('email',$request->email)->where('role','user')->first();

        if (auth()->attempt($credentials)) {

            return redirect()->route('user.home');

        }else{
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $register = $request->validate([
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
        $data['password'] = bcrypt($request->password);
        User::create($data);
        return redirect()->route('front.login')->with('success','Registration Successful');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        return view('frontend.auth.change_password');
    }
    public function changePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
        $user = Auth::user();
        if(Hash::check($request->old_password,$user->password)){
            $user->password = bcrypt($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('front.login')->with('success','Password Changed Successfully');
        }
        return redirect()->route('front.change_password')->with('error','Old Password is not correct');
    }
  
     /* Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('frontend.auth.edit_profile');
    }
    public function viewProfile()
    {
        return view('frontend.auth.view_profile');
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->hasFile('profile_photo_path')){
            $image = $request->file('profile_photo_path');
            if(isset($user->profile_photo_path)){
            unlink(public_path('frontend/images/profile/').$user->profile_photo_path);

            }
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('frontend/images/profile/'),$imageName);
            $user->profile_photo_path = $imageName;
        }
        else{
            $user->profile_photo_path = $user->profile_photo_path;
        }
        $user->save();
        return redirect()->route('front.view.profile')->with('success','Profile Updated Successfully');
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
