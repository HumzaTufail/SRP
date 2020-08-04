@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                <h1>WELCOME</h1>
            @if(Auth::user()->admin==\phpDocumentor\Reflection\Types\Null_::class)

            <form action="{{route('type.submit')}}" method="post">
                {{csrf_field()}}

                <p>Please select you are user of which type:</p>

                <input type="radio" id="student" name="type" value="student">
                <label for="student">Student</label><br>
                <input type="radio" id="batchadvisor" name="type" value="batchadvisor">
                <label for="batchadvisor">Batchadvisor</label><br>

                <td><input type="submit" name="submit" value="Submit" class="btn btn-xs btn-success" style="float: right"></td>

            </form>
                @endif


        </div>
    </div>
</div>
@endsection
