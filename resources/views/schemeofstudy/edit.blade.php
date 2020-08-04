@extends('layouts.frontend')
@section('content')


    <div class="panel panel-default">
        <div class="panel-heading">
            <br>
            Edit_Scheme Of Study:{{$scheme->name}}
        </div>

<br>
        <div class="panel-body">
            <form action="{{route('scheme.update',['id'=>$scheme->id])}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" name="name" value="{{$scheme->name}}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">
                            Update scheme
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>



@stop