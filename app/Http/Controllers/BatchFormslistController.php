<?php

namespace App\Http\Controllers;

use App\Batchadvisor_Form;
use App\Batchadvisor_Formslist;
use Illuminate\Http\Request;
use Auth;

class BatchFormslistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
       // $batch_id = Auth::user()->batchadvisor_id;  //GET THE BATCHADVISOR ID////

        $formlists = Batchadvisor_Formslist::where('batchadvisor_id', $user_id)->get();
        return view('batchadvisor.formlist.index')->with('formlists',$formlists);

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
            'batchadvisor'=>'required'
        ]);
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        $user_username = Auth::user()->username;
        $user_batch = Auth::user()->batch;
        $user_email = Auth::user()->email;

        $list = new Batchadvisor_Formslist;

        $list->student_id=$user_id;
        $list->student_name=$user_name;
        $list->student_username=$user_username;
        $list->student_batch=$user_batch;
        $list->student_email=$user_email;
        $list->batchadvisor_id=$request->batchadvisor;


        $list->save();
        return redirect()->route('batchadvisor.form.store');///first delete all the form_list of Form::(Student_form)
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
    public function destroy($std_id, $id )
    {

        $collection = Batchadvisor_Form::where('student_id', $std_id)->where('formlist_id', $id)->get(['id']);
        Batchadvisor_Form::destroy($collection->toArray());

       // $formcourses1 = Batchadvisor_Form::where('student_id', $std_id)->where('formlist_id', $id)->get();
        //return view('batchadvisor.form.index')->with('formcourses',$formcourses1);

       /* foreach($formcourses as $formcourse)
        {
            $formcourse1=Batchadvisor_Form::find($formcourse->id);
            $formcourse1->delete();

            //Deleting all related form courses of the certain student
        }*/


        $formlist=Batchadvisor_Formslist::find($id);
        $formlist->delete();
        return redirect()->back();

    }
}
