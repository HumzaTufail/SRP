@extends('layouts.frontend')
@section('content')


    <div class="panel panel-default">
        <br>
        <div class="panel-heading">
            Courses
        </div>
        <br>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>Sr#</th>
                <th>TITLE</th>
                <th>CODE</th>
                <th>CREDIT_HOUR</th>
                <th>DELETE</th>
                <th>EDIT</th>
                </thead>

                <tbody>

                <?php $a = 0;?>

                @if($courses->count()>0)

                    @foreach($courses as $course)
                        <?php $title = App\Course::where('id', $course->course_id)->value('title');
                        $code = App\Course::where('id', $course->course_id)->value('code');
                        $credit = App\Course::where('id', $course->course_id)->value('credit_hour');
                      ?>

                       <tr>
                                <td>
                                    <?php   $a++;
                                    echo $a;
                                    ?>
                                </td>
                                <td>{{$title}}</td>
                           <td>{{$code}}</td>
                           <td>{{$credit}}</td>
                           <td><a href="{{route('course.delete',['id'=>$course->id])}}" class="btn btn-xs btn-danger">
                                   Delete
                               </a></td>
                           <td><a href="{{route('course.edit',['id'=>$course->id,'scheme_id'=>$scheme_id])}}" class="btn btn-xs btn-info">
                                   Edit
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