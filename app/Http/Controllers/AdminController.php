<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Console\Requests;
session_start();

class AdminController extends Controller
{
    public function loginAdmin(){
        return view('login_admin');
    }
    public function index(){
        if(Session::get('username')){
            return view('admin.dashboard');
        }else{
            return Redirect::to('/admin');
        }
    }
    public function checkLogin(Request $request){
        $username = $request->username;
        $password = md5($request->password);
        $regex = '/^[A-Z]{1}[a-zA-Z0-9]{6,32}$/';
        if(preg_match($regex,$request->password)){
            $result = DB::table('admin')->where('username',$username)->where('password',$password)->first();
            if($result){
                Session::put('username',$result->username);
                Session::put('username_id',$result->id_admin);
                Session::put('level',$result->level);
                return Redirect::to('/dashboard');
            }else{
                Session::put("message","Password error, please enter username and password again!");
                return Redirect::to('/admin');
            }
        }else{
            Session::put("message","Password is not enough from 6 to 32 words and mustn't start capital letters!");
            return Redirect::to('/admin');
        }
    }
    public function logout(){
        Session::put('username',null);
        Session::put('username_id',null);
        return Redirect::to('/admin');
    }
}
