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
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="{{asset('public/backend/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/backend/css/light-bootstrap-dashboard.css')}}?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('public/backend/css/demo.css')}}" rel="stylesheet" />
    <link href="{{asset('public/backend/fonts/fontawesome-free-6.1.1-web/css/all.css')}}" rel="stylesheet" />
</head>
<?php
    use Illuminate\Support\Facades\Session;
?>
<body>
    <style>
        .cate-block,
        .cate-block-1,
        .cate-block-2,
        .cate-block-3{
            display: block !important;
            width: 100%;
            padding-left: 10px;
            animation: transitionOut 1s;
        }
        .cate-none,
        .cate-none-1,
        .cate-none-2,
        .cate-none-3{
            display: none;
            /* animation: transitionIn 1s; */
        }
        .sub-cate{
            list-style: none;
            color: #FFFFFF;
            margin: 5px 15px;
            opacity: .86;
            border-radius: 4px;
            display: flex;
            align-items: center;
            padding: 10px 15px;
        }
        .sub-cate--title{
            margin-left: 16px;
            color: #FFFFFF;
            line-height: 31px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            display: inline-flex;
        }
        .show-search{
            border-width: 2px;
            background-color: transparent;
            font-weight: 400;
            opacity: 0.8;
            padding: 8px 12px;
            border: 1px solid #3472F7;
            border-radius: 5px;
        }
        .form-radius{
            background-color: #FFFFFF;
            border: 1px solid #E3E3E3;
            width: 47%;
            border-radius: 4px;
            color: #565656;
            padding: 8px 12px;
            height: 40px;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
        .search-none{
            position: absolute;
            z-index: 100;
            width: 30%;
            top: 50px;
            left: 190px;
            display: none;
            animation: searchOut 1s;
        }
        .search-none::after{
            content: "";
            position: absolute;
            top: -18px;
            width: 100%;
            height: 30px;
            background-color: transparent;
        }
        .search-none::before{
            content: "";
            position: absolute;
            top: 30px;
            width: 100%;
            height: 100px;
            background-color:transparent;
        }
        .hover:hover .search-none{
            display: flex;
        }
        .border-none{
            outline-color: transparent;
        }
        @keyframes transitionOut{
            from{
                opacity: 0;
                transform: translateY(-10px);
            }to{
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes searchOut{
            from{
                opacity: 0;
                transform: scale(0);
            }to{
                opacity: 1;
                transform: scale(10deg);
            }
        }
    </style>
    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text" style="display: flex;">
                        <img style="width: 30%; margin-right:10px;" src="{{asset('public/frontend/img/logo.png')}}" alt="">
                        <span style="text-transform:capitalize; font-size:25px;">TechNews</span> 
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="dashboard.html">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link"  onclick="myToggle()" style="cursor: pointer;">
                            <i class="fa-solid fa-list-alt"></i>
                            <p>Category</p>
                        </a>
                        <ul class="cate-none" id="sub-cate--toggle">
                            <li class="sub-cate">
                                <i class="fa-solid fa-list" style="font-size: 20px"></i>
                                <a class="sub-cate--title" href="{{URL::to('/list-cate')}}">Category List</a>
                            </li>
                            <?php
                                $level = Session::get('level');
                                if($level == 1){
                            ?>
                            <li class="sub-cate">
                                <i class="fa-solid fa-circle-plus" style="font-size: 20px"></i>
                                <a class="sub-cate--title" href="{{URL::to('/insert-cate')}}">Insert Category</a>
                            </li>
                            <?php
                                }else{

                                }
                            ?>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link"  onclick="myToggle1()" style="cursor: pointer;">
                            <i class="fa-solid fa-copyright"></i>
                            <p>Type of Category</p>
                        </a>
                        <ul class="cate-none-1" id="sub-cate--toggle1">
                            <li class="sub-cate">
                                <i class="fa-solid fa-list" style="font-size: 20px"></i>
                                <a class="sub-cate--title" href="{{URL::to('/list-type')}}">Type of Category List</a>
                            </li>
                            <?php
                                $level = Session::get('level');
                                if($level == 1){
                            ?>
                            <li class="sub-cate">
                                <i class="fa-solid fa-circle-plus" style="font-size: 20px"></i>
                                <a class="sub-cate--title" href="{{URL::to('/insert-type')}}">Insert Type</a>
                            </li>
                            <?php
                                }else{

                                }
                            ?>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link"  onclick="myToggle2()" style="cursor: pointer;">
                            <i class="fa-solid fa-newspaper"></i>
                            <p>News Details</p>
                        </a>
                        <ul class="cate-none-2" id="sub-cate--toggle2">
                            <li class="sub-cate">
                                <i class="fa-solid fa-list" style="font-size: 20px"></i>
                                <a class="sub-cate--title" href="{{URL::to('/list-news')}}">News List</a>
                            </li>
                            <?php
                                $level = Session::get('level');
                                if($level == 1){
                            ?>
                            <li class="sub-cate">
                                <i class="fa-solid fa-circle-plus" style="font-size: 20px"></i>
                                <a class="sub-cate--title" href="{{URL::to('/insert-news')}}">Insert News</a>
                            </li>
                            <?php
                                }else{

                                }
                            ?>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link"  onclick="myToggle3()" style="cursor: pointer;">
                            <i class="fa-brands fa-adversal"></i>
                            <p>Slide</p>
                        </a>
                        <ul class="cate-none-3" id="sub-cate--toggle3">
                            <li class="sub-cate">
                                <i class="fa-solid fa-list" style="font-size: 20px"></i>
                                <a class="sub-cate--title" href="{{URL::to('/list-slide')}}">Slide List</a>
                            </li>
                            <?php
                                $level = Session::get('level');
                                if($level == 1){
                            ?>
                            <li class="sub-cate">
                                <i class="fa-solid fa-circle-plus" style="font-size: 20px"></i>
                                <a class="sub-cate--title" href="{{URL::to('/insert-slide')}}">Insert Slide</a>
                            </li>
                            <?php
                                }else{

                                }
                            ?>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link" href="./maps.html">
                            <i class="nc-icon nc-pin-3"></i>
                            <p>Maps</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./notifications.html">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    <li class="nav-item active active-pro">
                        <a class="nav-link active" href="upgrade.html">
                            <i class="nc-icon nc-alien-33"></i>
                            <p>Upgrade to PRO</p>
                        </a>
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
                                <a class="nav-link" href="{{URL::to('/logout')}}">
                                    <span class="no-icon">Log out: <?php
                                        $username = Session::get('username');
                                        if(isset($username)){
                                            echo $username;
                                        }
                                    ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            @yield('dashboard')
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
    <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>

        <ul class="dropdown-menu">
			<li class="header-title"> Sidebar Style</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Background Image</p>
                    <label class="switch">
                        <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <p>Filters</p>
                    <div class="pull-right">
                        <span class="badge filter badge-black" data-color="black"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple active" data-color="purple"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Images</li>

            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-1.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-3.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="..//assets/img/sidebar-4.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-5.jpg" alt="" />
                </a>
            </li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
                </div>
            </li>

            <li class="header-title pro-title text-center">Want more components?</li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
                </div>
            </li>

            <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>

            <li class="button-container">
				<button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> · 256</button>
                <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> · 426</button>
            </li>
        </ul>
    </div>
</div>

</body>
<!--   Core JS Files   -->
<script src="{{asset('public/backend/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/backend/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/backend/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{asset('public/backend/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="{{asset('public/backend/js/plugins/chartist.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('public/backend/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{asset('public/backend/js/light-bootstrap-dashboard.js')}}?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('public/backend/js/demo.js')}}"></script>
<script src="{{asset('public/ckeditor/ckeditor.js')}}"></script>
<!-- @Html.TextAreaFor(model=>model.CourseDescription, new { @id = "editor"}) -->
<script type="text/javascript">
    CKEDITOR.replace('ckeditor');
    CKEDITOR.replace('ckeditor1');
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
        // Javascript method's body can be found in assets/js/demos.js')}}
        demo.initDashboardPageCharts();

        demo.showNotification();

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
</script>

</html>
