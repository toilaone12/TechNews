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
                        @foreach($edit_type as $key => $value_type)
                        <form action="{{URL::to('/edit-type',$value_type->id_type)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name Category</label>
                                        <select name="name_cate" id="" class="form-control">
                                            @foreach($edit_cate as $key => $value_cate)
                                            <option @if($value_cate->id_cate == $value_type->id_cate)
                                                        {{'selected'}}
                                                    @endif 
                                                    value="{{$value_cate->id_cate}}">
                                                        {{$value_cate->name_cate}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Name Type of Category</label>
                                        <input type="text" value="{{$value_type->name_type}}" class="form-control" name="name_type" placeholder="Name Type of Category">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="edit_type" class="btn btn-info btn-fill pull-right">Edit Type of Category</button>
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