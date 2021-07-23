<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/nepali.datepicker.v3.5.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <title>collage management system</title>
</head>
<body>
        <nav class="navbar justify-content-end navbar-expand-sm px-5 ">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">NOtification</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="#">Register</a>
                </li>
                @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                                <!-- <li>
                    <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                       user
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Link 1</a>
                        <a class="dropdown-item" href="#">Link 2</a>
                        <a class="dropdown-item" href="#">Link 3</a>
                    </div>
                    </div>
                </li> -->
            </ul>
        </nav>
      <div class="sidenav">
            <img class="logo" src="{{asset('image/AIMS.png')}}" alt="">
            <a class="sidenav-link active" href="/home"> &#xf642; Dashboard</a>
            <a class="sidenav-link" href="/students"> &#xf642; Students</a>
            <a  class="sidenav-link" href="/payment">Payment / billing</a>
            <a  class="sidenav-link" href="/attendance">Attendance</a>
            <a  class="sidenav-link" href="/class_manage">class_manage</a>
            <a  class="sidenav-link" href="/teachers">Teachers</a>
            <a  class="sidenav-link" href="/staff">Staff Members</a>
            <a  class="sidenav-link" href="/libreary details">Libreary Details</a>
            <a  class="sidenav-link" href="/event">Event / task</a>
            <a  class="sidenav-link" href="/admis_setting" >Administration Setting</a>
     </div>
    
    <div class="content-body">
        @yield('content')
    </div>
  

<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/custom.js')}}"></script>
<script src="{{asset('/js/nepali.datepicker.v3.5.min.js')}}"></script>
<script src="{{asset('/js/printThis.js')}}"></script>

</body>
</html>