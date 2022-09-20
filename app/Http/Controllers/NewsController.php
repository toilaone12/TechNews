<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\UploadedFile;
use App\Console\Requests;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Arr;

session_start();

class NewsController extends Controller
{
    //
    public function insertFormNews(){
        $list_type_of_cate = DB::table('type_of_cate')->get();
        $manager_type = view('admin.insert_news')->with('list_type',$list_type_of_cate);
        return view('admin_layout')->with('admin.insert_news',$manager_type);
    }
    public function insertNews(Request $request){
        $image = $request->file('image_news');
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("Y-m-d H:i:s");
        $data = array();
        if(($image)){
            $count = $request->level_news;
            $type = $request->name_type;
            $get_name_image = $image->getClientOriginalName();
            $current_name_image = current(explode('.',$get_name_image)); // current: lay thang dau tien cua mang khi dc cat boi explode
            $new_image = $current_name_image.'.'.$image->getClientOriginalExtension(); // duoi file(png,jpg,webp,...)
            $link_image = "http://192.168.55.105/example-app/public/upload_image/news/".$new_image;
            $image->move('public/upload_image/news',$new_image); // di chuyen hinh anh
            $data['image_news'] = $link_image;
            $data['id_type'] = $request->name_type;
            $data['name_news'] = $request->name_news;
            $data['summary_news'] = $request->summary_news;
            $data['content_news'] = $request->content_news;
            $data['comment_news'] = 0;
            $data['views_news'] = 0;
            $data['created_at'] = $date;
            $data['updated_at'] = $date;
            $check_level = DB::table("news")->where('level_news','=',$count)->where('id_type',$type)->get();
            if($count == 1){
                if($check_level->count() == 0){
                    $data['level_news'] = $request->level_news;
                    $insert_news = DB::table('news')->insert($data);
                    if($insert_news){
                        Session::put('message',"Insert name news ".$request->name_news." main page!");
                        return Redirect::to('/list-news');
                    }else{
                        Session::put('message',"Insert name news ".$request->name_news." fail!");
                        return Redirect::to('/list-news');
                    }
                }else{
                    $data['level_news'] = 2;
                    $insert_news = DB::table('news')->insert($data);
                    if($insert_news){
                        Session::put('message',"Insert name news ".$request->name_news." success!");
                        return Redirect::to('/list-news');
                    }else{
                        Session::put('message',"Insert name news ".$request->name_news." fail!");
                        return Redirect::to('/list-news');
                    }
                }
            }else if($count == 0){
                if($check_level->count() < 4){
                    $data['level_news'] = $request->level_news;
                    $insert_news = DB::table('news')->insert($data);
                    if($insert_news){
                        Session::put('message',"Insert name news ".$request->name_news." success!");
                        return Redirect::to('/list-news');
                    }else{
                        Session::put('message',"Insert name news ".$request->name_news." fail!");
                        return Redirect::to('/list-news');
                    }
                }else{
                    $data['level_news'] = 2;
                    $insert_news = DB::table('news')->insert($data);
                    if($insert_news){
                        Session::put('message',"Insert name news ".$request->name_news." success!");
                        return Redirect::to('/list-news');
                    }else{
                        Session::put('message',"Insert name news ".$request->name_news." fail!");
                        return Redirect::to('/list-news');
                    }
                }
            }else{
                $data['level_news'] = 2;
                $insert_news = DB::table('news')->insert($data);
                if($insert_news){
                    Session::put('message',"Insert name news ".$request->name_news." success!");
                    return Redirect::to('/list-news');
                }else{
                    Session::put('message',"Insert name news ".$request->name_news." fail!");
                    return Redirect::to('/list-news');
                }
            }
        }else{
            $link_image = '';
            $insert_news = DB::table('news')->insert($data);
            if($insert_news){
                Session::put('message',"Error");
                return Redirect::to('/list-news');
            }else{
                Session::put('message',"Insert name news ".$request->name_news." fail");
                return Redirect::to('/list-news');
            }
        }      
    }
    public function listNews(){
        $list_news = DB::table('news')->join('type_of_cate','news.id_type','=','type_of_cate.id_type')->
        select('news.*','type_of_cate.name_type')->get();
        $manager_news = view('admin.list_news')->with('list_news',$list_news);
        return view('admin_layout')->with('admin.list_news',$manager_news);
    }
    public function deleteNews($id_news){
        $delete_news = DB::table("news")->where('id_news',$id_news)->delete();
        if($delete_news){
            Session::put('message',"Delete success!");
            return Redirect::to('/list-news');
        }
    }
    public function editFormNews($id_news){
        $list_news_by_id = DB::table("news")->where("id_news",$id_news)->get();
        $list_type = DB::table("type_of_cate")->get();
        return view("admin.edit_news")->with("list_news",$list_news_by_id)->with("list_type",$list_type);
    }
    public function editNews($id_news,Request $request){
        $select_news = DB::table('news')->where('id_news',$id_news)->get();
        $views_news = '';
        $comment_news = '';
        foreach($select_news as $news){
            $view_news = $news->views_news;
            $comment_news = $news->comment_news;
        }
        $image = $request->file('image_news');
        $count = $request->level_news;
        $type = $request->name_type;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("Y-m-d H:i:s");
        $data = array();
        $data['id_type'] = $type;
        $data['name_news'] = $request->name_news;
        $data['summary_news'] = $request->summary_news;
        $data['content_news'] = $request->content_news;
        $data['comment_news'] = $comment_news;
        $data['views_news'] = $view_news;
        $data['updated_at'] = $date;
        $check_level = DB::table("news")->where('level_news','=',$count)->where('id_type',$type)->get();
        if(($image)){
            if($count == 1){
                if($check_level->count() == 0){
                    $data['level_news'] = $request->level_news;
                    $update_news = DB::table('news')->where('id_news',$id_news)->update($data);
                    if($update_news){
                        Session::put('message',"Update name news ".$request->name_news." main page!");
                        return Redirect::to('/list-news');
                    }else{
                        Session::put('message',"Update name news ".$request->name_news." fail!");
                        return Redirect::to('/list-news');
                    }
                }else{
                    $data['level_news'] = 2;
                    $update_news = DB::table('news')->where('id_news',$id_news)->update($data);
                    if($update_news){
                        Session::put('message',"Update name news ".$request->name_news." success!");
                        return Redirect::to('/list-news');
                    }else{
                        Session::put('message',"Update name news ".$request->name_news." fail!");
                        return Redirect::to('/list-news');
                    }
                }
            }else if($count == 0){
                if($check_level->count() < 4){
                    $data['level_news'] = $request->level_news;
                    $update_news = DB::table('news')->where('id_news',$id_news)->update($data);
                    if($update_news){
                        Session::put('message',"Update name news ".$request->name_news." success!");
                        return Redirect::to('/list-news');
                    }else{
                        Session::put('message',"Update name news ".$request->name_news." fail!");
                        return Redirect::to('/list-news');
                    }
                }else{
                    $data['level_news'] = 2;
                    $update_news = DB::table('news')->where('id_news',$id_news)->update($data);
                    if($update_news){
                        Session::put('message',"Update name news ".$request->name_news." success!");
                        return Redirect::to('/list-news');
                    }else{
                        Session::put('message',"Update name news ".$request->name_news." fail!");
                        return Redirect::to('/list-news');
                    }
                }
            }else{
                $data['level_news'] = 2;
                $update_news = DB::table('news')->where('id_news',$id_news)->update($data);
                if($update_news){
                    Session::put('message',"Insert name news ".$request->name_news." success!");
                    return Redirect::to('/list-news');
                }else{
                    Session::put('message',"Insert name news ".$request->name_news." fail!");
                    return Redirect::to('/list-news');
                }
            }
        }else{
            $link_image = '';
            $update_news = DB::table('news')->where('id_news',$id_news)->update($data);
            if($update_news){
                Session::put('message',"Error");
                return Redirect::to('/list-news');
            }else{
                Session::put('message',"Update name news ".$request->name_news." fail!");
                return Redirect::to('/list-news');
            }
        }  
    }
    public function detailNews($id_news){
        $list_news = DB::table("news")->where('id_news',$id_news)->get();
        return view('admin.detail_news')->with('list_news',$list_news);
    }
    //End Admin
    //Start Pages
    public function detail_news($id_news){
        $list_cate = DB::table("category")->get();
        $list_type = DB::table("type_of_cate")->get();
        $select_news_by_id = DB::table("news")->where('id_news',$id_news)->get();
        
        foreach($select_news_by_id as $key => $news){
            $view_news = $news->views_news;
            $id_type = $news->id_type;
        }
        if(isset($id_news)){
            $data = array();
            $data['views_news'] = $view_news + 1;
            $update_views = DB::table('news')->where('id_news',$id_news)->update($data);
        }
        $select_news_related = DB::table("news as n")
        ->join('type_of_cate as tc','n.id_type','tc.id_type')
        ->where('tc.id_type',$id_type)
        ->take(4)
        ->get();
        $select_news_popular = DB::table("news as n")
        ->join('type_of_cate as tc','n.id_type','tc.id_type')
        ->where('tc.id_type',$id_type)
        
        ->orderBy('n.updated_at','desc')
        ->take(5)
        ->get();
        $select_views = DB::table("news as n")
        ->join('type_of_cate as tc','n.id_type','tc.id_type')
        ->where('tc.id_type',$id_type)
        ->orderBy('n.views_news','desc')
        ->take(5)
        ->get();
        $select_most_comment = DB::table("news as n")
        ->join('type_of_cate as tc','n.id_type','tc.id_type')
        ->where('tc.id_type',$id_type)
        ->orderBy('n.comment_news','desc')
        ->take(5)
        ->get();
        $select_comment = DB::table("comment")
        ->where('id_news',$id_news)
        ->get();
        $select_replies = DB::table("replies")
        ->where('id_news',$id_news)
        ->get();
        // print_r($select_news_related);
        return view('pages.detail_news')
        ->with('list_cate',$list_cate)
        ->with('select_news',$select_news_by_id)
        ->with('select_related',$select_news_related)
        ->with('select_popular',$select_news_popular)
        ->with('select_views',$select_views)
        ->with('select_most_comment',$select_most_comment)
        ->with('select_comment',$select_comment)
        ->with('select_replies',$select_replies)
        ->with('list_type',$list_type);
    }
    public function add_comment($id_news,Request $request){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("Y-m-d H:i:s");
        $data = array();
        $data['id_news'] = $id_news;
        $data['name_user'] = $request->name_comment;
        $data['comment'] = $request->content_comment;
        $data['updated_at'] = $date;
        $data['created_at'] = $date;
        $add_comment = DB::table('comment')->insert($data);
        if($add_comment){
            $select_news_by_id = DB::table("news")->where('id_news',$id_news)->get();
            foreach($select_news_by_id as $key => $news){
                $comment_news = $news->comment_news;
            }
            $array = array();
            $array['comment_news'] = $comment_news + 1;
            $update_comment = DB::table('news')->where('id_news',$id_news)->update($array);
            if($update_comment){
                return Redirect::to("/detail-news/$id_news");
            }else{
                echo "F";
            }
        }else{
            echo "F";
        }
    }
    public function searchNews(Request $request){
        $name_search = $request->name_search;
        $search = DB::table('news')->where('name_news','like','%'.$name_search.'%')
        ->skip(0)
        ->take(5)
        ->get();
        $list_cate = DB::table("category")->get();
        $list_type = DB::table("type_of_cate")->get();
        $popular_news = DB::table("news as n")
        ->join('type_of_cate as tc','tc.id_type','=','n.id_type')
        ->orderBy("n.updated_at","desc")->limit(5)->get();
        $most_views = DB::table("news as n")
        ->join('type_of_cate as tc','tc.id_type','=','n.id_type')
        ->orderBy("n.views_news","desc")->limit(5)->get();
        $most_comment = DB::table("news as n")
        ->join('type_of_cate as tc','tc.id_type','=','n.id_type')
        ->orderBy("n.comment_news","desc")->limit(5)->get();
        $count_pages = DB::table('news as n')
        ->join('type_of_cate as tc','tc.id_type','=','n.id_type')
        ->where('name_news','like','%'.$name_search.'%')
        ->get();
        $count = ceil($count_pages->count() / 5);
        
        return view('pages.search_news')
        ->with('list_cate',$list_cate)
        ->with('list_type',$list_type)
        ->with("popular_news",$popular_news)
        ->with("most_views",$most_views)
        ->with("most_comment",$most_comment)
        ->with("count",$count)
        ->with("pages",1)
        ->with("name_search",$name_search)
        ->with('search_news',$search);
    }
    public function searchNewsByNumberPages($name_search,$pages){
        if(isset($pages) && $pages == 1){
            $end = 0;
        }else{
            $end = ($pages * 5) - 5;
        }
        $search = DB::table('news')->where('name_news','like','%'.$name_search.'%')
        ->take(5)
        ->skip($end)
        ->get();
        $list_cate = DB::table("category")->get();
        $list_type = DB::table("type_of_cate")->get();
        $popular_news = DB::table("news as n")
        ->join('type_of_cate as tc','tc.id_type','=','n.id_type')
        ->orderBy("n.updated_at","desc")->limit(5)->get();
        $most_views = DB::table("news as n")
        ->join('type_of_cate as tc','tc.id_type','=','n.id_type')
        ->orderBy("n.views_news","desc")->limit(5)->get();
        $most_comment = DB::table("news as n")
        ->join('type_of_cate as tc','tc.id_type','=','n.id_type')
        ->orderBy("n.comment_news","desc")->limit(5)->get();
        $count_pages = DB::table('news as n')
        ->join('type_of_cate as tc','tc.id_type','=','n.id_type')
        ->where('name_news','like','%'.$name_search.'%')
        ->get();
        $count = ceil($count_pages->count() / 5);
        return view('pages.search_news')
        ->with('list_cate',$list_cate)
        ->with('list_type',$list_type)
        ->with("popular_news",$popular_news)
        ->with("name_search",$name_search)
        ->with("most_views",$most_views)
        ->with("most_comment",$most_comment)
        ->with("count",$count)
        ->with("pages",$pages)
        ->with('search_news',$search);
    }
}

