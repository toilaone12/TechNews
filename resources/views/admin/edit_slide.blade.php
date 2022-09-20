@extends('admin_layout')
@section('dashboard')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Slide</h4>
                    </div>
                    <div class="card-body">
                        @foreach($list_slide as $edit_slide)
                        <form action="{{URL::to('/edit-slide',$edit_slide->id_slide)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label style="display: block;">Image Slide</label>
                                        <input type="file" name="image_slide" value="{{$edit_slide->image_slide}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Name Slide</label>
                                        <input type="text" class="form-control" value="{{$edit_slide->name_slide}}" name="name_slide" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Link Slide</label>
                                        <input type="text" class="form-control" name="link_slide" value="{{$edit_slide->link_slide}}" placeholder="Enter Link">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="edit_slide" class="btn btn-info btn-fill pull-right">Edit Slide</button>
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