


@extends("user.index")

@section("header")
    <title>Profile - {{$user->name}}</title>
    <link rel="stylesheet" href="{{asset('css/user_profile.css')}}">

@endsection

@section("body")

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
                    <pre class="body">{{$todo->body}}</pre>
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

@endsection