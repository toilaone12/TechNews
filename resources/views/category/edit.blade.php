@extends('dashboard')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{$title}}</h4>
                    </div>
                    @if(session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('category.change')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$category->id_category}}">
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <input type="text" class="form-control" name="name" value="{{$category->name_category}}" placeholder="Tên danh mục">
                                        @error('name_cate')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Thuộc danh mục</label>
                                        <select name="id_parent" id="" class="form-select">
                                            <option class="text-secondary" value="">---Thuộc danh mục---</option>
                                            <option class="text-secondary" {{$category->id_parent == 0 ? 'selected' : ''}} value="0">Không có</option>
                                            @foreach($parents as $parent)
                                            <option class="text-secondary" {{$category->id_parent == $parent->id_category ? 'selected' : ''}} value="{{$parent->id_category}}">{{$parent->name_category}}</option>
                                            @endforeach
                                        </select>
                                        @error('id_parent')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-left mt-3">Xác nhận</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection