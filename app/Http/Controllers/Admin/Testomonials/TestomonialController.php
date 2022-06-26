<?php

namespace App\Http\Controllers\Admin\Testomonials;

use App\Http\Controllers\Controller;
use App\Models\Testomonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestomonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.testomonials.complaint');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.testomonials.suggestions');
        
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
            'subject' => 'required',
            'complaint' => 'required',
        ]);
        $data = $request->except(['_token']);
        $data['user_id'] = Auth::user()->id;     
        // dd($data)  ;
        Testomonial::create($data);
        return redirect()->back()->with('success', 'Complaint Sent Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function insertSuggestion(Request $request)
    {
        $validate = $request->validate([
            'subject'=>'required',
            'suggestions'=>'required',
        ]);
        $data = $request->except(['_token']);
        $data['user_id'] = Auth::user()->id;
        Testomonial::create($data);
        return redirect()->back()->with($notification = array(
            'message' => 'Suggestion submitted Successfully',
            'alert-type' => 'success'
        ));
            
            


    }

    // Admin View Testomonials
    public function viewComplaints()
    {
        $complaints = Testomonial::where('complaint','!=','')->get();
        return view('backend.testomonials.complaints',compact('complaints'));
    }

    // Complaint Actions

    public function complaintAction(Testomonial $testomonial,$action)
    {
        if($action == 'delete'){
            $testomonial->delete();
            return redirect()->back()->with($notification = array(
                'message' => 'Complaint Deleted Successfully',
                'alert-type' => 'success'
            ));
        }
        if($action == 'resolve'){
            $testomonial->status = 'resolved';
            $testomonial->save();
            return redirect()->back()->with($notification = array(
                'message' => 'Complaint Resolved Successfully',
                'alert-type' => 'success'
            ));
        }
        if($action == 'reject'){
            $testomonial->status = 'rejected';
            $testomonial->save();
            return redirect()->back()->with($notification = array(
                'message' => 'Complaint Rejected Successfully',
                'alert-type' => 'success'
            ));
        }
    

    }

    public function viewSuggestions()
    {
        $suggestions = Testomonial::where('suggestions','!=','')->get();
        return view('backend.testomonials.suggestions',compact('suggestions'));
    }
     
    // suggestion action
    public function suggestionAction(Testomonial $testomonial,$action)
    {
        if($action == 'delete'){
            $testomonial->delete();
            return redirect()->back()->with($notification = array(
                'message' => 'Suggestion Deleted Successfully',
                'alert-type' => 'success'
            ));
        }
        if($action == 'read'){
            $testomonial->status = 'read';
            $testomonial->save();
            return redirect()->back()->with($notification = array(
                'message' => 'Suggestion Resolved Successfully',
                'alert-type' => 'success'
            ));
        }
       
        
    

    }

    // View Complaints on front end
    public function viewComplaintsFront()
    {
        $id = Auth::user()->id;
        $complaints = Testomonial::where('complaint','!=','')->where('user_id',$id)->get();
        return view('frontend.testomonials.view_complaints',compact('complaints'));
    }
     // View Suggestions on front end
     public function viewSuggestionsFront()
     {
         $id = Auth::user()->id;
         $suggestions = Testomonial::where('suggestions','!=','')->where('user_id',$id)->get();
         return view('frontend.testomonials.view_suggestions',compact('suggestions'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
