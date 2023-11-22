<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;
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
        Validator::make($data,[
            'reply' => ['required'],
        ],[
            'reply.required' => 'Bắt buộc phải nhập dữ liệu'
        ])->validate();
        $reply = [
            'id_news' => $data['id_news'],
            'id_user' => request()->cookie('id_admin'),
            'comment' => $data['reply'],
            'id_reply' => $data['id']
        ];
        $insert = Comment::create($reply);
        if($insert){
            return redirect()->route('comment.list')->with('message','<div class="alert alert-success alert-dismissible">Phản hồi thành công!</div>');
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
