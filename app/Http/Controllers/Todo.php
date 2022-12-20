<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo as TodoModel;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;

class Todo extends Controller
{

    /*

    Store a new todo.
    @param Request

    */

    public function create_todo_view(){

        $user =  UserModel::select("name")->where("id",session('user_id'))->get()->first();
        return view("todo/create_todo",["user"=> $user]);
    }

    public function create_todo(Request $request){


        $new_todo = new TodoModel();

        $new_todo->title = $request->title;
        $new_todo->body = $request->description;
        $new_todo->users_id = (int)session("user_id");


        $new_todo->save();

        return redirect()->route("create_todo")->with("success","Todo created successfully.");

    }

    /*

    Retrieves the data from the todo with the current_id
    and then show to the client.
    @param Todo ID

    @return view.
    */
    
    public function update_todo_view($todo_id){


        
        $todo = TodoModel::where("id",$todo_id)->get()->first();

        if($todo == null){
            return redirect()->route("usr_profile")->with("error","Todo doesn't exists.");
        }

        $user =  UserModel::select("name")->where("id",session('user_id'))->get()->first();
        return view("todo/update_todo",["todo" => $todo,"user" => $user]);

    }

    /*

    With the data sent by the user, it will update the todo with the given id.
    @param Todo ID

    @return usr_view.
    */


    public function update_todo(Request $request,$todo_id){

        $todo = TodoModel::where("id",$todo_id)->get()->first();

        $todo->title = $request->title;
        $todo->body = $request->description;
        
        $todo->save();


        return redirect()->route("update_todo",["todo_id" => $todo_id])->with("success","Todo updated successfully.");
    }

    /*

    Delete a todo with the given id.
    @param Todo ID

    @return usr view.
    */

    public function delete_todo($todo_id){

        $todo =  TodoModel::where("id",$todo_id)->get()->first();
        if($todo){
            DB::table("todos")->where("id","=",$todo_id)->delete();

            return redirect()->route("usr_profile")->with("success","Todo deleted successfully.");
        }
        return redirect()->route("usr_profile")->with("error","Todo was already deleted.");
        
    }
    
}
