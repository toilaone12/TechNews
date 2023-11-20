<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function list(){
        $title = 'Danh sách nhân sự';
        $users = Admin::all();
        return view('user.list',compact('title','users'));
    }

    public function insert(){
        $title = 'Thêm nhân sự';
        return view('user.insert',compact('title'));
    }

    public function save(Request $request){
        $data = $request->all();
        $titleMail = 'Tạo tài khoản thành công';
        Validator::make($data,[
            'fullname' => ['regex: /^[\p{L}a-zA-Z\s]+$/u'],
            'password' => ['regex:/^[A-Za-z0-9]{6,32}+$/'],
        ],[
            'fullname.regex' => 'Họ và tên bắt buộc phải là chữ cái',
            'password.regex' => 'Mật khẩu bắt buộc phải từ 6 đến 32 ký tự',
        ])->validate();
        $email = $data['email'];
        $username = $data['username'];
        $password = $data['password'];
        $fullname = $data['fullname'];
        $level = $data['level'];
        $data = [
            'fullname' => $fullname,
            'username' => $username,
            'password' => md5($password),
            'level' => $level,
            'email' => $data['email']
        ];
        $check = Admin::where('email',$email)->first();
        if(!$check){
            $insert = Admin::create($data);
            if($insert){
                $dataMail = [
                    'username' => $username,
                    'password' => $password,
                ];
                $mail = Mail::send('mail.create',$dataMail,function($message) use ($titleMail,$email){
                    $message->to($email)->subject($titleMail);
                    $message->from($email,$titleMail);
                });
                return redirect()->route('user.list')->with('message','<div class="alert alert-success alert-dismissible">Thêm thành công!</div>');
            }else{
                return redirect()->route('user.list')->with('message','<div class="alert alert-danger alert-dismissible">Lỗi truy vấn!</div>');
            }
        }else{
            return redirect()->route('user.list')->with('message','<div class="alert alert-danger alert-dismissible">Tài khoản đã tồn tại!</div>');
        }
    }
}
