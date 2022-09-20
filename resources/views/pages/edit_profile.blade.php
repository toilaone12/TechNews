<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="{{asset('public/frontend/css/style_edit_profile.css')}}">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="{{asset('public/backend/fonts/fontawesome-free-6.1.1-web/css/all.css')}}" rel="stylesheet">
</head>
<body>
<div class="container-xl px-4">
    <!-- Account page navigation-->
    <hr class="mt-0 mb-4">
    <nav aria-label="breadcrumb" class="main-breadcrumb mr-20">
        <ol class="breadcrumb ">
            <a href="{{URL::to('/personal-infomation',$edit_user[0]->name_user)}}" style="text-decoration:none;" class="breadcrumb-item active " aria-current="page">Thông tin khách hàng</a>
        </ol>
    </nav>
    @foreach($edit_user as $key => $person)
    <form action="{{URL::to('/save-profile',$person->id_user)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Thông tin ảnh</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <!-- Profile picture upload button-->                 
                        <div class="image-upload">
                            <label for="file-input">
                                <img class="img-account-profile rounded-circle mb-2" src="{{$person->image_user}}" alt="">
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4">Dung lượng của ảnh PNG, JPEG, JPG không quá 50MB</div>
                            </label>
                            <input id="file-input" style="display: none; cursor:pointer;" type="file" name="image_user" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Thông tin chi tiết</div>
                    <div class="card-body">
                        <form>
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Họ & tên</label>
                                <input class="form-control" id="inputUsername" type="text" placeholder="Nhập họ và tên" name="name_user" value="{{$person->name_user}}">
                            </div>
                            <!-- Form Row-->
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Giới tính</label>
                                    <select class="form-control" id="inputOrgName" name="sex_user" id="">
                                        <option 
                                            @if($person->sex_user == "Nam")
                                                {{'selected'}}
                                            @endif
                                            value="Nam">Nam
                                        </option>
                                        <option 
                                            @if($person->sex_user == "Nữ")
                                                {{'selected'}}
                                            @endif
                                            value="Nữ">Nữ
                                        </option>
                                    </select>
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Địa chỉ</label>
                                    <input class="form-control" id="inputLocation" type="text" placeholder="Nhập địa chỉ" name="address_user" value="{{$person->address_user}}">
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Địa chỉ email</label>
                                <input class="form-control" id="inputEmailAddress" type="email" name="email_user" placeholder="Nhập email" value="{{$person->email_user}}">
                            </div>
                            <!-- Form Row-->
                            <div class="mb-3">
                                <!-- Form Group (phone number)-->
                                <label class="small mb-1" for="inputPhone">Số điện thoại</label>
                                <input class="form-control" id="inputPhone" type="tel" name="phone_user" placeholder="Nhập số điện thoại" value="{{$person->phone_user}}">
                                <!-- Form Group (birthday)-->
                            </div>
                            <!-- Save changes button-->
                            <input class="btn btn-primary" type="submit" name="save" value="Lưu thay đổi"/>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </form>
    @endforeach
</div>
</body>
</html>