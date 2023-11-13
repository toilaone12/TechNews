<!-- 
=========================================================
 Light Bootstrap Dashboard - v2.0.1
=========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.  -->
 <!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{$title}}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link href="{{asset('backend/css/light-bootstrap-dashboard.css')}}?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('backend/css/demo.css')}}" rel="stylesheet" />
    <link href="{{asset('backend/fonts/fontawesome-free-6.1.1-web/css/all.css')}}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<?php
    use Illuminate\Support\Facades\Session;
?>
<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text" style="display: flex;">
                        <img style="width: 30%; margin-right:10px;" src="{{asset('frontend/img/logo.png')}}" alt="">
                        <span style="text-transform:capitalize; font-size:25px;">TechNews</span> 
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.html">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Trang chủ</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link {{request()->is('admin/category/list') || request()->is('admin/category/insert') ? 'active' : ''}}" onclick="myToggle()" style="cursor: pointer;">
                            <i class="fa-solid fa-list-alt"></i>
                            <p>Danh mục</p>
                        </a>
                        <ul class="cate-none" id="sub-cate--toggle">
                            <li class="sub-cate">
                                <i class="fa-solid fa-list" style="font-size: 20px"></i>
                                <a class="sub-cate--title" href="{{route('category.list')}}">Danh sách</a>
                            </li>

                            <li class="sub-cate">
                                <i class="fa-solid fa-circle-plus" style="font-size: 20px"></i>
                                <a class="sub-cate--title" href="{{route('category.insert')}}">Thêm</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link {{request()->is('admin/news/list') || request()->is('admin/news/insert') ? 'active' : ''}}" onclick="myToggle2()" style="cursor: pointer;">
                            <i class="fa-solid fa-newspaper"></i>
                            <p>Tin tức</p>
                        </a>
                        <ul class="cate-none-2" id="sub-cate--toggle2">
                            <li class="sub-cate">
                                <i class="fa-solid fa-list" style="font-size: 20px"></i>
                                <a class="sub-cate--title" href="{{route('news.list')}}">Danh sách</a>
                            </li>

                            <li class="sub-cate">
                                <i class="fa-solid fa-circle-plus" style="font-size: 20px"></i>
                                <a class="sub-cate--title" href="{{route('news.insert')}}">Thêm</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link"  onclick="myToggle3()" style="cursor: pointer;">
                            <i class="fa-solid fa-tags"></i>
                            <p>Từ khóa</p>
                        </a>
                        <ul class="cate-none-3" id="sub-cate--toggle3">
                            <li class="sub-cate">
                                <i class="fa-solid fa-list" style="font-size: 20px"></i>
                                <a class="sub-cate--title" href="{{route('tags.list')}}">Danh sách</a>
                            </li>

                            <li class="sub-cate">
                                <i class="fa-solid fa-circle-plus" style="font-size: 20px"></i>
                                <a class="sub-cate--title" href="{{route('tags.insert')}}">Thêm</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link"  onclick="myToggle4()" style="cursor: pointer;">
                            <i class="fa-solid fa-comment"></i>
                            <p>Bình luận</p>
                        </a>
                        <ul class="cate-none-4" id="sub-cate--toggle4">
                            <li class="sub-cate">
                                <i class="fa-solid fa-list" style="font-size: 20px"></i>
                                <a class="sub-cate--title" href="">Danh sách</a>
                            </li>    
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> TechNews </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-palette"></i>
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item hover">
                                <i class="nc-icon nc-zoom-split nav-link "></i>
                                <div class="input-group search-none">
                                    <form action="form-search" method="POST">
                                        @csrf
                                        <select name="option_search" class="form-radius" style="width: 25% !important;" id="">
                                            <option class="border-none" value="0">Category</option>
                                            <option class="border-none" value="1">Type of Category</option>
                                            <option class="border-none" value="2">News</option>
                                            <option class="border-none" value="3">Slide</option>
                                        </select>
                                        <input type="search" name="name_search" id="" class="form-radius" >
                                        <input type="submit" class="show-search btn-primary" style="cursor: pointer; background-color: #007bff !important; color: #fff !important;" value="Search">
                                    </form>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.logout')}}">
                                    <span class="no-icon">Cài đặt</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.logout')}}">
                                    <span class="no-icon">Đăng xuất</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            @yield('content')
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
      <!-- -->

</div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('backend/js/demo.js')}}"></script>
<script src="{{asset('backend/js/main.js')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<!-- @Html.TextAreaFor(model=>model.CourseDescription, new { @id = "editor"}) -->
<script type="text/javascript">
    CKEDITOR.replace('ckeditor');
    CKEDITOR.config.pasteFormWordPromptCleanup = true;
    CKEDITOR.config.pasteFormWordRemoveFontStyles = false;
    CKEDITOR.config.pasteFormWordRemoveStyles = false;
    CKEDITOR.config.language = 'vi';
    CKEDITOR.config.htmlEncodeOutput = false;
    CKEDITOR.config.ProcessHTMLEntities = false;
    CKEDITOR.config.entities = false;
    CKEDITOR.config.entities_latin = false;
    CKEDITOR.config.ForceSimpleAmpersand = true;

    $(document).ready(function() {
    });
    function myToggle(){
        let cate = document.getElementById('sub-cate--toggle');
        cate.classList.toggle('cate-block');
    }
    function myToggle1(){
        let type = document.getElementById('sub-cate--toggle1');
        type.classList.toggle('cate-block-1');
    }
    function myToggle2(){
        let type = document.getElementById('sub-cate--toggle2');
        type.classList.toggle('cate-block-2');
    }
    function myToggle3(){
        let type = document.getElementById('sub-cate--toggle3');
        type.classList.toggle('cate-block-3');
    }
    function myToggle4(){
        let type = document.getElementById('sub-cate--toggle4');
        type.classList.toggle('cate-block-4');
    }
</script>

</html>
