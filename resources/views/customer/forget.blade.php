@extends('home')
@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('page.home')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thay đổi mật khẩu</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <form action="{{route('customer.update')}}" method="post">
                    @csrf
                    <div class="card mb-4 mb-md-0">
                        <div class="card-body">
                            <p class="mb-4">Đổi mật khẩu</p>
                            @if(session('message'))
                                {!! session('message') !!}
                            @endif
                            <input type="hidden" name="id" value="{{$customer->id_user}}">
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
                            <button type="submit" class="btn btn-primary px-3 py-4 fs-13 mt-3">Xác nhận</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection