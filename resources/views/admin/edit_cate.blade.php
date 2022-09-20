@extends('admin_layout')
@section('dashboard')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Category</h4>
                    </div>
                    <div class="card-body">
                        @foreach($edit_cate as $key => $value_edit)
                        <form action="{{URL::to('/edit-cate',$value_edit->id_cate)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name Category</label>
                                        <input type="text" value="{{$value_edit->name_cate}}"  class="form-control" name="name_cate" placeholder="Name Category">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="edit_cate" class="btn btn-info btn-fill pull-right">Edit Category</button>
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