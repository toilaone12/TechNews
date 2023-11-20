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
                    <td>{{$user->level ? 'Nhân viên' : 'Quản trị viên'}}</td>
                    <td>
                        <a href="{{route('user.permission',['id' => $user->id_user])}}" class="btn btn-success" style="margin-right: 30px;">Phân quyền</a>
                        <a href="{{route('user.delete',['id' => $user->id_user])}}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection