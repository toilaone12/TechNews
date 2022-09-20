<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{asset('public/frontend/css/style_profile.css')}}">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="{{asset('public/backend/fonts/fontawesome-free-6.1.1-web/css/all.css')}}" rel="stylesheet">
</head>
<?php
    use Illuminate\Support\Facades\Session;
?>
<body>
<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="">Cá nhân</a></li>
              <li class="breadcrumb-item active" aria-current="page">Thông tin cá nhân</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                    @foreach($personal as $key => $person)
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{$person->image_user}}" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                            <h4>{{$person->name_user}}</h4>
                            <p class="text-secondary mb-1">Back-end Developer</p>
                            <p class="text-muted font-size-sm">{{$person->address_user}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                @foreach($personal as $key => $person)
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="mb-0">
                                <?php
                                    $message = Session::get('message');
                                    if(isset($message)){
                                        echo $message;
                                    }
                                ?>
                            </h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Họ & tên</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        {{$person->name_user}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        {{$person->email_user}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">Số điện thoại</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        {{$person->phone_user}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Giới tính</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        {{$person->sex_user}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Địa chỉ</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        {{$person->address_user}}

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <a class="btn btn-info " target="__blank" href="{{URL::to('edit-profile',$personal[0]->id)}}">Sửa thông tin</a>
                        </div>
                    </div>
                </div>
                @endforeach
              </div>



            </div>
          </div>

        </div>
    </div>
</body>
</html>