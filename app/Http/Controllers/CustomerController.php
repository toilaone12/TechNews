<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use Illuminate\Support\Facades\Cookie;

class CustomerController extends Controller
{
    //admin
    function list(){
        $title = 'Danh sách khách hàng';
        $customers = Customer::all();
        return view('customer.list',compact('customers','title'));
    }
    //page
    function login(Request $request){
        $data = $request->all();
        $login = Customer::where('username',$data['username'])->where('password_user',md5($data['password']))->first();
        if($login){
            Cookie::queue('id',$login->id_user,262800);
            Cookie::queue('fullname',$login->fullname_user,262800);
            // response->withCookie(cookie('fullname', $login->fullname_user));
            return response()->json(['res' => 'success', 'status' => 'Đăng nhập thành công']); 
        }else{
            return response()->json(['res' => 'fail', 'status' => 'Tên đăng nhập hoặc mật khẩu bị sai hoặc tài khoản không tồn tại']);
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

    function logout(){
        Cookie::queue(Cookie::forget('fullname'));
        Cookie::queue(Cookie::forget('id'));;
        return redirect()->route('page.home');
    }

    public function setting(){
        $title = 'Thông tin cá nhân';
        $customer = Customer::find(request()->cookie('id'));
        $parents = Category::where('id_parent',0)->get();
        $childs = Category::where('id_parent','!=',0)->get();
        $arr = [];
        foreach($parents as $parent){
            $arrChild = [];
            foreach($childs as $child){
                if($child->id_parent == $parent->id_category){
                    // $one = $child->name_category;
                    $arrChild[] = [
                        'slug' => $child->slug_category,
                        'name' => $child->name_category,
                    ];
                }
            }
            $arrParent = [
                'slug' => $parent->slug_category,
                'name' => $parent->name_category,
            ];
            $arr[] = [
                'parent' => $arrParent,
                'child' => $arrChild,
            ];
        }
        return view('customer.setting',compact('title','customer','parents','childs','arr'));
    }

    public function change(Request $request){
        $data = $request->all();
        Validator::make($data,[
            'fullname' => ['regex: /^[\p{L}a-zA-Z\s]+$/u'],
            'password' => ['regex:/^[A-Za-z0-9]{6,32}+$/'],
            'repassword' => ['same:password','regex: /^[A-Za-z0-9]{6,32}+$/']
        ],[
            'fullname.regex' => 'Họ và tên bắt buộc phải là chữ cái',
            'password.regex' => 'Mật khẩu bắt buộc phải từ 6 đến 32 ký tự',
            'repassword.regex' => 'Mật khẩu bắt buộc phải từ 6 đến 32 ký tự',
            'repassword.same' => 'Hai mật khẩu phải giống nhau',
        ])->validate();
        $customer = Customer::find($data['id']);
        $customer->fullname_user = $data['fullname'];
        $customer->username = $data['username'];
        $customer->email_user = $data['email'];
        $customer->password_user = $data['password'] ? md5($data['password']) : $customer->password_user;
        $update = $customer->save();
        if($update){
            return redirect()->route('customer.setting')->with('message','<div class="alert alert-success alert-dismissible">Thay đổi thông tin thành công!</div>');
        }else{
            return redirect()->route('customer.setting')->with('message','<div class="alert alert-danger alert-dismissible">Lỗi truy vấn!</div>');
        }
    }

    public function delete(Request $request){
        $id = $request->get('id');
        $delete = Customer::find($id)->delete();
        if($delete){
            Cookie::queue(Cookie::forget('username'));
            Cookie::queue(Cookie::forget('id'));;
            return redirect()->route('page.home');
        }
    
    }
}
