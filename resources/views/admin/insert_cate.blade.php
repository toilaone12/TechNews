@extends('admin_layout')
@section('dashboard')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Insert Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{URL::to('/save-cate')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    </div>
                                    <div class="form-group">
                                        <label>Name Category</label>
                                        <input type="text" class="form-control" name="name_cate" placeholder="Name Category">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="insert_cate" class="btn btn-info btn-fill pull-right">Insert Category</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection