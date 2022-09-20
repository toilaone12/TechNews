@extends('admin_layout')
@section('dashboard')
<style>
    .success{
        color: #87cb16;
    }
    .error{
        color: #ff4c30;
    }
    .warn{
        color: #ff9500;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">List News</h4>
                        <p class="card-category">Here is a list news</p>
                    </div>
                    <div class="card-header">
                        <?php
                            use Illuminate\Support\Facades\Session;
                            $message = Session::get("message");
                            if(isset($message)){
                                echo $message;
                                Session::put("message",null);
                            }
                        ?>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead align="center">
                                <th style="text-align: center !important;">ID</th>
                                <th style="text-align: center !important;">ID Type of Category</th>
                                <th style="text-align: center !important;">Image News</th>
                                <th style="text-align: center !important;">Name News</th>
                                <th style="text-align: center !important;">Summary News</th>
                                <th style="text-align: center !important;">Content News</th>
                                <th style="text-align: center !important;">Comment News</th>
                                <th style="text-align: center !important;">Views News</th>
                                <th style="text-align: center !important;">Level News</th>
                                <th style="text-align: center !important;">Create at</th>
                                <th style="text-align: center !important;">Update at</th>
                                <th>Function</th>
                            </thead>
                            <tbody align="center">
                                @foreach($list_news as $key => $news)
                                <tr>
                                    <td>{{$news->id_news}}</td>
                                    <td>{{$news->name_type}}</td>
                                    <td><img width="150" src="{{$news->image_news}}" alt=""></td>
                                    <td>{{$news->name_news}}</td>
                                    <td>{{$news->summary_news}}</td>
                                    <td width="200" style="overflow: hidden; text-overflow:ellipsis; white-space:nowrap; display:block; border:none;">{{$news->content_news}}</td>
                                    <td>{{$news->comment_news}}</td>
                                    <td>{{$news->views_news}}</td>
                                    <td>
                                        <a class="@if($news->level_news == 1)
                                        {{'success'}}
                                        @elseif($news->level_news == 0)
                                        {{'error'}}
                                        @elseif($news->level_news == 2)
                                        {{'warn'}}
                                        @endif" 
                                        href="">
                                            @if($news->level_news == 1)
                                            {{'Trang mới nhất'}}
                                            @elseif($news->level_news == 2)
                                            {{'Trang cũ nhất'}}
                                            @elseif($news->level_news == 0)
                                            {{'Trang phụ'}}
                                            @endif
                                        </a>
                                        
                                    </td>
                                    <td>{{$news->created_at}}</td>
                                    <td>{{$news->updated_at}}</td>
                                    <td>
                                        <a href="{{URL::to('/details-news',$news->id_news)}}" class="btn btn-primary" style="margin-right: 10px;">Details</a>
                                        <a href="{{URL::to('/edit-form-news',$news->id_news)}}" class="btn btn-success" style="margin-right: 10px;">Edit</a>
                                        <a href="{{URL::to('/delete-news',$news->id_news)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection