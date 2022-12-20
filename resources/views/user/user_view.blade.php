


@extends("user.index")

@section("header")
    <title>Profile - {{$user->name}}</title>
    <link rel="stylesheet" href="{{asset('css/user_profile.css')}}">
    @livewireStyles
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

        @livewire("search-todo")
        
        @livewireScripts

@endsection