@extends('layouts.frontend')
@section('content')


    <div class="panel panel-default">
        <br>
        <div class="panel-heading">
            BatchAdvisor_Student's Form
        </div>
        <br>
        <div class="panel-body">

            <br><br>

            <table class="table table-hover">
                <thead>
                <th>Sr#</th>
                <th>Courses LIST</th>
                <th>CODE</th>
                <th>CREDIT HOURS</th>
                <th>BATCH</th>
                <th>SECTION</th>
                <th>STATUS</th>


                </thead>



                <tbody>

                <?php $a = 0;?>

                @if($formcourses->count()>0)

                    @foreach($formcourses as $formcourse)

                        <tr>
                            <td>
                                <?php   $a++;
                                echo $a
                                ?>
                            </td>
                            <td>{{$formcourse->title}}</td>
                            <td>{{$formcourse->code}}</td>
                            <td>{{$formcourse->credit_hour}}</td>
                            <td>{{$formcourse->batch}}</td>
                            <td>{{$formcourse->section}}</td>
                            <td>{{$formcourse->status}}</td>

                        </tr>

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