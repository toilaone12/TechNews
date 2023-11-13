<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Ramsey\Uuid\v1;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Console\Requests;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CateController extends Controller
{
    //
    public function listCate(){
        $list = Category::all();
        $parents = Category::where('id_parent',0)->get();
        $title = 'Danh sách danh mục';
        return view('category.list',compact('list','title','parents')); 
    }
    public function insertCate(){
        // dd(request()->is('admin/category/list') || request()->is('admin/category/insert') ? 'active' : '');
        $parents = Category::where('id_parent',0)->get();
        $title = 'Thêm danh mục';
        return view('category.insert',compact('parents','title')); 
    }
    public function saveCate(Request $request){
        $data = $request->all();
        Validator::make($data,[
            'name_cate' => ['required','regex:/^[a-zA-ZÀ-ỹ\s]+$/u'], //u: ho tro Unicode \s ho tro dau cach
            'id_parent' => ['required'],
        ],[
            'name_cate.required' => 'Bắt buộc phải có',
            'name_cate.regex' => 'Bắt buộc phải là chữ cái',
            'id_parent.required' => 'Bắt buộc phải có',
        ])->validate();
        $insert = Category::create([
            'name_category' => $data['name_cate'],
            'id_parent' => $data['id_parent'],
            'slug_category' => Str::slug($data['name_cate'],'-'),
        ]);
        if($insert){
            return redirect()->route('category.list')->with('message','<div class="alert alert-success alert-dismissible">Thêm thành công!</div>');
        }else{
            return redirect()->route('category.list')->with('message','<div class="alert alert-danger alert-dismissible">Lỗi truy vấn!</div>');
        }
    }
    public function formEditCate(Request $request){
        $id = $request->get('id');
        $title = 'Sửa danh mục';
        $category = Category::find($id);
        $parents = Category::where('id_parent',0)->get();
        return view('category.edit',compact('category','title','parents'));
    }
    public function editCate(Request $request){
        $data = $request->all();
        Validator::make($data,[
            'name' => ['required','regex:/^[a-zA-ZÀ-ỹ\s]+$/u'], //u: ho tro Unicode \s ho tro dau cach
            'id_parent' => ['required'],
        ],[
            'name.required' => 'Bắt buộc phải có',
            'name.regex' => 'Bắt buộc phải là chữ cái',
            'id_parent.required' => 'Bắt buộc phải có',
        ])->validate();
        $category = Category::find($data['id']);
        $category->name_category = $data['name'];
        $category->slug_category = Str::slug($data['name'],'-');
        $category->id_parent = $data['id_parent'];
        $update = $category->save();
        if($update){
            return redirect()->route('category.list')->with('message','<div class="alert alert-success alert-dismissible">Sửa thành công!</div>');
        }else{
            return redirect()->route('category.list')->with('message','<div class="alert alert-danger alert-dismissible">Lỗi truy vấn!</div>');
        }
    }
    public function delete(Request $request){
        $id = $request->get('id');
        $delete = Category::find($id)->delete();
        if($delete){
            return redirect()->route('category.list')->with('message','<div class="alert alert-success alert-dismissible">Xóa thành công!</div>');
        }else{
            return redirect()->route('category.list')->with('message','<div class="alert alert-danger alert-dismissible">Lỗi truy vấn!</div>');
        }
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
