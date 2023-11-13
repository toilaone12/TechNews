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
                    <th>Tên danh mục</th>
                    <th>Thuộc danh mục</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $key => $cate)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$cate->name_category}}</td>
                    @php
                        $foundParent = false;
                    @endphp
                    @foreach($parents as $key => $parent)
                        @if($parent->id_category == $cate->id_parent)
                            <td>{{$parent->name_category}}</td>
                            @php
                                $foundParent = true;
                                break;
                            @endphp
                        @endif
                    @endforeach
                    @if(!($foundParent))
                        <td>Không có</td>
                    @endif
                    <td>
                        <a href="{{route('category.edit',['id' => $cate->id_category])}}" class="btn btn-success" style="margin-right: 30px;">Sửa</a>
                        <a href="{{route('category.delete',['id' => $cate->id_category])}}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection