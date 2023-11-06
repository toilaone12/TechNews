<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Console\Requests;
use App\Models\Admin;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

session_start();

class AdminController extends Controller
{
    public function login(){
        $title = 'Đăng nhập';
        return view('admin.login',compact('title'));
    }
    public function index(){
        if(request()->cookie('id')){
            $title = "Trang chủ";
            return view('admin.content',compact('title'));
        }else{
            return redirect()->route('admin.login');
        }
    }
    public function signIn(Request $request){
        $data = $request->all();
        $username = $data['username'];
        $password = md5($data['password']);
        Validator::make($data,[
            'username' => ['required'],
            'password' => ['required','regex: /^[A-Za-z0-9]{6,32}+$/']
        ],[
            'username.required' => 'Bắt buộc phải có tên tài khoản',
            'password.required' => 'Bắt buộc phải có mật khẩu',
            'password.regex' => 'Mật khẩu phải từ 6 đến 32 ký tự',
        ])->validate();

        $signIn = Admin::where('username',$username)->where('password',$password)->first();
        if($signIn){
            Cookie::queue('username',$username);
            Cookie::queue('id',$signIn->id_admin);
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('admin.login')->with('error','Sai tài khoản hoặc mật khẩu');
        }
    }
    public function logout(){
        Cookie::queue(Cookie::forget('username'));
        Cookie::queue(Cookie::forget('id'));;
        return redirect()->route('admin.login');
    }
}
