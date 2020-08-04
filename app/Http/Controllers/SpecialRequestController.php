<?php

namespace App\Http\Controllers;

use App\SpecialRequest;
use App\User;
use Illuminate\Http\Request;
use Auth;


class SpecialRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;  //Get the ID of LOGGED IN
        $batchadvisors = User::where('admin', '3')->get();///gettting batchadvisors Id


        return view('student.specialrequest.index') ->with('batchadvisors',$batchadvisors);



    }
    public function batchindex()
    {
        $user_id = Auth::user()->id;

        $formlists = SpecialRequest::where('batchadvisor_id', $user_id)->get();//Special_request forms
        return view('batchadvisor.specialrequest.index')->with('formlists',$formlists);

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
        $this->validate($request,[
            'request1'=>'required',
            'batchadvisor'=>'required'
        ]);
        $user_id = Auth::user()->id;

        $sr = new SpecialRequest;

        $sr->student_id=$user_id;  //Student_id==User_id

        $sr->batchadvisor_id=$request->batchadvisor;
        $sr->request=$request->request1;

        $sr->save();
        return redirect()->back();
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
        $form=SpecialRequest::find($id);
        $form->delete();
        return redirect()->back();
    }
}
