<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use Illuminate\Support\Facades\Cookie;

class CustomerController extends Controller
{
    //
    function login(Request $request){
        $data = $request->all();
        $login = Customer::where('username',$data['username'])->where('password_user',md5($data['password']))->first();
        if($login){
            Cookie::queue('id',$login->id_user,262800);
            Cookie::queue('fullname',$login->fullname_user,262800);
            // response->withCookie(cookie('fullname', $login->fullname_user));
            return response()->json(['res' => 'success', 'status' => 'Đăng nhập thành công']); 
        }else{
            return response()->json(['res' => 'fail', 'status' => 'Lỗi truy vấn']);
        }
    }

    function register(Request $request){
        $data = $request->all();
        $validation = Validator::make($data,[
            'fullname' => ['required', 'regex: /^[\p{L}a-zA-Z\s]+$/u'],
            'username' => ['required'],
            'email' => ['required'],
            'password' => ['required', 'regex:/^[A-Za-z0-9]{6,32}+$/'],
            'repassword' => ['required', 'same:password']
        ],[
            'fullname.required' => 'Họ và tên bắt buộc phải điền vào',
            'fullname.regex' => 'Họ và tên bắt buộc phải là chữ cái',
            'username.required' => 'Tên đăng nhập bắt buộc phải điền vào',
            'email.required' => 'Email bắt buộc phải điền vào',
            'password.required' => 'Mật khẩu bắt buộc phải điền vào',
            'password.regex' => 'Mật khẩu bắt buộc phải từ 6 đến 32 ký tự',
            'repassword.required' => 'Mật khẩu nhập lại bắt buộc phải điền vào',
            'repassword.same' => 'Hai mật khẩu không giống nhau',
        ]);
        if(!$validation->fails()){
            $user = Customer::where('username',$data['username'])->first();
            if(!$user){
                $data = [
                    'fullname_user' => $data['fullname'],
                    'username' => $data['username'],
                    'email_user' => $data['email'],
                    'password_user' => md5($data['repassword']),
                ];
                $insert = Customer::create($data);
                if($insert){
                    return response()->json(['res' => 'success', 'status' => 'Đăng ký thành công']);
                }else{
                    return response()->json(['res' => 'fail', 'status' => 'Lỗi truy vấn']);
                }
            }else{
                return response()->json(['res' => 'fail', 'status' => 'Tên tài khoản đã tồn tại']);
            }
        }else{
            return response()->json(['res' => 'warning', 'status' => $validation->errors()]);
        }
    }
}
