<?php

namespace App\Http\Controllers;

use App\PassedCourse;
use App\PendingCourse;
use App\RegisteredCourse;
use Illuminate\Http\Request;
use Auth;
use App\CoursesList;
use Session;

class PendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_id = Auth::user()->id;  //Get the ID of LOGGED IN
        $courses = PendingCourse::where('user_id', $user_id)->get();
        return view('student.pendingcourses.index')->with('courses',$courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addFromPassed($id)
    {
        $user_id = Auth::user()->id;  //Get the ID of LOGGED IN
        $course1 = PassedCourse::where('id',$id)->first();


        $pending  = new PendingCourse;
        $pending->title=$course1->title;
        $pending->code=$course1->code;
        $pending->credit_hour=$course1->credit_hour;
        $pending->user_id=$user_id;
        $pending->save();

        $course=PassedCourse::find($id);
        $course->delete();  /// deleet the course from the PassedCourse

        return redirect()->back();
    }
    public function addFromRegistered($id)
    {
        $user_id = Auth::user()->id;  //Get the ID of LOGGED IN
        $course1 = RegisteredCourse::where('id',$id)->first();


        $pending  = new PendingCourse;
        $pending->title=$course1->title;
        $pending->code=$course1->code;
        $pending->credit_hour=$course1->credit_hour;
        $pending->user_id=$user_id;
        $pending->save();

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


        $pending  = new PendingCourse;
        $pending->title=$course1->title;
        $pending->code=$course1->code;
        $pending->credit_hour=$course1->credit_hour;
        $pending->user_id=$user_id;
        $pending->save();

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
        $course=PendingCourse::find($id);
        $course->delete();

        return redirect()->back();
    }
}
