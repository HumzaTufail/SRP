<?php

namespace App\Http\Controllers;

use App\PassedCourse;
use App\PendingCourse;
use App\RegisteredCourse;
use App\Timetable_Course;
use Illuminate\Http\Request;
use Auth;

class AddDropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;  //Get the ID of LOGGED IN
                 ////pluck==Retrieving A Single Column From A list of rows
        $passedcoursescodes = PassedCourse::where('user_id', $user_id)->pluck('code');

        $registeredcoursescodes = RegisteredCourse::where('user_id', $user_id)->pluck('code');

        $pendingcoursescodes = PendingCourse::where('user_id', $user_id)->pluck('code');

        return view('student.dropaddcourses.index')->with('passedcoursescodes',$passedcoursescodes)
                                                        ->with('registeredcoursescodes',$registeredcoursescodes)
                                                        ->with('pendingcoursescodes',$pendingcoursescodes);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $code, $title, $credit)
    {
        $this->validate($request,[
            'section'=>'required'
    ]);
        echo $title;
        echo $code;
        echo $credit;
        echo $request->section;
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
