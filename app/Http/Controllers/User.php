<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as UserModel;
use App\Models\Todo as TodoModel;
use Illuminate\Support\Facades\DB;


class User extends Controller
{

    /*

    Store a new user.
    @param Request
    
    */

    public function store(Request $request){


        if(UserModel::where("email","$request->email")->get()->first()){

            return redirect()->route("usr_register")->with("error","User already exists.");
        }

        $new_user =  new UserModel();



        $new_user->email = $request->email;
        $new_user->password = $request->password;
        $new_user->name = $request->name;

        $new_user->save();

        return redirect()->route("usr_login")->with("success","Successfully Register.");
    }

    /*

    Shows the user index page with all the data.
    @return void

    */

    public function userIndex(){
        
        $user_data =  UserModel::select("name")->where("id",session('user_id'))->get()->first();
        $todos = TodoModel::where("users_id",session("user_id"))->get();

        return view("user/user_view",["user" => $user_data,"todos" => $todos]);
    }

    /*

    Login a user.
    @param Request

    */

    public function logIn(Request $request){
        
        $user =  UserModel::where('email',$request->email)->where("password",$request->password)->get()->first();
        if($user == null){
            return redirect()->route("usr_login")->with("error","Wrong credentials.");
        }
        session(['user_id'=>$user->id]);
        return redirect()->route("usr_profile");
    }
}
