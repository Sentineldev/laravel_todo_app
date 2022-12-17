<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create todo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap');
    </style>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/todo.css')}}">
</head>
<body>
    <nav class="navbar">
        <ul class="nav-list">
            <li class="nav-item">
                <a class="nav-link" href="{{route('usr_profile')}}">{{$user->name}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">Logout</a>
            </li>
        </ul>
    </nav>

    <div class="box">
        <header class="header" id="header-login">Create Todo</header>
        @if(\Session::has("error"))
            <h3 class="server-message" id="error">{{\Session::get('error')}}</h3>
        @endif
        @if(\Session::has("success"))
            <h3 class="server-message" id="success">{{\Session::get('success')}}</h3>
        @endif

        <form action="{{route('create_todo')}}" id="todo-form" method="post">
            @csrf
            <div class="grid-container">
                <div class="flex-container">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title">
                </div>
            </div>
            <div class="grid-container">
                <div class="flex-container">
                    <label for="description">Description</label>
                    <textarea name="description" id="description"class="description"></textarea>
                </div>
            </div>
            <button type="submit">Create Todo</button>
        </form>
    </div>  

    

</body>
</html>