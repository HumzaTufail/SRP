<?php

namespace App\Http\Controllers;

use App\Course;
use App\course_scheme;
use App\SchemeOfStudy;
use Illuminate\Http\Request;


class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $courses = course_scheme::where('schemeOfStudy_id', $id)->get();
        return view('courses.index')->with('courses',$courses)
                                         ->with('scheme_id',$id);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $scheme_id)
    {
        $course=Course::find($id);
        return view('courses.edit')->with('course',$course)
                                        ->with('scheme_id',$scheme_id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $scheme_id)
    {
        $this->validate($request,[
            'title'=>'required',
            'code'=>'required',
            'credit_hour'=>'required'
        ]);
        $course=Course::find($id);
        $course->title=$request->title;
        $course->code=$request->code;
        $course->credit_hour=$request->credit_hour;
        $course->save();

       // Session::flash('success','Congratulation Category Updated!');

        return redirect()->route('courses',['id'=>$scheme_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = course_scheme::where('course_id', $id)->value('id');
        $cs=course_scheme::find($course);
        $cs->delete();// first deleting foreign key value of course form course_scheme

        $course=Course::find($id);
        $course->delete();//Deleting oroginal course

        //Session::flash('success','Congratulation Post Trashed!');

        return redirect()->back();
    }
}
