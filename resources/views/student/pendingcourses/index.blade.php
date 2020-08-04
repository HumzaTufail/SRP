@extends('layouts.frontend')
@section('content')


    <div class="panel panel-default">
        <br>
        <div class="panel-heading">
            Pending Courses
        </div>
        <br>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>Sr#</th>
                <th>Courses LIST</th>
                <th>ADD TO</th>
                <th>ADD TO</th>
                <th>DELETE</th>
                </thead>

                <tbody>

                <?php $a = 0;?>

                @if($courses->count()>0)

                    @foreach($courses as $course)

                        <tr>
                            <td>
                                <?php   $a++;
                                echo $a
                                ?>
                            </td>
                            <td>{{$course->title}}</td>
                            <td><a href="{{route('addto.registered2',['id'=>$course->id])}}" class="btn btn-xs btn-info">
                                    Registered
                                </a></td>
                            <td><a href="{{route('addto.passed2',['id'=>$course->id])}}" class="btn btn-xs btn-info">
                                    Passed
                                </a></td>
                            <td><a href="{{route('pending.delete',['id'=>$course->id])}}" class="btn btn-xs btn-danger">
                                    Delete
                                </a></td>
                        </tr></a>
                    @endforeach

                @else
                    <tr>
                        <th colspan="5" class="text-center">No Courses available!</th>
                    </tr>
                @endif

                </tbody>
            </table>
        </div>
    </div>



@stop