<?php

namespace App\Http\Controllers;

use App\Course;
use App\course_scheme;
use App\SchemeOfStudy;
use Illuminate\Http\Request;

class SchemeOfStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('schemeofstudy.index')->with('schemes',\App\SchemeOfStudy::all());
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
    public function edit($id)
    {
        $scheme=SchemeOfStudy::find($id);
        return view('schemeofstudy.edit')->with('scheme',$scheme);
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
        $this->validate($request,[
            'name'=>'required'
        ]);
        $scheme=SchemeOfStudy::find($id);
        $scheme->name=$request->name;
        $scheme->save();

      //  Session::flash('success','Congratulation Category Updated!');

        return redirect()->route('schemes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Contain M-to-M relationship b/w schemeOfStudies to course_scheme to courses///

        $collection = course_scheme::where('schemeOfStudy_id', $id)->get(['id']);
        $collection2 = course_scheme::where('schemeOfStudy_id', $id)->get(['course_id']);
        course_scheme::destroy($collection->toArray());
        Course::destroy($collection2->toArray());//Deleting all related SchemeOfStudy courses of the certain SchemeOfStudy

        $course=SchemeOfStudy::find($id);
        $course->delete();//Deleting SchemeOfStudy

        return redirect()->back();

    }
}
