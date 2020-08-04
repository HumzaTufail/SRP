@extends('layouts.frontend')
@section('content')


    <div class="panel panel-default">
        <br>
        <div class="panel-heading">
            SPECIAL REQUESTS LIST
        </div>
        <br>
        <div class="panel-body">

            <br><br>

            <table class="table table-hover">
                <thead>
                <th>Sr#</th>
                <th>STUDENT ID</th>
                <th>STUDENT NAME</th>
                <th>REQUEST</th>
                <th>STUDENT EMAIL</th>
                <th>STUDENT BATCH</th>
                <th>DELETE</th>


                </thead>



                <tbody>

                <?php $a = 0;?>

                @if($formlists->count()>0)

                    @foreach($formlists as $formlist)
                        <?php
                              // $err=$formlist->student_id;
                        $username = \App\User::where('id', $formlist->student_id)->value('username');
                        $name = \App\User::where('id', $formlist->student_id)->value('name');
                        $email = \App\User::where('id', $formlist->student_id)->value('email');
                        $batch = \App\User::where('id', $formlist->student_id)->value('batch');

                        //print_r($std);
                        ?>

                        <tr>
                            <td>
                                <?php   $a++;
                                echo $a
                                ?>
                            </td>
                            <td>{{$username}}</td>
                            <td>{{$name}}</td>
                            <td>{{$formlist->request}}</td>
                            <td>{{$email}}</td>
                            <td>{{$batch}}</td>


                            <td><a href="{{route('batchadvisor.specialrequest.delete',['id'=>$formlist->id])}}" class="btn btn-xs btn-danger">
                                    Delete
                                </a></td>

                        </tr>

                    @endforeach


                @else
                    <tr>
                        <th colspan="5" class="text-center">No LIST available!</th>
                    </tr>
                @endif

                </tbody>
            </table>
        </div>

    </div>

    </div>



@stop
