<?php

namespace App\Http\Controllers;

use App\SemesterFreeze;
use App\User;
use Illuminate\Http\Request;
use Auth;

class SemesterFreezeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('student.semesterfreeze.index');

        $user_id = Auth::user()->id;  //Get the ID of LOGGED IN
        $batchadvisors = User::where('admin', '3')->get();///gettting batchadvisors Id


        return view('student.semesterfreeze.index') ->with('batchadvisors',$batchadvisors);



    }
    public function batchindex()
    {
        $user_id = Auth::user()->id;

        $formlists = SemesterFreeze::where('batchadvisor_id', $user_id)->get();//semester_freeze forms
        return view('batchadvisor.semesterfreeze.index')->with('formlists',$formlists);

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
            'reason'=>'required',
            'batchadvisor'=>'required'
        ]);
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        $user_username = Auth::user()->username;
        $user_batch = Auth::user()->batch;
        $user_email = Auth::user()->email;

        $sf = new SemesterFreeze;

        $sf->student_id=$user_id;  //Student_id==User_id
        $sf->student_name=$user_name;
        $sf->student_username=$user_username;
        $sf->student_batch=$user_batch;
        $sf->student_email=$user_email;
        $sf->batchadvisor_id=$request->batchadvisor;
        $sf->reason=$request->reason;

        $sf->save();
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
        $form=SemesterFreeze::find($id);
        $form->delete();
        return redirect()->back();
    }
}
