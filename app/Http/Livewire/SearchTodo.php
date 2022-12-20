<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Todo;
use Illuminate\Support\Facades\DB;
class SearchTodo extends Component
{   
    public $search;

    

    public function render()
    {

        $todos = DB::table("todos")->where('title',"LIKE",'%'.$this->search.'%')
        ->where("users_id",session("user_id"))
        ->get();
        return view('livewire.search-todo',["todos" => $todos]);
    }
}
