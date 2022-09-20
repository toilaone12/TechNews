@extends('admin_layout')
@section('dashboard')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">List Category</h4>
                        <p class="card-category">Here is a subtitle for this newspaper</p>
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
                                <th style="text-align: center !important;">Name</th>
                                <th style="text-align: center !important;">Create at</th>
                                <th style="text-align: center !important;">Update at</th>
                                <th>Function</th>
                            </thead>
                            <tbody align="center">
                                @foreach($list_cate as $key => $cate)
                                <tr>
                                    <td>{{$cate->id_cate}}</td>
                                    <td>{{$cate->name_cate}}</td>
                                    <td>{{$cate->create_cate}}</td>
                                    <td>{{$cate->updated_at}}</td>
                                    <td>
                                        <a href="{{URL::to('/edit-form-cate',$cate->id_cate)}}" class="btn btn-success" style="margin-right: 30px;">Edit</a>
                                        <a href="{{URL::to('/delete-form-cate',$cate->id_cate)}}" class="btn btn-danger">Delete</a>
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