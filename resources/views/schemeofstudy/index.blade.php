@extends('layouts.frontend')
@section('content')


    <div class="panel panel-default">
        <br>
        <div class="panel-heading">
            Scheme of studies
        </div>
        <br>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>Sr#</th>
                <th>LIST</th>
                <th>Button</th>
                <th>DELETE</th>
                <th>EDIT</th>
                </thead>

                <tbody>

                <?php $a = 0;?>

                @if($schemes->count()>0)

                    @foreach($schemes as $scheme)

                        <tr>
                        <td>
                            <?php   $a++;
                            echo $a
                            ?>
                        </td>
                           <td>{{$scheme->name}}</td>

                            <td><a href="{{route('courses',['id'=>$scheme->id])}}" class="btn btn-xs btn-success">
                                    Courses
                                </a></td>
                            <td><a href="{{route('scheme.delete',['id'=>$scheme->id])}}" class="btn btn-xs btn-danger">
                                    Delete
                                </a></td>
                            <td><a href="{{route('scheme.edit',['id'=>$scheme->id])}}" class="btn btn-xs btn-info">
                                    Edit
                                </a></td>
                            </tr>
                    @endforeach

                @else
                    <tr>
                        <th colspan="5" class="text-center">No Scheme of Studies available!</th>
                    </tr>
                @endif

                </tbody>
            </table>
        </div>
    </div>



@stop