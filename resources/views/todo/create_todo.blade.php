
@extends("user.index")



@section("header")  
    <title>Create todo</title>
    <link rel="stylesheet" href="{{asset('css/todo.css')}}">
@endsection



@section("body")


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


@endsection
