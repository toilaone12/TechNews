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

}
