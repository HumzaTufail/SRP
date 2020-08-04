@extends('layouts.frontend')
@section('content')


    <div class="panel panel-default">
        <br>
        <div class="panel-heading">
            BATCHADVISORS LIST
        </div>
        <br>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>Sr#</th>
                <th>Name</th>
                <th>BatchadvisorID</th>
                <th>Email</th>
                <th>DELETE</th>
                </thead>

                <tbody>

                <?php $a = 0;?>

                @if($batchadvisors->count()>0)

                    @foreach($batchadvisors as $batchadvisor)

                        <tr>
                            <td>
                                <?php   $a++;
                                echo $a
                                // echo $student->name;
                                ?>
                            </td>
                            <td>{{$batchadvisor->name}}</td>
                            <td>{{$batchadvisor->username}}</td>
                            <td>{{$batchadvisor->email}}</td>

                            <td><a href="{{route('batchadvisor.delete',['id'=>$batchadvisor->id])}}" class="btn btn-xs btn-danger">
                                    Delete
                                </a></td>

                        </tr>
                    @endforeach

                @else
                    <tr>
                        <th colspan="5" class="text-center">No Batchadvisors available!</th>
                    </tr>
                @endif

                </tbody>
            </table>
        </div>
    </div>



@stop
