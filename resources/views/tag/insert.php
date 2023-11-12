@extends('admin_layout')
@section('dashboard')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Insert Type of Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{URL::to('/save-type')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name Category</label>
                                        <select name="name_cate" class="form-control" style="width: 50%;" id="">
                                            @foreach($list_cate as $key => $value_cate)
                                            <option value="{{$value_cate->id_cate}}">{{$value_cate->name_cate}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Name Type of Category</label>
                                        <input type="text" name="name_type" id="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="insert_type" class="btn btn-info btn-fill pull-right">Insert Type of Category</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection