<?php

namespace App\Http\Controllers;

use App\CoursesList;
use Illuminate\Http\Request;
use Auth;
use App\Course;
use App\SchemeOfStudy;
use App\course_scheme;

class CoursesListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $batch = Auth::user()->batch;  //Get the batch of LOGGED IN
      //  $scheme_id = SchemeOfStudy::where('name',$batch)->value('id');///Get the ID of the BATCH
      //  $courses = course_scheme::where('schemeOfStudy_id', $scheme_id)->get();///GEt the COURSES LIST of the BATCH
        $id = Auth::user()->id;
        $courses = CoursesList::where('user_id',$id)->get();


        if(!$courses->count()>0){
            return view('student.scheme.index');
        }
        else{
          //  $list = CoursesList::where('user_id', $id)->get();

            return view('student.scheme.index2')->with('courses',$courses);
        }

        //return view('student.scheme.extra')->with('courses',$courses);
    }


    public function shift()
    {

        $user_id = Auth::user()->id;  //Get the ID of LOGGED IN
        $course_list = CoursesList::where('user_id',$user_id)->get();

        $batch = Auth::user()->batch;  //Get the batch of LOGGED IN
        $scheme_id=0;
         $scheme_id = SchemeOfStudy::where('name',$batch)->value('id');///Get the ID of the BATCH
        ///
        if($scheme_id!=0)/// if scheme of auth user(e.g. fa16-bse) present in db
        {


            $courses = course_scheme::where('schemeOfStudy_id', $scheme_id)->get();///GEt the COURSES LIST of the BATCH


            if ($courses->count() > 0 && !$course_list->count() > 0) {
                foreach ($courses as $course) {
                    $course1 = Course::where('id', $course->course_id)->first();

                    $coursesList = new CoursesList;
                    $coursesList->title = $course1->title;
                    $coursesList->code = $course1->code;
                    $coursesList->credit_hour = $course1->credit_hour;
                    $coursesList->user_id = $user_id;
                    $coursesList->save();

                }//end foreach
            }//end if

            $list = CoursesList::where('user_id', $user_id)->get();

            return view('student.scheme.index2')->with('courses', $list);
        }
        return view('student.scheme.index');/// scheme of auth user n present in db
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
