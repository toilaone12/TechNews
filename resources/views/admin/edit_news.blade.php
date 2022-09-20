@extends('admin_layout')
@section('dashboard')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit News</h4>
                    </div>
                    <div class="card-body">
                        @foreach($list_news as $key => $value_news)
                        <form action="{{URL::to('/edit-news',$value_news->id_news)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name Type of Category</label>
                                        <select name="name_type" id="" class="form-control">
                                            @foreach($list_type as $key => $value_type)
                                            <option @if($value_type->id_type == $value_news->id_type)
                                                        {{'selected'}}
                                                    @endif 
                                                    value="{{$value_type->id_type}}">
                                                        {{$value_type->name_type}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        <label style="display: block;">Image News</label>
                                        <input type="file" value="{{$value_news->image_news}}" name="image_news" placeholder="Name Type of Category">
                                    </div>
                                    <div class="form-group" >
                                        <label>Name News</label>
                                        <input type="text" value="{{$value_news->name_news}}" class="form-control" name="name_news" placeholder="Enter name">
                                    </div>
                                    <div class="form-group" >
                                        <label>Summary News</label>
                                        <input type="text" value="{{$value_news->summary_news}}" class="form-control" name="summary_news" placeholder="Enter summary">
                                    </div>
                                    <div class="form-group" >
                                        <label>Content News</label>
                                        <textarea id="ckeditor1" class="form-control" name="content_news" placeholder="Enter content">{{$value_news->content_news}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Level News</label>
                                        <select name="level_news" class="form-control" style="width: 50%;" id="">
                                            <option @if($value_news->level_news == 1)
                                                {{'selected'}}
                                                @endif
                                                    value="1">Trang mới nhất</option>
                                            <option @if($value_news->level_news == 0)
                                                {{'selected'}}
                                                @endif
                                            value="0">Trang phụ</option>
                                            <option @if($value_news->level_news == 2)
                                                {{'selected'}}
                                                @endif
                                            value="0">Trang cũ nhất</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="edit_news" class="btn btn-info btn-fill pull-right">Edit News</button>
                            <div class="clearfix"></div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection