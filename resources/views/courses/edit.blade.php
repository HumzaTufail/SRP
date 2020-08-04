@extends('layouts.frontend')
@section('content')


    <div class="panel panel-default">
        <div class="panel-heading">
            <br>
            Edit_Course:{{$course->title}}
        </div>

        <br>
        <div class="panel-body">
            <form action="{{route('course.update',['id'=>$course->id,'scheme_id'=>$scheme_id])}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" name="title" value="{{$course->title}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Code</label>
                    <input type="text" name="code" value="{{$course->code}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Credit Hours</label>
                    <input type="text" name="credit_hour" value="{{$course->credit_hour}}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">
                            Update course
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>



@stop