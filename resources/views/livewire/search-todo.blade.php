<div>
    

<div class="input-box">
        
    <input type="search" wire:model="search" placeholder="Busqueda...">
    <div class="input-icon">
            <img src="{{asset('svg/search-svgrepo-com.svg')}}" width="28" height="28">
    </div>
</div>

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

</div>
