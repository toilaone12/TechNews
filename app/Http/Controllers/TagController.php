<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    //
    public function list(){
        $title = 'Danh sách từ khóa';
        $tags = Tag::all();
        return view('tag.list',compact('title','tags')); 
    }

    public function insert(){
        $title = 'Thêm từ khóa';
        return view('tag.insert',compact('title')); 
    }

    public function save(Request $request){
        $data = $request->all();
        Validator::make($data,[
            'title' => ['required'],
        ],[
            'title.required' => 'Bắt buộc phải có từ khóa'
        ])->validate();
        $insert = Tag::create([
            'title_tag' => $data['title'],
            'slug_tag' => Str::slug($data['title'],'-')
        ]);
        if($insert){
            return redirect()->route('tags.list')->with('message','<div class="alert alert-success alert-dismissible">Thêm thành công!</div>');
        }else{
            return redirect()->route('tags.list')->with('message','<div class="alert alert-danger alert-dismissible">Lỗi truy vấn!</div>');
        }
    }

    public function edit(Request $request){
        $id = $request->get('id');
        $title = 'Sửa từ khóa';
        $tag = Tag::find($id);
        return view('tag.edit',compact('title','tag')); 
    }

    public function change(Request $request){
        $data = $request->all();
        Validator::make($data,[
            'title' => ['required'],
        ],[
            'title.required' => 'Bắt buộc phải có từ khóa'
        ])->validate();
        $tag = Tag::find($data['id']);
        $tag->title_tag = $data['title'];
        $tag->slug_tag = Str::slug($data['title'],'-');
        $update = $tag->save();
        if($update){
            return redirect()->route('tags.list')->with('message','<div class="alert alert-success alert-dismissible">Sửa thành công!</div>');
        }else{
            return redirect()->route('tags.list')->with('message','<div class="alert alert-danger alert-dismissible">Lỗi truy vấn!</div>');
        }
    }

    public function delete(Request $request){
        $id = $request->get('id');
        $delete = Tag::find($id)->delete();
        if($delete){
            return redirect()->route('tags.list')->with('message','<div class="alert alert-success alert-dismissible">Xóa thành công!</div>');
        }else{
            return redirect()->route('tags.list')->with('message','<div class="alert alert-danger alert-dismissible">Lỗi truy vấn!</div>');
        }
    }

    public function find($slug){
        $tag = Tag::where('slug_tag',$slug)->first();
        $title = $tag->title_tag;
        // DB::enableQueryLog();
        $news = News::where('tag_news','like','%'.$tag->id_tag.'%')->paginate(2);
        // $db = DB::getQueryLog();
        // dd($news);
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
        $arr = collect($arr);
        return view('tag.home',compact('title','news','arr','parents','childs','tag'));
    }
}
