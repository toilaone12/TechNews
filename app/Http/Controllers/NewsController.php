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
use App\Models\Comment;
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
            return redirect()->route('news.insert')->with('message','<div class="alert alert-success alert-dismissible">Thêm thành công!</div>');
        }else{
            return redirect()->route('news.insert')->with('message','<div class="alert alert-danger alert-dismissible">Lỗi truy vấn!</div>');
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
            return redirect()->route('news.list')->with('message','<div class="alert alert-danger alert-dismissible">Lỗi truy vấn!</div>');
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
            $new->slug_news = Str::slug($data['title'],'-');
            $new->summary_news = Str::slug($data['title'],'-');
            $new->content_news = $data['content'];
            $new->is_hot = isset($data['is_hot']) ? $data['is_hot'] : 1;
            $new->tag_news = isset(($data['tag'])) ? json_encode($data['tag']) : $new->tag_news;
            $update = $new->save();
            if($update){
                return redirect()->route('news.list')->with('message','<div class="alert alert-success alert-dismissible">Sửa thành công!</div>');
            }else{
                return redirect()->route('news.list')->with('message','<div class="alert alert-danger alert-dismissible">Lỗi truy vấn!</div>');
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
                return redirect()->route('news.list')->with('message','<div class="alert alert-danger alert-dismissible">Lỗi truy vấn!</div>');
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
    public function detail($slug){
        $new = News::where('slug_news',$slug)->first();
        $new->number_views += 1;
        $new->save();
        $dayCreated = date('l',strtotime($new->updated_at));
        $arrDay = [
            'Monday' => 'Thứ hai',
            'Tuesday' => 'Thứ ba',
            'Wednesday' => 'Thứ tư',
            'Thursday' => 'Thứ năm',
            'Friday' => 'Thứ sáu',
            'Saturday' => 'Thứ bảy',
            'Sunday' => 'Chủ nhật',
        ];
        $dayCreated = $arrDay[$dayCreated];
        $dateCreated = date('j/n/Y, H:i',strtotime($new->created_at));
        $dateCreated = $dayCreated . ', ' . $dateCreated . ' (GMT+7)';
        // dd($dateCreated);
        $childNews = Category::where('id_category',$new->id_category)->first();
        if($childNews->id_parent == 0) $parentNews = Category::where('id_category',$childNews->id_parent)->first();
        $relates = News::where('id_category',$new->id_category)->where('id_news','!=',$new->id_news)->limit(3)->get();
        $mostViewsNews = News::where('id_category','!=',$new->id_category)->where('id_news','!=',$new->id_news)->orderBy('number_views','desc')->limit(3)->get();
        $title = $new->title_news;
        $parents = Category::where('id_parent',0)->get();
        $childs = Category::where('id_parent','!=',0)->get();
        $comments = Comment::where('id_news',$new->id_news)->get();
        $tags = json_decode($new->tag_news);
        $arrTags = [];
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
        if($tags){
            foreach($tags as $tag){
                $one = Tag::find($tag); 
                $arrTags[] = [
                    'name' => $one->title_tag,
                    'slug' => $one->slug_tag
                ];
            }
        }
        $arrTags = collect($arrTags);
        // dd($parentNews);
        return view('news.details',compact('title','arr','new','relates','childNews','parentNews','dateCreated','mostViewsNews','arrTags','comments'));
    }
}

