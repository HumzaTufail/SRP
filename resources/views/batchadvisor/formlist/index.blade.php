@extends('layouts.frontend')
@section('content')


    <div class="panel panel-default">
        <br>
        <div class="panel-heading">
            FormLists
        </div>
        <br>
        <div class="panel-body">

            <br><br>

            <table class="table table-hover">
                <thead>
                <th>Sr#</th>
                <th>STUDENT ID</th>
                <th>STUDENT NAME</th>
                <th>STUDENT EMAIL</th>
                <th>STUDENT BATCH</th>
                <th>STUDENT FORM</th>
                <th>DELETE</th>


                </thead>



                <tbody>

                <?php $a = 0;?>

                @if($formlists->count()>0)

                    @foreach($formlists as $formlist)

                        <tr>
                            <td>
                                <?php   $a++;   //Username==studentid
                                echo $a
                                ?>
                            </td>
                            <td>{{$formlist->student_username}}</td>
                            <td>{{$formlist->student_name}}</td>
                            <td>{{$formlist->student_email}}</td>
                            <td>{{$formlist->student_batch}}</td>
                            <td><a href="{{route('batchadvisor.form.index',['std_id'=>$formlist->student_id,'id'=>$formlist->id])}}" class="btn btn-xs btn-info">
                                    Show
                                </a></td>
                            <td><a href="{{route('batchadvisor.form.delete',['std_id'=>$formlist->student_id,'id'=>$formlist->id])}}" class="btn btn-xs btn-danger">
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