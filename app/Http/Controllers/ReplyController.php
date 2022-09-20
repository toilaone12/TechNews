<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Console\Requests;
session_start();

class ReplyController extends Controller
{
    //
    public function replies(Request $request,$id_news,$id_comment){
        if(isset($id_news)){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date("Y-m-d H:i:s");
            $data = array();
            $data['id_news'] = $id_news;
            $data['id_comment'] = $id_comment;
            $data['name_user'] = $request->name_reply;
            $data['replies'] = $request->content_reply;
            $data['created_at'] = $date;
            $data['updated_at'] = $date;
            $reply = DB::table('replies')->insert($data);
            if($reply){
                $select_news_by_id = DB::table("news")->where('id_news',$id_news)->get();
                foreach($select_news_by_id as $key => $news){
                    $reply_news = $news->comment_news;
                }
                $array = array();
                $array['comment_news'] = $reply_news + 1;
                $update_comment = DB::table('news')->where('id_news',$id_news)->update($array);
                if($update_comment){
                    $select_replies = DB::table('replies');
                    // return Redirect::to("/detail-news/$id_news");
                }else{
                    echo "F";
                }
            }
        }
    }
}
