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
                    <div class="card-body">
                        <form action="{{route('news.save')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Ảnh danh mục</label>
                                                <div class="">
                                                    <input type="file" id="fileInput" class="input-hidden" name="image">
                                                    <label for="fileInput" class="label border ps-3">
                                                        <span>Chọn ảnh</span>
                                                        <span class="text-capitalize btn btn-secondary rounded-right rounded-0">Tải ảnh</span>
                                                    </label>
                                                </div>
                                                @error('image')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6 ps-5">
                                            <label class="ms-5">Ảnh gốc</label>
                                            <div class="image-container ms-5">
                                                <img src="https://i1-vnexpress.vnecdn.net/2023/11/10/lanbien-3-jpg-1699628126-7996-1699628135.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=ss-Kzl8_0wsDZzMooyAnNg" alt="Your Image" class="img-fluid image-original">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group me-5">
                                        <label for="">Thuộc danh mục</label>
                                        <select name="id_category" id="" class="form-select">
                                            <option value="">---Chuyên mục---</option>
                                            @foreach($categorys as $category)
                                            <option value="{{$category->id_category}}">{{$category->name_category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3 mt-4">
                                    <div class="col-12">
                                        <div class="card">
                                            <span class="text-white px-2 py-2 bg-primary">Tin nóng</span>
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <label class="switch">
                                                        <input type="checkbox" class="check-hot" name="is_hot" value="1">
                                                        <span class="slider"></span>
                                                    </label>
                                                    <span class="text-secondary text-switch">Bật</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card">
                                            <span class="text-white px-2 py-2 bg-primary">Từ khóa</span>
                                            <div class="card-body">
                                                <select class="js-example-basic-multiple form-select" name="tag[]" multiple="multiple">
                                                    @foreach($tags as $tag)
                                                    <option value="{{$tag->id_tag}}">{{$tag->title_tag}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="title">Tiêu đề</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Nhập tiêu đề">
                                        @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="summary">Phụ đề</label>
                                        <input type="text" name="summary" id="summary" class="form-control" placeholder="Nhập phụ đề">
                                        @error('summary')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="content">Nội dung</label>
                                        <textarea name="content" class="form-control" id="ckeditor" cols="30" rows="10"></textarea>
                                        @error('content')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-left mt-3">Xác nhận</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection