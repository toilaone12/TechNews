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
                    <th>Ảnh tin tức</th>
                    <th>Thuộc danh mục</th>
                    <th>Tiêu đề</th>
                    <th>Phụ đề</th>
                    <th>Nội dung</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $key => $new)
                <tr>
                    <td>{{$key+1}}</td>
                    <td><img src="{{asset($new->image_news)}}" width="100" height="100" alt=""></td>
                    @foreach($categorys as $category)
                    @if($category->id_category == $new->id_category)
                    <td width="100">{{$category->name_category}}</td>
                    @endif
                    @endforeach
                    <td width="200">{{$new->title_news}}</td>
                    <td width="200">{{$new->summary_news}}</td>
                    <td class="text-truncate" style="max-width: 300px;">{{$new->content_news}}</td>
                    <td>
                        <a href="{{route('news.detailAdmin',['slug' => $new->slug_news])}}" class="btn btn-primary d-block w-75 mb-2">Xem nội dung</a>
                        <a href="{{route('news.edit',['id' => $new->id_news])}}" class="btn btn-success d-block w-75 mb-2">Sửa</a>
                        <a href="{{route('news.delete',['id' => $new->id_news])}}" class="btn btn-danger d-block w-75">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!!$list->links('paginations.page')!!}
@endsection