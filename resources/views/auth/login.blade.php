<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap');
    </style>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
</head>
<body>
    <div class="box">
        <a class="link" id="link-register" href="{{route('usr_register')}}">Register</a>
        <header class="header" id="header-login">Log in</header>
        @if(\Session::has("error"))
            <h3 class="server-message" id="error">{{\Session::get('error')}}</h3>
        @endif
        @if(\Session::has("success"))
            <h3 class="server-message" id="success">{{\Session::get('success')}}</h3>
        @endif

        <form action="{{route('usr_login')}}" id="register-form" method="post">
            @csrf
            <div class="grid-container">
                <div class="flex-container">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                
                <div class="flex-container">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>