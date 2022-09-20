<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Ramsey\Uuid\v1;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Console\Requests;
use Illuminate\Support\Facades\Mail;

session_start();

class FeedBackController extends Controller
{
    //
    public function sendFeedBack(Request $request,$username){
        if(isset($username)){
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $time = date('Y-m-d H:i:s');
            $data = array();
            $data['name_user'] = $username;
            $data['feedback'] = $request->feedback;
            $data['created_at'] = $time;
            $data['updated_at'] = $time;
            $send_fb = DB::table('feedback')->insert($data);
            if($send_fb){
                return Redirect('/');
            }
        }
    }
}
