<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Ramsey\Uuid\v1;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Console\Requests;
session_start();

class CateController extends Controller
{
    //
    public function listCate(){
        $list_cate = DB::table("category")->get();
        $manager_cate = view('admin.list_cate')->with('list_cate',$list_cate); // tra view dang sql
        return view('admin_layout')->with('admin.list_cate',$manager_cate); 
    }
    public function insertCate(){
        
        return view('admin.insert_cate');
    }
    public function saveCate(Request $request){
        $data = array();
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $time = date('Y-m-d H:i:s');
        $data['name_cate'] = $request->name_cate; // data[]: trong la ten cua cot trong mysql
        $data['create_cate'] = $time;
        $data['created_at'] = $time;
        $data['updated_at'] = $time;
        DB::table('category')->insert($data);
        Session::put("message","Insert name ".$request->name_cate." success");
        return Redirect::to('/list-cate');
    }
    public function formEditCate($id_cate){
        $edit_cate = DB::table("category")->where('id_cate',$id_cate)->get();
        $manager_cate = view('admin.edit_cate')->with('edit_cate',$edit_cate); // tra view dang sql
        return view('admin_layout')->with('admin.edit_cate',$manager_cate); 
    }
    public function editCate($id_cate,Request $request){
        $data = array();
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $time = date('Y-m-d H:i:s');
        $data['name_cate'] = $request->name_cate; // data[]: trong la ten cua cot trong mysql
        $data['updated_at'] = $time;
        DB::table('category')->where('id_cate',$id_cate)->update($data);
        Session::put("message","Update name ".$request->name_cate." success");
        return Redirect::to('/list-cate');
    }
    public function deleteCate($id_cate,Request $request){
        DB::table('category')->where('id_cate',$id_cate)->delete();
        Session::put("message","Delete name ".$request->name_cate." success");
        return Redirect::to('/list-cate');
    }
    //End Admin
    //Start Pages
    public function category_news($id_cate,$pages){
        if($pages == 1){
            $end = 0;
        }else{
            $end = ($pages * 4) - 4;
        }
        $list_slide = DB::table("slide")
        ->where('updated_at',DB::table('slide')->max('updated_at'))->get();
        $list_cate = DB::table("category")->get();
        $list_type = DB::table("type_of_cate")->get();
        $list_cate_by_id = DB::table("category")->where('id_cate',$id_cate)->get();
        $news_cate_by_id = DB::table("category as c")
        ->join('type_of_cate as tc','c.id_cate','=','tc.id_cate')
        ->join('news as n','tc.id_type','=','n.id_type')
        ->where('n.updated_at',DB::table('news as n')->join('type_of_cate as tc','tc.id_type','n.id_type')->where('tc.id_cate',$id_cate)->max('n.updated_at'))
        ->where('c.id_cate',$id_cate)
        ->select('c.id_cate','c.name_cate','tc.id_type','tc.name_type','n.*')
        ->get();
        $popular_news = DB::table("news as n")
        ->join('type_of_cate as tc','tc.id_type','=','n.id_type')
        ->where('tc.id_cate',$id_cate)
        ->orderBy("n.updated_at","desc")->limit(5)->get();
        $most_views = DB::table("news as n")
        ->join('type_of_cate as tc','tc.id_type','=','n.id_type')
        ->where('tc.id_cate',$id_cate)
        ->orderBy("n.views_news","desc")->limit(5)->get();
        $most_comment = DB::table("news as n")
        ->join('type_of_cate as tc','tc.id_type','=','n.id_type')
        ->where('tc.id_cate',$id_cate)
        ->orderBy("n.comment_news","desc")->limit(5)->get();
        $count_pages = DB::table('news as n')
        ->join('type_of_cate as tc','tc.id_type','=','n.id_type')
        ->where('tc.id_cate',$id_cate)
        ->where('n.updated_at','<',DB::table('news as n')->join('type_of_cate as tc','tc.id_type','n.id_type')->where('tc.id_cate',$id_cate)->max('n.updated_at'))
        ->get();
        $select_news_by_id = DB::table('news as n')
        ->join('type_of_cate as tc','tc.id_type','=','n.id_type')
        ->where('tc.id_cate',$id_cate)
        ->where('n.updated_at','<',DB::table('news as n')->join('type_of_cate as tc','tc.id_type','n.id_type')->where('tc.id_cate',$id_cate)->max('n.updated_at'))
        ->take(4)->skip($end)
        ->orderBy('n.updated_at','desc')
        ->get();
        $count = ceil($count_pages->count() / 4);
        // print_r($list_slide);
        return view('pages.category_news')
        ->with("list_cate_by_id",$list_cate_by_id)
        ->with("news_cate_by_id",$news_cate_by_id)
        ->with("popular_news",$popular_news)
        ->with("most_views",$most_views)
        ->with("most_comment",$most_comment)
        ->with("select_news",$select_news_by_id)
        ->with("number",$count)
        ->with("pages",$pages)
        ->with("list_cate",$list_cate)
        ->with("list_slide",$list_slide)
        ->with("list_type",$list_type);
    }
}
