<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Ramsey\Uuid\v1;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Console\Requests;
use App\Models\Category;
use App\Models\Customer;
use App\Models\News;
use App\Models\Social;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Rules\Captcha; 
use Validator;
use Illuminate\Support\Facades\Cookie;

session_start();
class HomeController extends Controller
{
    public function login(){
        return view('login');
    }
    public function register(Request $request){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date('Y-m-d H:i:s');
        $sex = array("Nam","Nữ","Khác");
        $first_phone = array("09","03","02","07","08");
        $regex_pass = '/^[A-Z]{1}[a-zA-Z0-9]{6,32}$/';
        $name_random = 'UID'.substr(str_shuffle('ABCDEFGHIJKLMNOPQSRTUVWXYZ0123456789'),0,9);
        $sex_random = $sex[rand(0,count($sex) - 1)];
        $phone_random = $first_phone[rand(0,count($first_phone) - 1)]."".substr(str_shuffle("0123456789"),0,8);
        // $phone_random = "";
        $password = md5($request->password);
        $repassword = md5($request->repassword);
        // echo $phone_random;
        if(preg_match($regex_pass,$request->password) && preg_match($regex_pass,$request->repassword)){
            if($password == $repassword){
                $data = array();
                $data['image_user'] = "http://192.168.55.104/example-app/public/upload_image/user/nguoidung.jfif";
                $data['name_user'] = $name_random;
                $data['sex_user'] = $sex_random;
                $data['phone_user'] = $phone_random;
                $data['email_user'] = $request->email_user;
                $data['address_user'] = "";
                $data['password_user'] = $password;
                $data['created_at'] = $date;
                $data['updated_at'] = $date;
                $register = DB::table('user')->insert($data);
                if($register){
                    Session::put("message","Đăng ký thành công");
                    return Redirect::to('/login');
                }else{
                    Session::put("message","Đăng ký không thành công");
                    return Redirect::to('/login');
                }
            }else{
                Session::put("message","Mật khẩu không trùng khớp");
                return Redirect::to('/login');
            }
        }else{
            Session::put("message","Mật khẩu phải bắt đầu bằng chữ cái in hoa và phải từ 6 đến 32 ký từ");
            return Redirect::to('/login');
        }
        
    }
    public function goToPage(Request $request){
        $regex_pass = '/^[A-Z]{1}[a-zA-Z0-9]{6,32}$/';
        $password = md5($request->password);
        if(preg_match($regex_pass,$request->password)){
            $data = $request->validate([
               'g-recaptcha-response' => new Captcha(), 		//dòng kiểm tra Captcha
            ]);
            $login = DB::table("user")
            ->where('email_user',$request->email)
            ->where('password_user',$password)
            ->first();
            // print_r($login);
            if($login){
                if($request->has('rememberme')){
                    Cookie::queue('remember_email',$request->email,3600);
                    Cookie::queue('remember_password',$request->password,3600);
                    Cookie::queue('remember','',3600);
                    // $username = $login->name_user;
                    // Session::put("email_us",$request->email);
                    // Session::put("username_us",$username);
                    // return Redirect::to('/');   
                    echo Cookie::get('not_remember').'-'.Cookie::get('remember');
                }else if(!$request->has('rememberme')){
                    Cookie::queue('not_remember','aaa',3600);
                    Cookie::forget('remember');
                    Cookie::queue('remember_email','',3600);
                    Cookie::queue('remember_password','',3600);
                    echo Cookie::get('not_remember').'-'.Cookie::get('remember');
                }
                $username = $login->name_user;
                Session::put("email_us",$request->email);
                Session::put("username_us",$username);
                return Redirect::to('/'); 
            }else{
                return Redirect::to('/login');
            }
        }else{
            Session::put("message","Mật khẩu phải bắt đầu bằng chữ cái in hoa và phải từ 6 đến 32 ký từ");
            return Redirect::to('/login');
        }
    }
    public function index(){
        $title = 'Trang chủ';
        $parents = Category::where('id_parent',0)->get();
        $childs = Category::where('id_parent','!=',0)->get();
        $hotNews = News::where('is_hot',1)->orderBy('id_news','desc')->limit(3)->get();
        $news = News::all();
        $newsCreated = News::orderBy('updated_at','desc')->limit(4)->get();
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
        // dd($arr);
        $arrNews = [];
        foreach ($parents as $parent) {
            $arrChild = [];
            $arrIdChild = [];
            // Lấy tin tức từ danh mục cha
            $parentNews = News::where('id_category', $parent->id_category)->get();

            foreach ($childs as $child) {
                if ($child->id_parent == $parent->id_category) {
                    // Lấy tin tức từ danh mục con
                    $arrIdChild[] = $child->id_category;
                    $arrChild[] = [
                        'name' => $child->name_category,
                        'slug' => $child->slug_category,
                    ];
                }
            }
            $arrIdChild[] = $parent->id_category;

            $news = News::whereIn('id_category',$arrIdChild)->get();
            $arrNews[] = [
                'parent' => [
                    'name' => $parent->name_category,
                    'slug' => $parent->slug_category,
                ],
                'arrChild' => $arrChild,
                'list' => $news
            ];
        }
        $arr = collect($arr);
        // $arrNews = collect($arrNews);
        return view('home.content',compact('title','arr','hotNews','parents','childs','news','arrNews','newsCreated'));
    }
    public function checkEmail(){
        return view('pages.send_mail');
    }
    public function sendMail(Request $request){
        $email = $request->email;
        $check_email = DB::table('user')->where('email_user',$email)->get();
        if($check_email->count() > 0){
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                $to_name = $email;
                $to_email = $email;
                $data = array("name"=>"mail từ TechNews","body"=>"yêu cầu nhập mật khẩu mới","email"=>$to_email);
                Mail::send('pages.check_mail',$data,function($message) use ($to_name,$to_email){
                    $message->to($to_email)->subject("Quên mật khẩu TechNews");
                    $message->from($to_email,$to_name);
                });
                return view('pages.email_notification');
            }else{
                Session::put('message_pass','Email không hợp lệ, vui lòng nhập lại!');
                return Redirect::to('/check-email');
            }
        }else{
            Session::put('message_pass','Email không tồn tại, vui lòng nhập lại!');
            return Redirect::to('/check-email');
        }
    }
    public function changePassword($email){
        return view('pages.forgot_password')->with('email',$email);
    }
    public function savePassword(Request $request,$email){
        $regex_pass = '/^[A-Z]{1}[a-zA-Z0-9]{6,32}$/';
        $password = md5($request->password);
        $repassword = md5($request->repassword);
        if(preg_match($regex_pass,$request->password) && preg_match($regex_pass,$request->repassword)){
            if($password == $repassword){
                $data = array();
                $data['password_user'] = $password;
                $change_pass = DB::table("user")
                ->where('email_user',$email)
                ->update($data);
                // print_r($change_pass);
                if($change_pass){
                    return Redirect::to('/login');
                }else{
                    echo "F2";
                }
            }else{
                Session::put("message_change","Mật khẩu không trùng khớp, yêu cầu nhập lại");
                echo "F";
            }
            
        }else{
            Session::put("message_change","Mật khẩu phải bắt đầu bằng chữ cái in hoa và phải từ 6 đến 32 ký từ");
            echo "F1";
        }
    }
    public function email_notification(){
        return view('pages.email_notification');
    }
    public function personalInfo($us_name){
        $check_personal = DB::table('user')->where('name_user',$us_name)->get();
        return view('pages.check_personal')->with('personal',$check_personal);
    }
    public function editUser($id_user){
        $edit_personal = DB::table('user')->where('id',$id_user)->get();
        return view('pages.edit_profile')->with('edit_user',$edit_personal);
    }
    public function saveUser($id_user,Request $request){
        $image = $request->file('image_user');
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("Y-m-d H:i:s");
        $data = array();
        if(isset($image)){
            $get_name_image = $image->getClientOriginalName(); //tên file
            $current_name_image = current(explode('.',$get_name_image));
            $new_image = $current_name_image.'.'.$image->getClientOriginalExtension();// đuôi file
            $link_image = "http://192.168.55.103/example-app/public/upload_image/user/".$new_image;
            $image->move('public/upload_image/user',$new_image);
            $data['image_user'] = $link_image;
            $data['name_user'] = $request->name_user;
            $data['sex_user'] = $request->sex_user;
            $data['phone_user'] = $request->phone_user;
            $data['email_user'] = $request->email_user;
            $data['address_user'] = $request->address_user;
            $data['updated_at'] = $date;
            $edit_user = DB::table('user')->where('id',$id_user)->update($data);
            if($edit_user){
                Session::put("message","Sửa thông tin thành công!");
                Session::put("username_us",$request->name_user);
                Session::put("email_us",$request->email_user);
                return Redirect::to("/personal-infomation/$request->name_user");
            }else{
                Session::put("message","Sửa thông tin thất bại, yêu cầu kiểm tra lại!");
                return Redirect::to("/personal-infomation/$request->name_user");
            }
        }else{
            Session::put("message","Không có hình ảnh, vui lòng thêm hình ảnh!");
            return Redirect::to("/personal-infomation/$request->name_user");
        }
    }
    public function loginFacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    public function callbackFacebook(){
        $sex = array("Nam","Nữ","Khác");
        $first_phone = array("09","03","02","07","08");
        $sex_random = $sex[rand(0,count($sex) - 1)];
        $phone_random = $first_phone[rand(0,count($first_phone) - 1)]."".substr(str_shuffle("0123456789"),0,8);
        $provider = Socialite::driver('facebook')->user();
        $saveUser = Customer::firstOrCreate([
            'facebook_id' => $provider->getId()],
            [   
                'image_user' => $provider->getAvatar(),
                'name_user' => $provider->getName(),
                'sex_user' => $sex_random,
                'phone_user' => $phone_random,
                'email_user' => $provider->getEmail(),
                'address_user' => '',
                'password_user' => ''
            ]);
        Auth::loginUsingId($saveUser->id_user);
        Session::put("email_us",$provider->getEmail());
        Session::put("username_us",$provider->getName());
        return Redirect::to('/');
        dd($provider);     
    }
    public function loginGG(){
        return Socialite::driver('google')->redirect();
    }
    public function callbackGG(){
        $sex = array("Nam","Nữ","Khác");
        $first_phone = array("09","03","02","07","08");
        $sex_random = $sex[rand(0,count($sex) - 1)];
        $phone_random = $first_phone[rand(0,count($first_phone) - 1)]."".substr(str_shuffle("0123456789"),0,8);
        $provider = Socialite::driver('google')->user();
        $saveUser = Customer::firstOrCreate([
            'facebook_id' => $provider->getId()],
            [   
                'image_user' => $provider->getAvatar(),
                'name_user' => $provider->getName(),
                'sex_user' => $sex_random,
                'phone_user' => $phone_random,
                'email_user' => $provider->getEmail(),
                'address_user' => '',
                'password_user' => ''
            ]);
        Auth::loginUsingId($saveUser->id_user);
        Session::put("email_us",$provider->getEmail());
        Session::put("username_us",$provider->getName());
        return Redirect::to('/');
        dd($provider);     
    }
}
