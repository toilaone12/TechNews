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
                        <form action="{{route('news.change')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$new->id_news}}">
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
                                                <img src="{{asset($new->image_news)}}" alt="Your Image" class="img-fluid image-original">
                                                <input type="hidden" value="{{asset($new->image_news)}}" name="image_original">
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
                                            <option value="{{$category->id_category}}" {{$category->id_category == $new->id_category ? 'selected' : ''}}>{{$category->name_category}}</option>
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
                                                        <input type="checkbox" class="check-hot" name="is_hot" {{!$new->is_hot ? 'checked' : ''}} value="{{$new->is_hot ? 1 : 0}}">
                                                        <span class="slider"></span>
                                                    </label>
                                                    <span class="text-secondary text-switch">{{$new->is_hot ? 'Bật' : 'Tắt'}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card">
                                            <span class="text-white px-2 py-2 bg-primary">Từ khóa</span>
                                            <div class="card-body">
                                                <select class="js-example-basic-multiple form-select" name="tag[]" multiple="multiple">
                                                    @foreach($tags as $key => $tag)
                                                    <option value="{{$tag->id_tag}}" {{in_array($tag->id_tag, json_decode($new->tag_news)) ? 'selected' : ''}}>{{$tag->title_tag}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="title">Tiêu đề</label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{$new->title_news}}" placeholder="Nhập tiêu đề">
                                        @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="summary">Phụ đề</label>
                                        <input type="text" name="summary" id="summary" class="form-control" value="{{$new->summary_news}}" placeholder="Nhập phụ đề">
                                        @error('summary')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="content">Nội dung</label>
                                        <textarea name="content" class="form-control" id="ckeditor" cols="30" rows="10">{{$new->content_news}}</textarea>
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