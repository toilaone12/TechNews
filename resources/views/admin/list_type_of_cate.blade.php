@extends('admin_layout')
@section('dashboard')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">List Type of Category</h4>
                        <p class="card-category">Here is a subtitle for this type of news</p>
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
                                <th style="text-align: center !important;">ID Category</th>
                                <th style="text-align: center !important;">Name Type Of Category</th>
                                <th style="text-align: center !important;">Create at</th>
                                <th style="text-align: center !important;">Update at</th>
                                <th>Function</th>
                            </thead>
                            <tbody align="center">
                                @foreach($list_type as $key => $type)
                                <tr>
                                    <td>{{$type->id_type}}</td>
                                    <td>
                                        {{$type->name_cate}}
                                    </td>
                                    <td>{{$type->name_type}}</td>
                                    <td>{{$type->created_at}}</td>
                                    <td>{{$type->updated_at}}</td>
                                    <td>
                                        <a href="{{URL::to('/edit-form-type',$type->id_type)}}" class="btn btn-success" style="margin-right: 30px;">Edit</a>
                                        <a href="{{URL::to('/delete-type',$type->id_type)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination" style="justify-content: center;">
                <li class="page-item">
                    <a class="page-link" href="@if($count_pages > 1)
                        {{URL::to('/page-type',$count_pages-1)}}
                    @else
                        {{URL::to('/page-type',1)}}
                    @endif" 
                    aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                    @for($i = 1; $i <= $count_pages; $i++)
                    <li class="page-item"><a class="page-link" href="{{URL::to('/page-type',$i)}}">{{$i}}</a></li>
                    @endfor
                <li class="page-item">
                    <a class="page-link" href="@if($count_pages > 0 && $count_pages < $count_pages)
                            {{URL::to('/page-type',$count_pages+1)}}
                        @else
                            {{URL::to('/page-type',$count_pages)}}
                        @endif" 
                        aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection