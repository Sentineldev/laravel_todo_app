

@extends("user.index")


@section("header")
    <title>Update todo</title>
    <link rel="stylesheet" href="{{asset('css/todo.css')}}">

@endsection
    
@section("body")

<div class="box">
    <header class="header" id="header-login">Update Todo</header>
    @if(\Session::has("error"))
        <h3 class="server-message" id="error">{{\Session::get('error')}}</h3>
    @endif
    @if(\Session::has("success"))
        <h3 class="server-message" id="success">{{\Session::get('success')}}</h3>
    @endif

    <form action="{{route('update_todo',['todo_id' => $todo->id])}}" method="post" id="todo-form">
        @csrf
        <div class="grid-container">
            <div class="flex-container">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{$todo->title}}">
            </div>
        </div>
        <div class="grid-container">
            <div class="flex-container">
                <label for="description">Description</label>
                <textarea  name="description" class="description">{{$todo->body}}</textarea>
            </div>
        </div>
        <button type="submit">Update Todo</button>
    </form>
</div> 

@endsection

