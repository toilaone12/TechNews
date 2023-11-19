<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;

class CommentController extends Controller
{
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
