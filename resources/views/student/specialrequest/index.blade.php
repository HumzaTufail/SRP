@extends('layouts.frontend')
@section('content')


    <div class="panel panel-default">
        <br>
        <div class="panel-heading">
            SPECIAL REQUEST
        </div>
        <br>


        <div class="panel-body">
            <form action="{{route('student.specialrequest.store')}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Request</label>
                    <textarea name="request1" id="request1" cols="5" rows="5" class="form-control" placeholder="Enter the request you want to make"></textarea>
                </div>

                <td><select name="batchadvisor" id="batchadvisor" class="form-control" onchange="">

                        <option value=''>Choose Batchadvisor</option>
                        @foreach ($batchadvisors as $batchadvisor)
                            <option value="{{ $batchadvisor->id }}">{{ $batchadvisor->name }}</option>
                        @endforeach
                    </select></td>

                <br>
                <td><input type="submit" name="submit" value="Send" class="btn btn-xs btn-success" style="float: right"></td>
            </form>
        </div>
    </div>



@stop
