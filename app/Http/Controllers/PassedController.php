<?php

namespace App\Http\Controllers;

use App\PassedCourse;
use App\PendingCourse;
use App\RegisteredCourse;
use Illuminate\Http\Request;
use App\CoursesList;
use Auth;
use Mockery\Generator\StringManipulation\Pass\Pass;

class PassedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;  //Get the ID of LOGGED IN
        $courses = PassedCourse::where('user_id', $user_id)->get();
        return view('student.passedcourses.index')->with('courses',$courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function addFromPending($id)
    {
        $user_id = Auth::user()->id;  //Get the ID of LOGGED IN
        $course1 = PendingCourse::where('id',$id)->first();


        $passed  = new PassedCourse;
        $passed->title=$course1->title;
        $passed->code=$course1->code;
        $passed->credit_hour=$course1->credit_hour;
        $passed->user_id=$user_id;
        $passed->save();

        $course=PendingCourse::find($id);
        $course->delete();  /// deleet the course from the PendingCourse

        return redirect()->back();
    }

    public function addFromRegistered($id)
    {
        $user_id = Auth::user()->id;  //Get the ID of LOGGED IN
        $course1 = RegisteredCourse::where('id',$id)->first();


        $passed  = new PassedCourse;
        $passed->title=$course1->title;
        $passed->code=$course1->code;
        $passed->credit_hour=$course1->credit_hour;
        $passed->user_id=$user_id;
        $passed->save();

        $course=RegisteredCourse::find($id);
        $course->delete();  /// deleet the course from the RegisteredCourse

        return redirect()->back();
    }



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
    public function store($id)
    {
        $user_id = Auth::user()->id;  //Get the ID of LOGGED IN
        $course1 = CoursesList::where('id',$id)->first();


        $pass  = new PassedCourse;
        $pass->title=$course1->title;
        $pass->code=$course1->code;
        $pass->credit_hour=$course1->credit_hour;
        $pass->user_id=$user_id;
        $pass->save();

        $course=CoursesList::find($id);
        $course->delete();  /// deleet the course from the courses list

        return redirect()->route('courseslist');
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
        $course=PassedCourse::find($id);
        $course->delete();

        return redirect()->back();
    }
}
