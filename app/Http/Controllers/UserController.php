<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::where('admin', '2')->get();

        return view('studentslist.index')->with('students',$students);

        // return view('studentslist.index')->with('students',\App\SchemeOfStudy::all());
    }
    public function batchadvisorindex()
    {
        $batchadvisors = User::where('admin', '3')->get();

        return view('batchadvisorslist.index2')->with('batchadvisors',$batchadvisors);

        // return view('studentslist.index')->with('students',\App\SchemeOfStudy::all());
    }
    public function adminprofile()
    {
        $user_id = Auth::user()->id;
        $users = User::where('id', $user_id)->get();

        return view('adminprofile.index')->with('users',$users);

        // return view('studentslist.index')->with('students',\App\SchemeOfStudy::all());
    }
    public function studentprofile()
    {
        $user_id = Auth::user()->id;
        $users = User::where('id', $user_id)->get();

        return view('student.profile.index')->with('users',$users);

        // return view('studentslist.index')->with('students',\App\SchemeOfStudy::all());
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
    public function type(Request $request)
    {
        $this->validate($request,[
            'type'=>'required',
        ]);
        //$user_id = Auth::user()->id;

        $userid = Auth::user()->id;
        $user = User::find($userid);

        if($request->type=='student') {

            $username = Auth::user()->username;

            $explode_id = explode('-', $username);



            // $user = User::where('id', $user_id)->get();
            // $username = $user->username;
            // $list->batchadvisor_id=$request->type;
            // $user = User::find($user_id);

            if ($user) {
                $user->batch = $explode_id[0] . '-' . $explode_id[1];
                $user->admin = '2';        //2==student
                $user->save();
            }

        }
        elseif ($request->type=='batchadvisor'){
            $user->admin = '3';  //3==batchadvisor
        }
        return redirect()->back();
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
        $user=User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
