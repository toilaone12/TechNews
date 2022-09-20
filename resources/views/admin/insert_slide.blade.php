@extends('admin_layout')
@section('dashboard')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Insert Slide</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{URL::to('/save-slide')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label style="display: block;">Image Slide</label>
                                        <input type="file" name="image_slide">
                                    </div>
                                    <div class="form-group">
                                        <label>Name Slide</label>
                                        <input type="text" class="form-control" name="name_slide" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Link Slide</label>
                                        <input type="text" class="form-control" name="link_slide" placeholder="Enter Link">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="insert_slide" class="btn btn-info btn-fill pull-right">Insert Slide</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection