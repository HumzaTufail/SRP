<?php

namespace App\Http\Controllers;

use App\Batchadvisor_Form;
use App\Batchadvisor_Formslist;
use App\Form;
use Illuminate\Http\Request;
use Auth;

class BatchFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($std_id , $id)
    {
       // $user_id = Auth::user()->id;  //GET THE BATCHADVISOR ID////

        $formcourses = Batchadvisor_Form::where('student_id', $std_id)->where('formlist_id', $id)->get();

        return view('batchadvisor.form.index')->with('formcourses',$formcourses);

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
    public function store()
    {
        $user_id = Auth::user()->id;  //Get the ID of LOGGED IN
        $formcourses = Form::where('user_id',$user_id)->get();
        $formlist_id = Batchadvisor_Formslist::where('student_id', $user_id)->max('id');//StudentID==userID

        foreach($formcourses as $formcourse)
        {
            $form  = new Batchadvisor_Form;

            $form->title=$formcourse->title;
            $form->code=$formcourse->code;
            $form->credit_hour=$formcourse->credit_hour;
            $form->batch=$formcourse->batch;
            $form->section=$formcourse->section;
            $form->status=$formcourse->status;
            $form->student_id=$user_id;
            $form->formlist_id=$formlist_id;

            $form->save();

        }
      //  return redirect()->route('student.form.index');
        return redirect()->route('student.form.destroy');
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
