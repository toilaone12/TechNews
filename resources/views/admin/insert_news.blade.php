@extends('admin_layout')
@section('dashboard')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Insert News</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{URL::to('/save-news')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name Type of Category</label>
                                        <select name="name_type" class="form-control" style="width: 50%;" id="">
                                            @foreach($list_type as $key => $value_type)
                                            <option value="{{$value_type->id_type}}">{{$value_type->name_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="display: block;">Image News</label>
                                        <input type="file" name="image_news" id="" class="">
                                    </div>
                                    <div class="form-group">
                                        <label>Name News</label>
                                        <input type="text" name="name_news" id="" placeholder="Enter name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Summary News</label>
                                        <input type="text" name="summary_news" id="" placeholder="Enter summary" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Content News</label>
                                        <textarea name="content_news" id="" placeholder="Enter content" class="form-control ckeditor"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Level News</label>
                                        <select name="level_news" class="form-control" style="width: 50%;" id="">
                                            <option value="0">Trang phụ</option>
                                            <option value="1">Trang mới nhất</option>
                                            <option value="2">Trang cũ nhất</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="insert_news" class="btn btn-info btn-fill pull-right">Insert News</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection