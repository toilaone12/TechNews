<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            'title_tag' => $data['title']
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
}
