@extends('layouts.frontend')
@section('content')


    <div class="panel panel-default">
        <br>
        <div class="panel-heading">
            Scheme Of Study
        </div>
        <br>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>Sr#</th>
                <th>Courses LIST</th>
                <th>Already Registered</th>
                <th>Already Passed</th>
                <th>Pending Courses</th>
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
                            <td><a href="{{route('courseslist.registered',['id'=>$course->id])}}" class="btn btn-xs btn-info">
                                    Registered
                                </a></td>
                            <td><a href="{{route('courseslist.passed',['id'=>$course->id])}}" class="btn btn-xs btn-info">
                                    Passed
                                </a></td>
                            <td><a href="{{route('courseslist.pending',['id'=>$course->id])}}" class="btn btn-xs btn-danger">
                                    Pending
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