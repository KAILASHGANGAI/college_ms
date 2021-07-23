<!DOCTYPE html>
<html lang="en" style="height: 100%;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>l0gin page</title>
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/nepali.datepicker.v3.5.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
</head>
<style>

*{
    margin:0;
    padding:0;

}
body{
    background:url('/image/log.jpg') no-repeat center center/cover;
    height: 100%;
}
.bg{
background:#ffb021eb;
height: 100%;
width:100%;
box-shadow: 0px 2px 7px 4px white;;
}
.welcome{
    font-size: 27px;
}
.input{
    border: none;
    background: none;
    border-bottom: 1px solid black;
    font-family: cursive;
}
</style>
<body class="container-fluid">
   <div class="row h-100"> 
        <div class="col-sm-4 mx-auto h-100 bg p-0">
            <div class="pt-5 ">
                    <span class="welcome p-3">Wel-Come To </span> <br>
                    <span class="p-3" style="font-size:20px;">The College management System</span>
                    <img class="logo mt-3" width="100%" style="height: fit-content;" src="{{asset('image/AIMS.png')}}" alt="">
                <h1 class="text-center text-white pt-3 pb-1">LogIn Page</h1>
            </div>
            <div class="text-center pb-5">
                <!-- <form action="#" method="post">
                @csrf
                    <input type="text" onfocus="myfunction();" class="w-75 p-1 m-2 input" name="username" id="inp" placeholder="Enter username" required> <br>
                    <input type="password" onfocus="myfunction();" class="w-75 p-1 m-2 mb-4 input" name="password" id="inp" placeholder="Enter password" required> <br>
                    <span class="p-3"><input type="checkbox" class="" name="remaimber" id=""> Remaimber me ?</span>
                    <div class="container p-0 w-75  py-4">
                        <a href="#" class="float-left">Forget Password ?</a>
                        <button type="submit" class="px-4 py-1 float-right">LogIn</button>

                    </div>
                </form> -->
                <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">

                            
                                <input id="email" type="email" class=" input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter E-mail" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        <div class="form-group ">
                        
                                <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" placeholder="paassword" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 mx-auto offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                               

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                                <button type="submit" class="px-4 py-1">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
   </div>
   <script>
   function myfunction(){
       document.getElementById("inp").style="border:none";
       document.getElementById("inp").style="border-buttom:1px solid red";
   }
   </script>
</body>
</html>s