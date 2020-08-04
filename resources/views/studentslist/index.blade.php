@extends('layouts.frontend')
@section('content')


    <div class="panel panel-default">
        <br>
        <div class="panel-heading">
            STUDENTS LIST
        </div>
        <br>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>Sr#</th>
                <th>Name</th>
                <th>UserID</th>
                <th>Email</th>
                <th>Batch</th>
                <th>DELETE</th>
                </thead>

                <tbody>

                <?php $a = 0;?>

                @if($students->count()>0)

                    @foreach($students as $student)

                        <tr>
                            <td>
                                <?php   $a++;
                                echo $a
                               // echo $student->name;
                                ?>
                            </td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->username}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->batch}}</td>

                            <td><a href="{{route('student.delete',['id'=>$student->id])}}" class="btn btn-xs btn-danger">
                                    Delete
                                </a></td>

                        </tr>
                    @endforeach

                @else
                    <tr>
                        <th colspan="5" class="text-center">No Students available!</th>
                    </tr>
                @endif

                </tbody>
            </table>
        </div>
    </div>



@stop
