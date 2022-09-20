<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Ramsey\Uuid\v1;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Console\Requests;

session_start();

class TypeOfCateController extends Controller
{
    public function listTypeOfCate(){
        $list_type = DB::table('type_of_cate')->join('category','type_of_cate.id_cate','=',
        'category.id_cate')->select('type_of_cate.*','category.name_cate')->get();
        $count_type = $list_type->count();
        $count_page = ceil($count_type / 3);
        $manager_type = view('admin.list_type_of_cate')->with('list_type',$list_type)->with('count_pages',$count_page);
        return view('admin_layout')->with('admin.list_type',$manager_type);
    }
    public function insertFormTypeOfCate(){
        $list_cate = DB::table('category')->get();
        $manager_cate = view('admin.insert_type_of_cate')->with('list_cate',$list_cate);
        return view('admin_layout')->with('admin.insert_type_of_cate',$manager_cate);
    }
    public function insertTypeOfCate(Request $request){
        $data = array();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date('Y-m-d H:i:s');
        $data['id_cate'] = $request->name_cate;
        $data['name_type'] = $request->name_type;
        $data['created_at'] = $time;
        $data['updated_at'] = $time;
        $check = DB::table('type_of_cate')->select('name_type')->where('name_type','=',$request->name_type)->get();
        $count = $check->count();
        if($count == 0){
            $result = DB::table('type_of_cate')->insert($data);
            if($result){
                Session::put("message","Insert type ".$request->name_type." success!");
                return Redirect::to('/list-type');
            }
        }else{
            Session::put("message","Type ".$request->name_type." duplicate!");
            return Redirect::to('/list-type');
        }
    }
    public function editFormTypeOfCate($id_type){
        $edit_type = DB::table('type_of_cate')->where('id_type','=',$id_type)->get();
        $cate = DB::table('category')->select('name_cate','id_cate')->get();
        $manager_type = view('admin.edit_type_of_cate')->with('edit_type',$edit_type)->with('edit_cate',$cate);
        return view('admin_layout')->with('admin.edit_type_of_cate',$manager_type);
    }
    public function editTypeOfCate($id_type,Request $request){
        $data = array();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date('Y-m-d H:i:s');
        $data['id_cate'] = $request->name_cate;
        $data['updated_at'] = $time;
        $data['name_type'] = $request->name_type;
        $result = DB::table('type_of_cate')->where('id_type','=',$id_type)->update($data);
        if($result){
            Session::put("message","Update type ".$request->name_type." success!");
            return Redirect::to('/list-type');
        }
    }
    public function deleteTypeOfCate($id_type){
        $result = DB::table('type_of_cate')->where('id_type','=',$id_type)->delete();
        if($result){
            Session::put("message","Delete type success!");
            return Redirect::to('/list-type');
        }
    }
    public function selectPages($page){
        // echo $page.'</br>';
        if($page == 1){
            $start = 0;
        }else{
            $start = ($page * 3) - 3;
        }
        $list_type = DB::table('type_of_cate')->join('category','type_of_cate.id_cate','=',
        'category.id_cate')->select('type_of_cate.*','category.name_cate')->get();
        $count_type = $list_type->count();
        $count_page = ceil($count_type / 3);
        $select_pages = DB::table('type_of_cate')->join('category','type_of_cate.id_cate','=',
        'category.id_cate')->select('type_of_cate.*','category.name_cate')->limit(3)->offset($start)->get();
        $manager_type = view('admin.list_type_of_cate')->with('list_type',$select_pages)->with('count_pages',$count_page)->with('page',$page);
        return view('admin_layout')->with('admin.list_type',$manager_type);
        // print_r($select_pages);
    }
    public function selectType($id_type,$pages){
        if(isset($pages) && $pages == 1){
            $end = 0;
        }else{
            $end = ($pages * 4) - 4;
        }
        $list_slide = DB::table("slide")
        ->where('updated_at',DB::table('slide')->max('updated_at'))->get();
        $list_cate = DB::table("category")->get();
        $list_type = DB::table("type_of_cate")->get();
        $list_type_by_id = DB::table("type_of_cate")->where('id_type',$id_type)->get();
        
        $news_cate_by_id_type = DB::table("category as c")
        ->join('type_of_cate as tc','c.id_cate','=','tc.id_cate')
        ->join('news as n','tc.id_type','=','n.id_type')
        ->where('n.updated_at',DB::table('news as n')->join('type_of_cate as tc','tc.id_type','n.id_type')->where('tc.id_type',$id_type)->max('n.updated_at'))
        ->where('tc.id_type',$id_type)
        ->select('c.id_cate','c.name_cate','tc.id_type','tc.name_type','n.*')
        ->get();
        $popular_news = DB::table("news as n")
        ->join('type_of_cate as tc','tc.id_type','=','n.id_type')
        ->where('tc.id_type',$id_type)
        ->orderBy("n.updated_at","desc")->limit(5)->get();
        $most_views = DB::table("news as n")
        ->join('type_of_cate as tc','tc.id_type','=','n.id_type')
        ->where('tc.id_type',$id_type)
        ->orderBy("n.views_news","desc")->limit(5)->get();
        $most_comment = DB::table("news as n")
        ->join('type_of_cate as tc','tc.id_type','=','n.id_type')
        ->where('tc.id_type',$id_type)
        ->orderBy("n.comment_news","desc")->limit(5)->get();
        $count_pages = DB::table('news as n')
        ->join('type_of_cate as tc','tc.id_type','=','n.id_type')
        ->where('tc.id_type',$id_type)
        ->where('n.updated_at','<',DB::table('news as n')->join('type_of_cate as tc','tc.id_type','n.id_type')->where('tc.id_type',$id_type)->max('n.updated_at'))
        ->get();
        $select_news_by_id = DB::table('news as n')
        ->join('type_of_cate as tc','tc.id_type','=','n.id_type')
        ->where('tc.id_type',$id_type)
        ->where('n.updated_at','<',DB::table('news as n')->join('type_of_cate as tc','tc.id_type','n.id_type')->where('tc.id_type',$id_type)->max('n.updated_at'))
        ->take(4)->skip($end)
        ->orderBy('n.updated_at','desc')
        ->get();
        $count = ceil($count_pages->count() / 4);
        // print_r($news_cate_by_id_type);
        return view('pages.category_type_of_news')
        ->with("list_type_by_id",$list_type_by_id)
        ->with("news_cate_by_id",$news_cate_by_id_type)
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
