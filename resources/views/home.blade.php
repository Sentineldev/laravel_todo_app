<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap');
    </style>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
</head>
<body>

    <div id="box">
        <header id="header">Laravel Todo App</header>
        <ul class="link-list">
            <li class="list-item">
                <a id="register" class="link" href="{{ route('usr_register') }}">Sign in</a>
            </li>
            <li class="list-item">
                <a id="login" class="link" href="{{ route('usr_login') }}">Log in</a>
            </li>
        </ul>
    </div>
</body>
</html>