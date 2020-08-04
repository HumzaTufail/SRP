@extends('layouts.frontend')
@section('content')


    <div class="panel panel-default">
        <br>
        <div class="panel-heading">
            Form
        </div>
        <br>
        <div class="panel-body">

            <div style="padding-right: 5%">
            <a href="{{route('student.form.addregistered')}}" class="btn btn-xs btn-info" style="float: right">
                ADD REGISTERED COURSES
            </a>
            </div>
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
                <th>DELETE</th>


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
                            <td><a href="{{route('student.form.delete',['id'=>$formcourse->id])}}" class="btn btn-xs btn-danger">
                                    Delete
                                </a></td>
                        </tr>

                    @endforeach

                    <form id="form" action="{{route('student.form.send2')}}" method="post">
                        {{csrf_field()}}

                        <td><select name="batchadvisor" id="batchadvisor" class="form-control" onchange="">

                                <option value=''>Batchadvisor</option>
                                @foreach ($batchadvisors as $batchadvisor)
                                    <option value="{{ $batchadvisor->id }}">{{ $batchadvisor->name }}</option>
                                @endforeach
                            </select></td>

                        <td><input type="submit" name="submit" value="Send" class="btn btn-xs btn-success" style="float: right"></td>
                    </form>


                @else
                    <tr>
                        <th colspan="5" class="text-center">No Courses available!</th>
                    </tr>
                @endif

                </tbody>
            </table>
        </div>

       <?php /*<div style="padding-right: 5%">
            <a href="{{route('student.form.send')}}" class="btn btn-xs btn-success" style="float: right">
                Send
            </a>
        </div> */?>
    </div>



@stop