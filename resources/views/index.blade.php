<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TechNews</title>

    <!-- favicon -->
    <link href="{{asset('public/frontend/img/favicon')}}')}}" rel=icon>

    <!-- web-fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,500' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- font-awesome -->
    <link href="{{asset('public/frontend/fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Mobile Menu Style -->
    <link href="{{asset('public/frontend/css/mobile-menu.css')}}" rel="stylesheet">

    <!-- Owl carousel -->
    <link href="{{asset('public/frontend/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <!-- Theme Style -->
    <link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/fonts/fontawesome-free-6.1.1-web/css/all.css')}}" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar">
<style>
    .hidden-text{
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .w-100{
        width: 100px;
    }
    .h-100{
        height: 100px;
    }
    .center-page{
        margin-right: auto;
        margin-left: auto;
        display: block;
        width: 34%;
    }
    .no-click-pages{
        pointer-events: none;
    }
    .click-pages{
        pointer-events: auto;
    }
    .size-18{
        font-size: 18px !important;
    }
    .list-name,
    .list-email{
        margin: 10px 20px;
        padding: 0;
        font-size: 15px;
    }
    .time-comment{
        float: right;
        font-size: 13px;
        font-weight: 500;
    }
    .time-reply
    {
        float: right;
        font-size: 13px;
        font-weight: 500;
    }
    .replies-body{
        display: table-cell;
        width: 1000px;
        padding-left: 50px;
        padding-top: 5px;
        padding-bottom: 5px;
        padding-right: 12px;
        background-color: #ccc;
        margin-left: 38px;
    }
</style>
<div id="main-wrapper">
<!-- Page Preloader -->
<div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div>
<!-- preloader -->

<div class="uc-mobile-menu-pusher">
<div class="content-wrapper">
<section id="header_section_wrapper" class="header_section_wrapper">
    <div class="container">
        <div class="header-section">
            <div class="row">
                <div class="col-md-4">
                    <div class="left_section">
                                            <span class="date">
                                                <?php
                                                    use Illuminate\Support\Facades\Session;
                                                    date_default_timezone_set("Asia/Ho_Chi_Minh");
                                                    $date = date('l');
                                                    echo $date;
                                                ?>
                                            </span>
                        <!-- Date -->
                                            <span class="time">
                                                <?php
                                                    date_default_timezone_set("Asia/Ho_Chi_Minh");
                                                    $date = date('d F Y');
                                                    echo $date;
                                                ?>
                                            </span>
                        <!-- Time -->
                        <div class="social">
                            <a class="icons-sm fb-ic" href="{{URL::to('/login-fb')}}"><i class="fa-brands fa-facebook"></i></a>
                            <!--Twitter-->
                            <a class="icons-sm tw-ic" href="{{URL::to('/login-gg')}}"><i class="fa-brands fa-google"></i></a>
                            <!--Google +-->
                            <a class="icons-sm inst-ic"><i class="fa-brands fa-instagram"> </i></a>
                            <!--Linkedin-->
                            <a class="icons-sm tmb-ic"><i class="fa-brands fa-tumblr"> </i></a>
                            <!--Pinterest-->
                            <a class="icons-sm rss-ic"><i class="fa fa-rss"> </i></a>
                        </div>
                        <!-- Top Social Section -->
                    </div>
                    <!-- Left Header Section -->
                </div>
                <div class="col-md-4">
                    <div class="logo">
                        <a href="{{URL::to('/')}}"><img src="{{asset('public/frontend/img/logo.png')}}" alt="Tech NewsLogo"></a>
                    </div>
                    <!-- Logo Section -->
                </div>
                <div class="col-md-4">
                    <div class="right_section">
                        <ul class="nav navbar-nav">
                            <?php
                                $username = Session::get("username_us");
                                $email = Session::get("email_us");
                                if(isset($username)){
                            ?>
                            <div class="dropdown">
                                <i class="fa-solid fa-user btn size-18"></i>
                                <ul class="dropdown-menu" style="margin-top: 0 !important">
                                    <li><a class="list-name" href="{{URL::to('/personal-infomation/'.$username)}}">Họ tên: <?php echo Session::get('username_us')?></a></li>
                                    <li><a class="list-email" href="#">Email: <?php echo Session::get('email_us')?></a></li>
                                    <li><a class="list-email" href="{{URL::to('/change-pass',$email)}}">Đổi mật khẩu</a></li>
                                    <li><a class="list-email" href="{{URL::to('/log-out')}}">Đăng xuất</a></li>
                                </ul>
                            </div>
                            <?php
                                }else{
                            ?>
                            <li><a href="{{URL::to('/login')}}">Đăng nhập</a></li>
                            <li><a href="{{URL::to('/login')}}">Đăng ký</a></li>
                            <?php
                                }
                            ?>
                            <!-- <li class="dropdown lang">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">En <i
                                        class="fa fa-angle-down"></i></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="#">Bn</a></li>
                                </ul>
                            </li> -->
                        </ul>
                        <!-- Language Section -->

                        <ul class="nav-cta hidden-xs">
                            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i
                                    class="fa fa-search"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="head-search">
                                            <form action="{{URL::to('/search-news')}}" method="POST" role="form">
                                                <!-- Input Group -->
                                                @csrf
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="name_search" placeholder="Nhập thông tin tìm kiếm"> 
                                                    <span class="input-group-btn">
                                                        <input type="submit" class="btn btn-primary" value="Tìm kiếm thông tin">
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- Search Section -->
                    </div>
                    <!-- Right Header Section -->
                </div>
            </div>
        </div>
        <!-- Header Section -->

        <div class="navigation-section">
            <nav class="navbar m-menu navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="#navbar-collapse-1">
                        <ul class="nav navbar-nav main-nav">
                            <li class="active"><a href="{{URL::to('/')}}"><img style="height: 20px;" src="{{asset('public/frontend/img/technology.png')}}" alt="Tech NewsLogo"></a></li>
                            <li class="active"><a href="{{URL::to('/')}}">Tin tức</a></li>
                            @foreach($list_cate as $key => $cate)
                            <li><a href="{{URL::to('/category-news/'.$cate->id_cate.'/'.'1')}}">{{$cate->name_cate}}</a></li>
                            @endforeach
                            <li class="dropdown m-menu-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">More
                                <span><i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="m-menu-content">
                                            @foreach($list_cate as $key => $cate)
                                            <ul class="col-sm-3">
                                                <li class="dropdown-header">{{$cate->name_cate}}</li>
                                                @foreach($list_type as $key => $type)
                                                    @if($cate->id_cate == $type->id_cate)
                                                        <li><a href="{{URL::to('category-type-news/'.$type->id_type.'/'.'1')}}">{{$type->name_type}}</a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            @endforeach
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- .navbar-collapse -->
                </div>
                <!-- .container -->
            </nav>
            <!-- .nav -->
        </div>
        <!-- .navigation-section -->
    </div>
    <!-- .container -->
</section>
<!-- header_section_wrapper -->

@yield('content')
<!-- Category News Section -->

<section id="video_section" class="video_section">
    <div class="container">
        <div class="well">
            <div class="row">
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/MJ-jbFdUPns"
                                frameborder="0" allowfullscreen></iframe>
                    </div>
                    <!-- embed-responsive -->

                </div>
                <!-- col-md-6 -->

                <div class="col-md-3">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/h5Jni-vy_5M"></iframe>
                    </div>
                    <!-- embed-responsive -->

                    <div class="embed-responsive embed-responsive-4by3 m16">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wQ5Gj0UB_R8"></iframe>
                    </div>
                    <!-- embed-responsive -->

                </div>
                <!-- col-md-3 -->

                <div class="col-md-3">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/UPvJXBI_3V4"></iframe>
                    </div>
                    <!-- embed-responsive -->

                    <div class="embed-responsive embed-responsive-4by3 m16">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/DTCtj5Wz6BM"></iframe>
                    </div>
                    <!-- embed-responsive -->

                </div>
                <!-- col-md-3 -->

            </div>
            <!-- row -->

        </div>
        <!-- well -->

    </div>
    <!-- Container -->

</section>
<!-- Video News Section -->

@if(isset($username))
<section id="subscribe_section" class="subscribe_section">
    <div class="row">
        <form action="{{URL::to('/send-fb',$username)}}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group form-group-lg" style="display: flex; align-items: center;">
                <label class="col-sm-6 control-label" for="formGroupInputLarge">
                    <h1><span class="red-color">Góp ý về trải nghiệm</span> TechNews</h1>
                </label>

                <div class="col-sm-3">
                    <input type="text" id="subscribe" name="feedback" class="form-control input-lg">
                </div>
                <div class="col-sm-1">
                    <input type="submit" value="Gửi thông tin" class="btn btn-large pink">
                </div>
                <div class="col-sm-2"></div>
            </div>
        </form>
    </div>
</section>
@endif
<!-- Subscriber Section -->

<section id="footer_section" class="footer_section">
    <div class="container">
        <hr class="footer-top">
        <div class="row">
            <div class="col-md-3">
                <div class="footer_widget_title"><h3><a href="category.html" target="_self">About Tech</a></h3></div>
                <div class="logo footer-logo">
                    <a title="fontanero" href="index.html">
                        <img src="{{asset('public/frontend/img/tech_about.jpg')}}" alt="technews">
                    </a>

                    <p>Competently conceptualize go forward testing procedures and B2B expertise. Phosfluorescently
                        cultivate principle-centered methods.of empowerment through fully researched.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer_widget_title">
                    <h3><a href="category.html" target="_self">Discover</a></h3>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <ul class="list-unstyled left">
                            @foreach($list_cate as $key => $cate)
                            <li><a href="{{URL::to('/category-news/'.$cate->id_cate.'/1')}}">{{$cate->name_cate}}</a></li>
                            @endforeach
                            @if(!$username)
                            <li><a href="{{URL::to('/login')}}">Đăng nhập</a></li>
                            @endif
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-8">
                        <ul class="list-unstyled">
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Newsletter Alerts</a></li>
                            <li><a href="#">Podcast</a></li>
                            <li><a href="#">Sms Subscription</a></li>
                            <li><a href="#">Advertisement Policy</a></li>
                            <li><a href="#">Report Technical issue</a></li>
                            <li><a href="#">Complaints and Corrections</a></li>
                            <li><a href="#">Terms and Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Cookie Policy</a></li>
                            <li><a href="#">Securedrop</a></li>
                            <li><a href="#">Archives</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer_widget_title">
                    <h3><a href="#" target="_self">Editor Picks</a></h3>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a href="#"><img class="media-object" src="{{asset('public/frontend/img/editor_pic1.jpg')}}"
                                         alt="Generic placeholder image"></a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            <a href="single.html">Apple launches photo-centric wrist watch for Android</a>
                        </h3> 
                        <span class="rating">
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star-half-full"></i> 
                        </span>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a href="#"><img class="media-object" src="{{asset('public/frontend/img/editor_pic2.jpg')}}"
                                         alt="Generic placeholder image"></a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            <a href="single.html">Apple launches photo-centric wrist watch for Android</a>
                        </h3> 
                        <span class="rating">
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star-half-full"></i> 
                        </span>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a href="#"><img class="media-object" src="{{asset('public/frontend/img/editor_pic3.jpg')}}"
                                         alt="Generic placeholder image"></a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            <a href="single.html">Apple launches photo-centric wrist watch for Android</a>
                        </h3> 
                        <span class="rating">
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star-half-full"></i> 
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer_widget_title">
                    <h3><a href="category.html" target="_self">Tech Photos</a></h3>
                </div>
                <div class="widget_photos">
                    <img class="img-thumbnail" src="{{asset('public/frontend/img/tech_photo1.jpg')}}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('public/frontend/img/tech_photo2.jpg')}}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('public/frontend/img/tech_photo3.jpg')}}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('public/frontend/img/tech_photo4.jpg')}}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('public/frontend/img/tech_photo5.jpg')}}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('public/frontend/img/tech_photo6.jpg')}}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('public/frontend/img/tech_photo7.jpg')}}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('public/frontend/img/tech_photo8.jpg')}}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('public/frontend/img/tech_photo9.jpg')}}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('public/frontend/img/tech_photo10.jpg')}}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('public/frontend/img/tech_photo11.jpg')}}" alt="Tech Photos">
                    <img class="img-thumbnail" src="{{asset('public/frontend/img/tech_photo12.jpg')}}" alt="Tech Photos">
                </div>

            </div>
        </div>
    </div>

    <div class="footer_bottom_Section">
        <div class="container">
            <div class="row">
                <div class="footer">
                    <div class="col-sm-3">
                        <div class="social">
                            <a class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a>
                            <!--Twitter-->
                            <a class="icons-sm tw-ic"><i class="fa fa-twitter"></i></a>
                            <!--Google +-->
                            <a class="icons-sm inst-ic"><i class="fa fa-instagram"> </i></a>
                            <!--Linkedin-->
                            <a class="icons-sm tmb-ic"><i class="fa fa-tumblr"> </i></a>
                            <!--Pinterest-->
                            <a class="icons-sm rss-ic"><i class="fa fa-rss"> </i></a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <p>&copy; Copyright 2016-Tech News . Design by: <a href="https://uicookies.com">uiCookies</a> </p>
                    </div>
                    <div class="col-sm-3">
                        <p>Technology News Magazine</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<!-- #content-wrapper -->

</div>
<!-- .offcanvas-pusher -->

<a href="#" class="crunchify-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>

<div class="uc-mobile-menu uc-mobile-menu-effect">
    <button type="button" class="close" aria-hidden="true" data-toggle="offcanvas"
            id="uc-mobile-menu-close-btn">&times;</button>
    <div>
        <div>
            <ul id="menu">
                <li class="active"><a href="blog.html">News</a></li>
                <li><a href="category.html">Mobile</a></li>
                <li><a href="blog.html">Tablet</a></li>
                <li><a href="category.html">Gadgets</a></li>
                <li><a href="blog.html">Camera</a></li>
                <li><a href="category.html">Design</a></li>
                <li class="dropdown m-menu-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">More
                    <span><i class="fa fa-angle-down"></i></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="m-menu-content">
                                <ul class="col-sm-3">
                                    <li class="dropdown-header">Widget Haeder</li>
                                    <li><a href="#">Awesome Features</a></li>
                                    <li><a href="#">Clean Interface</a></li>
                                    <li><a href="#">Available Possibilities</a></li>
                                    <li><a href="#">Responsive Design</a></li>
                                    <li><a href="#">Pixel Perfect Graphics</a></li>
                                </ul>
                                <ul class="col-sm-3">
                                    <li class="dropdown-header">Widget Haeder</li>
                                    <li><a href="#">Awesome Features</a></li>
                                    <li><a href="#">Clean Interface</a></li>
                                    <li><a href="#">Available Possibilities</a></li>
                                    <li><a href="#">Responsive Design</a></li>
                                    <li><a href="#">Pixel Perfect Graphics</a></li>
                                </ul>
                                <ul class="col-sm-3">
                                    <li class="dropdown-header">Widget Haeder</li>
                                    <li><a href="#">Awesome Features</a></li>
                                    <li><a href="#">Clean Interface</a></li>
                                    <li><a href="#">Available Possibilities</a></li>
                                    <li><a href="#">Responsive Design</a></li>
                                    <li><a href="#">Pixel Perfect Graphics</a></li>
                                </ul>
                                <ul class="col-sm-3">
                                    <li class="dropdown-header">Widget Haeder</li>
                                    <li><a href="#">Awesome Features</a></li>
                                    <li><a href="#">Clean Interface</a></li>
                                    <li><a href="#">Available Possibilities</a></li>
                                    <li><a href="#">Responsive Design</a></li>
                                    <li><a href="#">Pixel Perfect Graphics</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- .uc-mobile-menu -->

</div>
<!-- #main-wrapper -->

<!-- jquery Core-->
<script src="{{asset('public/frontend/js/jquery-2.1.4.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>

<!-- Theme Menu -->
<script src="{{asset('public/frontend/js/mobile-menu.js')}}"></script>

<!-- Owl carousel -->
<script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>

<!-- Theme Script -->
<script src="{{asset('public/frontend/js/script.js')}}"></script>
</body>
</html>