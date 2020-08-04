@extends('layouts.frontend')
@section('content')


    <div class="panel panel-default">
        <br>
        <div class="panel-heading">
            Add/Drop courses
        </div>
        <br>
        <div class="panel-body">
            <h3>Add Courses</h3>
            <table class="table table-hover">
                <thead>
                <th>Sr#</th>
                <th>PENDING COURSES LIST</th>
                <th>SECTION </th>
                <th>ADD </th>
                </thead>

                <tbody>

                <?php $a = 0;?>

                @if($pendingcoursescodes->count()>0)

                    @foreach($pendingcoursescodes as $pendingcoursescode)
                        <?php
                                //getting the courses of same code and their common title

                        $pendingcourses = App\Timetable_Course::where('code', $pendingcoursescode)->get();//get list of same code so we can find sectionslist
                        $pendingcoursetitle = App\Timetable_Course::where('code', $pendingcoursescode)->value('title');
                        $pendingcoursecredit = App\Timetable_Course::where('code', $pendingcoursescode)->value('credit_hour');
                        ?>

                        <tr>
                            <td>
                                <?php   $a++;
                                echo $a;

                                $batchsections = array();
                                ?>
                            </td>

                            <td>{{$pendingcoursetitle}}</td>


                            @if($pendingcourses->count()>0)

                                @foreach($pendingcourses as $pendingcourse)

                                    <?php
                                    $sectiontitle = App\Timetable_Section::where('id', $pendingcourse->section_id)->value('title');
                                    $batchtitle = App\Timetable_Batch::where('id', $pendingcourse->batch_id)->value('title');
                                    $batchsection=  $batchtitle . " Section " . $sectiontitle;


                                    $batchsections[] = $batchsection; //storing sections data in an array

                                    ?>

                                @endforeach

                            @endif

                            <form id="form" action="{{route('student.form.store',['code'=>$pendingcoursescode,'title'=>$pendingcoursetitle,'credit'=>$pendingcoursecredit,'status'=>"ADD"])}}" method="get">
                                <td><select name="section" id="section" class="form-control" onchange="">

                                        <option value=''>Select</option>
                                        @foreach ($batchsections as $batchsection)
                                            <option value="{{ $batchsection }}">{{ $batchsection }}</option>
                                        @endforeach
                                    </select></td>

                                <td><input type="submit" name="submit" value="ADD" class="btn btn-xs btn-success" ></td>
                            </form>

                        </tr>
                    @endforeach

                @else
                    <tr>
                        <th colspan="5" class="text-center">No Courses available!</th>
                    </tr>
                @endif

                </tbody>
            </table>




            <h3>Drop Courses</h3>
            <table class="table table-hover">
                <thead>
                <th>Sr#</th>
                <th>REGISTERED COURSES LIST</th>
                <th>Drop </th>
                </thead>

                <tbody>

                <?php $a = 0;?>

                @if($registeredcoursescodes->count()>0)

                    @foreach($registeredcoursescodes as $registeredcoursescode)
                        <?php
                        $registeredcourses = App\Timetable_Course::where('code', $registeredcoursescode)->get();
                        $registeredcoursetitle = App\Timetable_Course::where('code', $registeredcoursescode)->value('title');
                        $registeredcoursecredit = App\Timetable_Course::where('code', $registeredcoursescode)->value('credit_hour');
                        ?>

                        <tr>
                            <td>
                                <?php   $a++;
                                echo $a;

                                $batchsections = array();
                                ?>
                            </td>

                            <td>{{$registeredcoursetitle}}</td>


                            @if($registeredcourses->count()>0)

                                @foreach($registeredcourses as $registeredcourse)

                                    <?php
                                    $sectiontitle = App\Timetable_Section::where('id', $registeredcourse->section_id)->value('title');
                                    $batchtitle = App\Timetable_Batch::where('id', $registeredcourse->batch_id)->value('title');
                                    $batchsection=  $batchtitle . " Section " . $sectiontitle;


                                    $batchsections[] = $batchsection; //storing sections data in an array

                                    ?>

                                @endforeach

                            @endif

                            <form id="form" action="{{route('student.form.store',['code'=>$registeredcoursescode,'title'=>$registeredcoursetitle,'credit'=>$registeredcoursecredit,'status'=>"DROP"])}}" method="get">
                                <td><select name="section" id="section" class="form-control" onchange="">

                                        <option value=''>Select</option>
                                        @foreach ($batchsections as $batchsection)
                                            <option value="{{ $batchsection }}">{{ $batchsection }}</option>
                                        @endforeach
                                    </select></td>

                                <td><input type="submit" name="submit" value="DROP" class="btn btn-xs btn-danger" ></td>
                            </form>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th colspan="5" class="text-center">No Courses available!</th>
                    </tr>
                @endif

                </tbody>
            </table>



            <h3>Want to improve any course</h3>
            <table class="table table-hover">
                <thead>
                <th>Sr#</th>
                <th>PASSED COURSES LIST</th>
                <th>SECTION</th>
                <th>ADD</th>
                </thead>

                <tbody>

                <?php $a = 0;?>

                @if($passedcoursescodes->count()>0)

                    @foreach($passedcoursescodes as $passedcoursescode)
                        <?php
                        $passedcourses = App\Timetable_Course::where('code', $passedcoursescode)->get();
                        $passedcoursetitle = App\Timetable_Course::where('code', $passedcoursescode)->value('title');
                        $passedcoursecredit = App\Timetable_Course::where('code', $passedcoursescode)->value('credit_hour');

                        ?>

                        <tr>
                            <td>
                                <?php   $a++;
                                echo $a;

                                $batchsections = array();
                                ?>
                            </td>

                            <td>{{$passedcoursetitle}}</td>


                                @if($passedcourses->count()>0)

                                    @foreach($passedcourses as $passedcourse)

                                    <?php
                                    $sectiontitle = App\Timetable_Section::where('id', $passedcourse->section_id)->value('title');
                                    $batchtitle = App\Timetable_Batch::where('id', $passedcourse->batch_id)->value('title');
                                    $batchsection=  $batchtitle . " Section " . $sectiontitle;


                                    $batchsections[] = $batchsection; //storing sections data in an array

                                    ?>

                                @endforeach

                            @endif


                            <form id="form" action="{{route('student.form.store',['code'=>$passedcoursescode,'title'=>$passedcoursetitle,'credit'=>$passedcoursecredit,'status'=>"ADD"])}}" method="get">
                            <td><select name="section" id="section" class="form-control" onchange="">

                                    <option value=''>Select</option>
                                @foreach ($batchsections as $batchsection)
                                    <option value="{{ $batchsection }}">{{ $batchsection }}</option>
                                @endforeach
                                </select></td>

                                <td><input type="submit" name="submit" value="ADD" class="btn btn-xs btn-success" ></td>
                        </form>
                            <?php
                          //  $echo = $_POST['section'];


                            ?>




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
