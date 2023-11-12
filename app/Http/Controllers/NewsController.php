<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\UploadedFile;
use App\Console\Requests;
use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

session_start();

class NewsController extends Controller
{
    //
    public function insertFormNews(){
        $categorys = Category::all();
        $tags = Tag::all();
        $title = 'Thêm tin tức';
        return view('news.insert',compact('title','categorys','tags')); 
    }
    public function insertNews(Request $request){
        $data = $request->all();
        Validator::make($data,[
            'title' => ['required'],
            'summary' => ['required'],
            'content' => ['required'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif'],
            'id_category' => ['required']
        ],[
            'id_category.required' => 'Bắt buộc phải có danh mục',
            'title.required' => 'Bắt buộc phải có tiêu đề',
            'summary.required' => 'Bắt buộc phải có phụ đề',
            'content.required' => 'Bắt buộc phải có nội dung',
            'image.required' => 'Bắt buộc phải có ảnh',
            'image.image' => 'Bắt buộc phải là ảnh',
            'image.mimes' => 'Bắt buộc phải là định dạng png, jpg, jpeg, gif',
        ])->validate();
        $image = $request->file('image');
        $imageName = pathinfo($image->getClientOriginalName(),PATHINFO_FILENAME);
        $imageFile = pathinfo($image->getClientOriginalName(),PATHINFO_EXTENSION);
        $imageNews = '/storage/news/'.$imageName.'-'.date('His').'.'.$imageFile;
        $image->storeAs('public/news',$imageName.'-'.date('His').'.'.$imageFile);
        // dd(isset($data['is_hot']) ? $data['is_hot'] : 1);
        $data = [
            'id_category' => $data['id_category'],
            'image_news' => $imageNews,
            'title_news' =>  $data['title'],
            'slug_news' => Str::slug($data['title'],'-'),
            'summary_news' => $data['summary'],
            'content_news' => $data['content'],
            'number_comments' => 0,
            'number_views' => 0,
            'is_hot' => isset($data['is_hot']) ? $data['is_hot'] : 1,
            'tag_news' => isset(($data['tag'])) ? json_encode($data['tag']) : ''
        ];
        // dd($data);
        $insert = News::create($data);
        if($insert){
            return redirect()->route('news.list')->with('message','<div class="alert alert-success alert-dismissible">Thêm thành công!</div>');
        }else{
            return redirect()->route('news.list')->with('message','<div class="alert alert-error alert-dismissible">Lỗi truy vấn!</div>');
        }
    }
    public function listNews(){
        $title = 'Danh sách tin tức';
        $list = News::all();
        $categorys = Category::all();
        $tags = Tag::all();
        return view('news.list',compact('title','list','categorys','tags'));
    }
    public function deleteNews(Request $request){
        $id = $request->get('id');
        $delete = News::find($id)->delete();
        if($delete){
            return redirect()->route('news.list')->with('message','<div class="alert alert-success alert-dismissible">Xoá thành công!</div>');
        }else{
            return redirect()->route('news.list')->with('message','<div class="alert alert-error alert-dismissible">Lỗi truy vấn!</div>');
        }
    }
    public function editFormNews(Request $request){
        $id = $request->get('id');
        $title = 'Sửa tin tức';
        $new = News::find($id);
        $tags = Tag::all();
        $categorys = Category::all();
        return view('news.edit',compact('new','title','categorys','tags'));
    }
    public function editNews(Request $request){
        $data = $request->all();
        Validator::make($data,[
            'title' => ['required'],
            'summary' => ['required'],
            'content' => ['required'],
            'image' => ['image','mimes:jpeg,png,jpg,gif'],
            'id_category' => ['required']
        ],[
            'id_category.required' => 'Bắt buộc phải có danh mục',
            'title.required' => 'Bắt buộc phải có tiêu đề',
            'summary.required' => 'Bắt buộc phải có phụ đề',
            'content.required' => 'Bắt buộc phải có nội dung',
            'image.image' => 'Bắt buộc phải là ảnh',
            'image.mimes' => 'Bắt buộc phải là định dạng png, jpg, jpeg, gif',
        ])->validate();
        $image = $request->file('image');
        if($image){
            if (Storage::disk('public')->exists('news/' . str_replace('http://127.0.0.1:8000/storage/news/','',$data['image_original']))) {
                Storage::disk('public')->delete('news/' . str_replace('http://127.0.0.1:8000/storage/news/','',$data['image_original']));
            }
            $imageName = pathinfo($image->getClientOriginalName(),PATHINFO_FILENAME);
            $imageFile = pathinfo($image->getClientOriginalName(),PATHINFO_EXTENSION);
            $imageNews = '/storage/news/'.$imageName.'-'.date('His').'.'.$imageFile;
            $image->storeAs('public/news',$imageName.'-'.date('His').'.'.$imageFile);
            // dd($image);
            $new = News::find($data['id']);
            $new->image_news = $imageNews;
            $new->id_category = $data['id_category'];
            $new->title_news = $data['title'];
            $new->slug_news = $data['slug'];
            $new->summary_news = Str::slug($data['title'],'-');
            $new->content_news = $data['content'];
            $new->is_hot = isset($data['is_hot']) ? $data['is_hot'] : 1;
            $new->tag_news = isset(($data['tag'])) ? json_encode($data['tag']) : $new->tag_news;
            $update = $new->save();
            if($update){
                return redirect()->route('news.list')->with('message','<div class="alert alert-success alert-dismissible">Sửa thành công!</div>');
            }else{
                return redirect()->route('news.list')->with('message','<div class="alert alert-error alert-dismissible">Lỗi truy vấn!</div>');
            }
        }else{
            $new = News::find($data['id']);
            $new->id_category = $data['id_category'];
            $new->title_news = $data['title'];
            $new->slug_news = Str::slug($data['title'],'-');
            $new->summary_news = $data['summary'];
            $new->content_news = $data['content'];
            $new->is_hot = isset($data['is_hot']) ? $data['is_hot'] : 1;
            $new->tag_news = isset(($data['tag'])) ? json_encode($data['tag']) : $new->tag_news;
            $update = $new->save();
            if($update){
                return redirect()->route('news.list')->with('message','<div class="alert alert-success alert-dismissible">Sửa thành công!</div>');
            }else{
                return redirect()->route('news.list')->with('message','<div class="alert alert-error alert-dismissible">Lỗi truy vấn!</div>');
            }
        }
    }
    public function detailNewsAdmin($slug){
        $new = News::where('slug_news',$slug)->first();
        $detail = $new->content_news;
        $title  = $new->title_news;
        return view('news.detail',compact('detail','title'));
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

