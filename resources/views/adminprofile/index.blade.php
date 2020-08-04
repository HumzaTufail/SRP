@extends('layouts.frontend')
@section('content')


    <div class="panel panel-default">
        <br>
        <div class="panel-heading">
            PROFILE
        </div>
        <br>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>Sr#</th>
                <th>Name</th>
                <th>BatchadvisorID</th>
                <th>Email</th>

                </thead>

                <tbody>

                <?php $a = 0;?>

                @if($users->count()>0)

                    @foreach($users as $user)

                        <tr>
                            <td>
                                <?php   $a++;
                                echo $a
                                // echo $student->name;
                                ?>
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>


                        </tr>
                    @endforeach

                @else
                    <tr>
                        <th colspan="5" class="text-center">No Profile available!</th>
                    </tr>
                @endif

                </tbody>
            </table>

        </div>






@stop
