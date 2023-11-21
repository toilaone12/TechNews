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
                    <th>Từ khóa</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $key => $tag)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$tag->title_tag}}</td>
                    <td>
                        <a href="{{route('tags.edit',['id' => $tag->id_tag])}}" class="btn btn-success" style="margin-right: 30px;">Sửa</a>
                        <a href="{{route('tags.delete',['id' => $tag->id_tag])}}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!!$tags->links('paginations.page')!!}
@endsection