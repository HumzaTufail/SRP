<?php

namespace App\Http\Controllers;

use App\Batchadvisor;
use App\Form;
use App\RegisteredCourse;
use App\Timetable_Batch;
use App\Timetable_Day;
use App\User;
use Illuminate\Http\Request;
use Auth;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $user_id = Auth::user()->id;  //Get the ID of LOGGED IN
       // $batchadvisors=Batchadvisor::all();
        $batchadvisors = User::where('admin', '3')->get();

        $formcourses = Form::where('user_id', $user_id)->get();
        return view('student.form.index')->with('batchadvisors',$batchadvisors)
                                                 ->with('formcourses',$formcourses);


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
    public function store(Request $request, $code, $title, $credit, $status)
    {
        $this->validate($request,[
            'section'=>'required'
        ]);

        $batchsection = explode(" ", $request->section);

        $user_id = Auth::user()->id;  //Get the ID of LOGGED IN

       /* $sectionlist = Section::where('section', $batchsection[2])->get();
        $batchid = Timetable_Batch::where('id', $sectionlist->batch_id)->where('title', $batchsection[0])->value('id');
        $sectionid = Section::where('batch_id', $batchid)->value('id');
        $dayslist = Timetable_Day::where('section_id', $sectionid)->get();
       // $batchlist = Timetable_Batch::where('title', $batchsection[0])->get();*/


        $form = new Form;
        $form->title=$title;
        $form->code=$code;
        $form->credit_hour=$credit;
        $form->batch=$batchsection[0];
        $form->section=$batchsection[2];
        $form->status=$status;
        $form->user_id=$user_id;
        $form->save();

        return redirect()->route('student.form.index');//to  redirert std to student_form so he donot enter twice
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
    public function addRegisteredCourses()
    {
        $user_id = Auth::user()->id;  //Get the ID of LOGGED IN
        $regcourses = RegisteredCourse::where('user_id',$user_id)->get();

        foreach($regcourses as $regcourse)
        {
            $form  = new Form;
            $form->title=$regcourse->title;
            $form->code=$regcourse->code;
            $form->credit_hour=$regcourse->credit_hour;
            $form->batch="FA16-BSE";
            $form->section="B";
            $form->status="ADD";
            $form->user_id=$user_id;
            $form->save();

        }
        return redirect()->back();


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
        $formcourse=Form::find($id);
        $formcourse->delete();  /// deleet the form_course from the courses list(Student Form)

        return redirect()->back();
    }
    public function delete()
    {
        $user_id = Auth::user()->id;

        $courses = Form::where('user_id', $user_id)->get();
        foreach($courses as $course)
        {

            $formcourse=Form::find($course->id);
            $formcourse->delete();
        }

        return redirect()->route('student.form.index');

    }
}
