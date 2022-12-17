<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - {{$user->name}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap');
    </style>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/user_profile.css')}}">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
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
        <a id="add-link" href="{{route('create_todo')}}">
            <img id="add-svg" src="{{asset('svg/add-svgrepo-com.svg')}}" width="32" height="32">
            <p class="link-text">Insert Todo</p>
        </a>

        @if(\Session::has("error"))
                <h3 class="server-message" id="error">{{\Session::get('error')}}</h3>
        @endif
        @if(\Session::has("success"))
            <h3 class="server-message" id="success">{{\Session::get('success')}}</h3>
        @endif

        @foreach ($todos as $todo)
        <div class="todos">
            <div class="todo-box">
                <h1 class="title">{{$todo->title}}</h1>
                <em class="body">{{$todo->body}}</em>
                <div class="icons">
                    <a href="{{route('update_todo',['todo_id' => $todo->id])}}">
                        <img  src="{{asset('svg/edit-svgrepo-com.svg')}}" width="24" height="24">
                    </a>
                    <a href="{{route('delete_todo',['todo_id' => $todo->id])}}">
                        <img  src="{{asset('svg/delete-svgrepo-com.svg')}}" width="24" height="24">
                    </a>
                </div>
            </div>
        </div>
            
        @endforeach

</body>
</html>