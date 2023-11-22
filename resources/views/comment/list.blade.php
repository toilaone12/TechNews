@extends('dashboard')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card-header ">
            <h4 class="card-title">{{$title}}</h4>
            @if(session('message'))
            {!! session('message') !!}
            @endif
        </div>
        <table class="table table-striped w-100 mt-3">
            <thead>
                <tr>
                    <th width="100">STT</th>
                    <th>Người bình luận</th>
                    <th width="300">Bài viết</th>
                    <th width="500">Nội dung</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $key => $comment)
                @if($comment->id_reply == 0)
                <tr>
                    <td>{{$key+1}}</td>
                    @foreach($users as $user)
                    @if($user->id_user == $comment->id_user)
                    <td>{{$user->fullname_user}}</td>
                    @endif
                    @endforeach
                    @foreach($news as $new)
                    @if($new->id_news == $comment->id_news)
                    <td class="news-{{$comment->id_comment}}" data-id="{{$new->id_news}}">{{$new->title_news}}</td>
                    @endif
                    @endforeach
                    <td>
                        {{$comment->comment}}
                        @foreach($comments as $reply)
                        @if($reply->id_reply == $comment->id_comment)
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="text-danger me-1">Quản trị viên: </span>
                                <span class="me-4 reply-{{$reply->id_reply}}">
                                    {{$reply->comment}}
                                </span>
                                <a data-toggle="modal" data-target="#update" data-id="{{$reply->id_comment}}" class="btn btn-success update-comment">Sửa bình luận</a>
                            </li>
                        </ul>
                        @endif
                        @endforeach
                    </td>
                    <td>
                        <a data-toggle="modal" data-target="#reply" data-id="{{$comment->id_comment}}" class="btn btn-primary reply-comment">Phản hồi</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!!$comments->links('paginations.page')!!}
<!-- Modal -->
<div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('comment.reply')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="" class="id-comment-reply">
            <input type="hidden" name="id_news" value="" class="id-news-reply">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Phản hồi</h5>
                    <button type="button" class="close btn px-2 py-1 btn-secondary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="reply">Nội dung phản hồi</label>
                        <textarea name="reply" id="reply" class="form-control h-50"></textarea>
                        @error('reply')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('comment.reply')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="" class="id-comment-update">
            <input type="hidden" name="id_news" value="" class="id-news-update">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Sửa phản hồi</h5>
                    <button type="button" class="close btn px-2 py-1 btn-secondary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="reply">Nội dung phản hồi</label>
                        <textarea name="update" id="reply" class="form-control h-50 reply-update"></textarea>
                        @error('update')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection