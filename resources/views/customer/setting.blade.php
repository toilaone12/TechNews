@extends('home')
@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('page.home')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thông tin tài khoản</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="mb-0">Họ tên</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-muted mb-0">{{$customer->fullname_user}}</p>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="mb-0">Tên đăng nhập</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-muted mb-0">{{$customer->username}}</p>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-muted mb-0">{{$customer->email_user}}</p>
                                    </div>
                                </div>
        
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a href="{{route('customer.delete',['id' => $customer->id_user, 'is_me' => 1])}}" class="btn btn-danger mt-3">Xóa tài khoản</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <form action="{{route('customer.change')}}" method="post">
                    @csrf
                    <div class="card mb-4 mb-md-0">
                        <div class="card-body">
                            <p class="mb-4">Đổi thông tin cá nhân</p>
                            @if(session('message'))
                                {!! session('message') !!}
                            @endif
                            <input type="hidden" name="id" value="{{$customer->id_user}}">
                            <div class="form-group mb-2">
                                <label for="fullname">Họ tên</label>
                                <input type="text" name="fullname" id="fullname" value="{{$customer->fullname_user}}" class="form-control" required>
                                @error('fullname')
                                <span class="text-danger small">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="username">Tên đăng nhập</label>
                                <input type="text" name="username" id="username" value="{{$customer->username}}" class="form-control" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="email">Email cá nhân</label>
                                <input type="email" name="email" id="email" value="{{$customer->email_user}}" class="form-control" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="password">Mật khẩu</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                                @error('password')
                                <span class="text-danger small">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="repassword">Nhập lại mật khẩu</label>
                                <input type="password" name="repassword" id="repassword" class="form-control" required>
                                @error('repassword')
                                <span class="text-danger small">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Xác nhận</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection