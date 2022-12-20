<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Http\Controllers\User;
use App\Http\Controllers\Todo;
use App\Models\User as UserModel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/








Route::middleware(['alreadyLoggedIn'])->group(function(){

    Route::view("/register","auth/register")->name("usr_register");
    Route::post("/register",[User::class,'store'])->name("usr_register");


    Route::view("/login","auth/login")->name("usr_login");
    Route::post("/login",[User::class,'logIn'])->name("usr_login");

    Route::view("/","home")->name("home");

});


/*

    here are all the URIS that need the user to be logged in.

*/

Route::middleware(['loginRequired'])->group(function(){


        Route::prefix("user")->group(function(){
            Route::get("/profile",[User::class,"userIndex"])->name("usr_profile");

            Route::get("/create_todo",[Todo::class,'create_todo_view'])->name("create_todo");
            Route::post("/create_todo",[Todo::class,"create_todo"])->name("create_todo");

            Route::get("/update_todo/{todo_id}",[Todo::class,"update_todo_view"])->name("update_todo");
            Route::post("/update_todo/{todo_id}",[Todo::class,"update_todo"])->name("update_todo");

            Route::get("/delete_todo/{todo_id}",[Todo::class,"delete_Todo"])->name("delete_todo");


            Route::get("/logout",function(Request $request){

                //Erase all the data from the current session and sends the user to the login screen.dw
                $request->session()->flush();
                return redirect()->route("usr_login");
            })
            ->name("logout");
        });
        

});









