<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Ramsey\Uuid\v1;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Console\Requests;
use App\Models\Category;
use App\Models\News;
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
            'name_cate' => ['required'], //u: ho tro Unicode \s ho tro dau cach
            'id_parent' => ['required'],
        ],[
            'name_cate.required' => 'Bắt buộc phải có',
            'id_parent.required' => 'Bắt buộc phải có',
        ])->validate();
        $insert = Category::create([
            'name_category' => $data['name_cate'],
            'id_parent' => $data['id_parent'],
            'slug_category' => Str::slug($data['name_cate'],'-'),
        ]);
        if($insert){
            return redirect()->route('category.insert')->with('message','<div class="alert alert-success alert-dismissible">Thêm thành công!</div>');
        }else{
            return redirect()->route('category.insert')->with('message','<div class="alert alert-danger alert-dismissible">Lỗi truy vấn!</div>');
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
    public function category($slug){
        $category = Category::where('slug_category',$slug)->first();
        $childInCategory = Category::where('id_parent',$category->id_parent)->where('id_category','!=',$category->id_category)->limit(3)->get();
        $news =  News::where('id_category',$category->id_category)->orderBy('updated_at','desc')->paginate(2);
        $differentNews = News::where('id_category','!=',$category->id_category)->get();
        $title = $category->name_category;
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
        $arrChildInCategory = [];
        foreach($childInCategory as $child){
            $newChildInCategory = News::where('id_category', $child->id_category)->get();
            $arrChildInCategory[] = [
                'name' => $child->name_category,
                'slug' => $child->slug_category,
                'listNews' => $newChildInCategory,
            ];
        }
        $arrChildInCategory = collect($arrChildInCategory);
        // dd($arrChildInCategory);
        return view('category.home',compact('title','category','arr','parents','childs','news','differentNews','childInCategory','arrChildInCategory'));
    }
}
