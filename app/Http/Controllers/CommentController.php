<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;
use App\Models\Customer;
use App\Models\News;
use App\Models\User;

class CommentController extends Controller
{
    function list(){
        $title = 'Danh sách bình luận';
        $users = User::all();
        $news = News::all();
        $comments = Comment::paginate(10);
        return view('comment.list',compact('title','users','news','comments'));
    }   

    function reply(Request $request){
        $data = $request->all();
        // dd($data);
        $isPage = isset($data['is_page']) ? 1 : 0;
        Validator::make($data,[
            'reply' => ['required'],
        ],[
            'reply.required' => 'Bắt buộc phải nhập dữ liệu'
        ])->validate();
        $reply = [
            'id_news' => $data['id_news'],
            'id_user' => isset($data['id_user']) ? $data['id_user'] : 0,
            'comment' => $data['reply'],
            'id_reply' => $data['id']
        ];
        $insert = Comment::create($reply);
        if($isPage){
            $new = News::find($data['id_news']);
            $slug = $new->slug_news;
            if($insert){
                return redirect()->route('news.detail',['slug' => $slug]);
            }else{
                return redirect()->route('news.detail',['slug' => $slug]);
            }
        }else{
            if($insert){
                return redirect()->route('comment.list')->with('message','<div class="alert alert-success alert-dismissible">Phản hồi thành công!</div>');
            }else{
                return redirect()->route('comment.list')->with('message','<div class="alert alert-danger alert-dismissible">Lỗi truy vấn!</div>');
            }
        }
    }

    function update(Request $request){
        $data = $request->all();      
        Validator::make($data,[
            'update' => ['required'],
        ],[
            'update.required' => 'Bắt buộc phải nhập dữ liệu'
        ])->validate();
        $comment = Comment::find($data['id']);
        // dd($comment);
        $comment->comment = $data['update'];
        $update = $comment->save();
        if($update){
            return redirect()->route('comment.list')->with('message','<div class="alert alert-success alert-dismissible">Thay đổi thành công!</div>');
        }else{
            return redirect()->route('comment.list')->with('message','<div class="alert alert-danger alert-dismissible">Lỗi truy vấn!</div>');
        }
    }

    //
    function comment(Request $request){
        $data = $request->all();
        $validation = Validator::make($data,[
            'comment' => ['required'],
        ],[
            'comment.required' => 'Bắt buộc phải nhập dữ liệu'
        ]);
        if($validation->fails()){
            return response()->json(['res' => 'warning', 'status' => $validation->errors()]);
        }else{
            $comment = [
                'comment' => $data['comment'],
                'id_user' => $data['idUser'],
                'id_news' => $data['idNews'],
                'id_reply' => 0,
            ];
            $insert = Comment::create($comment);
            if($insert){
                return response()->json(['res' => 'success', 'title' => 'Bình luận bài viết', 'icon' => 'success', 'status' => 'Bình luận thành công!']);
            }else{
                return response()->json(['res' => 'fail', 'title' => 'Bình luận bài viết', 'icon' => 'error', 'status' => 'Lỗi truy vấn!']);
            }
        }
    }

    
}
