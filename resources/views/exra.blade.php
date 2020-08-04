<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<div class="w3-sidebar w3-black w3-bar-block" style="width:20%">
    <h3 class="w3-bar-item">MENU</h3><br>


    <a href="{{route('schemes')}}" class="w3-bar-item w3-button">Scheme of studies</a>

    <a href="{{route('courseslist')}}" class="w3-bar-item w3-button">Student's Scheme of studies</a>
    <a href="{{route('student.pendinglist')}}" class="w3-bar-item w3-button">Pending Courses</a>
    <a href="{{route('student.passedlist')}}" class="w3-bar-item w3-button">Passed Courses</a>
    <a href="{{route('student.registeredlist')}}" class="w3-bar-item w3-button">Registered Courses</a>
    <a href="{{route('student.dropaddcourse')}}" class="w3-bar-item w3-button">Add/Drop Courses</a>
    <a href="{{route('student.semesterfreeze')}}" class="w3-bar-item w3-button">Semester Freeze</a>
    <a href="{{route('student.form.index')}}" class="w3-bar-item w3-button">Student's Form</a>
    <a href="{{route('student.specialrequest')}}" class="w3-bar-item w3-button">Make Special Request</a>

    <a href="{{route('batch.formlist')}}" class="w3-bar-item w3-button">BatchAdvisor's FormsList</a>
    <a href="{{route('batch.semesterfreezelist')}}" class="w3-bar-item w3-button">BatchAdvisor's Semester Freeze</a>
    <a href="{{route('batch.specialrequest')}}" class="w3-bar-item w3-button">BatchAdvisor's Special Request</a>


</div>

<style>
    body {
        background-image: url('https://upload.wikimedia.org/wikipedia/commons/c/c0/COMSATS_new_logo.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 70% 80%;
        background-position: center right;
        padding-right: 5px;
    }

</style>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">


<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>

<script>
    @if (Session::has('success'))
    toastr.success("{{Session::get('success')}}")
    @endif
    @if (Session::has('info'))
    toastr.info("{{Session::get('info')}}")
    @endif
</script>
