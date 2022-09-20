@extends('admin_layout')
@section('dashboard')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">List Slide</h4>
                        <p class="card-category">Here is a adventising news</p>
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
                                <th style="text-align: center !important;">Image Slide</th>
                                <th style="text-align: center !important;">Name Slide</th>
                                <th style="text-align: center !important;">Link Slide</th>
                                <th style="text-align: center !important;">Create at</th>
                                <th style="text-align: center !important;">Update at</th>
                                <th>Function</th>
                            </thead>
                            <tbody align="center">
                                @foreach($list_slide as $key => $slide)
                                <tr>
                                    <td>{{$slide->id_slide}}</td>
                                    <td><img width="150" src="{{$slide->image_slide}}" alt=""></td>
                                    <td>{{$slide->name_slide}}</td>
                                    <td>
                                        <a href="{{$slide->link_slide}}">
                                            {{$slide->link_slide}}
                                        </a>
                                    </td>
                                    <td>{{$slide->created_at}}</td>
                                    <td>{{$slide->updated_at}}</td>
                                    <td>
                                        <a href="{{URL::to('/edit-form-slide',$slide->id_slide)}}" class="btn btn-success" style="margin-right: 10px;">Edit</a>
                                        <a href="{{URL::to('/delete-slide',$slide->id_slide)}}" class="btn btn-danger">Delete</a>
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