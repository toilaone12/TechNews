@extends('dashboard')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card-header ">
            <h4 class="card-title">{{$title}}</h4>
            @if(session('message'))
            {!! session('message') !!}
            @endif
        </div>
        <table class="table table-striped w-100 mt-3">
            <thead>
                <tr>
                    <th width="100">STT</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Cấp bậc</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$user->fullname}}</td>
                    <td>{{$user->email}}</td>
                    <td class="level-{{$user->id_admin}}" data-level="{{$user->level}}">{{$user->level ? 'Nhân viên' : 'Quản trị viên'}}</td>
                    <td>
                        <a href="#permission" class="btn btn-success permission-user" data-id="{{$user->id_admin}}" data-toggle="modal" style="margin-right: 30px;">Phân quyền</a>
                        <a href="{{route('user.delete',['id' => $user->id_admin])}}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="permission" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('user.permission')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$user->id_admin}}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Phân quyền</h5>
                    <button type="button" class="close btn px-2 py-1 btn-secondary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="level">Cấp bậc</label>
                        <select name="level" id="level" class="form-select list-role"></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection