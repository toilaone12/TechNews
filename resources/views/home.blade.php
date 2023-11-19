<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$title}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/image/favicon.ico')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/update.css')}}">
</head>

<body>

    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">
                <div class="header-top black-bg d-none d-md-block">
                    <div class="container">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>
                                        <li><img src="{{asset('frontend/image/icon/header_icon1.png')}}" alt="">34ºc, Sunny </li>
                                        <li><img src="{{asset('frontend/image/icon/header_icon1.png')}}" alt="">Tuesday, 18th June, 2019</li>
                                    </ul>
                                </div>
                                <div class="header-info-right">
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-mid d-none d-md-block">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="logo">
                                    <a href="{{route('page.home')}}"><img src="{{asset('frontend/image/logo.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9">
                                <div class="header-banner f-right ">
                                    <img src="" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-12 col-lg-12 col-md-12 header-flex">
                                <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="{{route('page.home')}}"><img src="{{asset('frontend/image/logo.png')}}" alt=""></a>
                                </div>
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-md-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{route('page.home')}}">Trang chủ</a></li>
                                            @foreach($arr as $key => $parent)
                                            <li class="{{$key > 7 ? 'z-index-0' : ''}}"><a href="{{route('category.allCategory',['slug' => $parent['parent']['slug']])}}">{{$parent['parent']['name']}}</a>
                                                @if(count($parent['child']) != 0)
                                                <ul class="submenu">
                                                    @foreach($parent['child'] as $child)
                                                    <li><a href="{{route('category.allCategory',['slug' => $child['slug']])}}">{{$child['name']}}</a></li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-md-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>

    @yield('content')

    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding fix">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12">
                        <div class="single-footer-caption">
                            <div class="single-footer-caption">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="{{route('page.home')}}"><img src="" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p>Suscipit mauris pede for con sectetuer sodales adipisci for cursus fames lectus tempor da blandit gravida sodales Suscipit mauris pede for con sectetuer sodales adipisci for cursus fames lectus tempor da blandit gravida sodales Suscipit mauris pede for sectetuer.</p>
                                    </div>
                                </div>
                                <!-- social -->
                                <div class="footer-social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4  col-sm-6">
                        <div class="single-footer-caption mt-60">
                            <div class="footer-tittle">
                                <h4>Newsletter</h4>
                                <p>Heaven fruitful doesn't over les idays appear creeping</p>
                                <!-- Form -->
                                <div class="footer-form">
                                    <div id="mc_embed_signup">
                                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part">
                                            <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address" class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = ' Email Address '">
                                            <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm"><img src="" alt=""></button>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50 mt-60">
                            <div class="footer-tittle">
                                <h4>Instagram Feed</h4>
                            </div>
                            <div class="instagram-gellay">
                                <ul class="insta-feed">
                                    <li><a href="#"><img src="" alt=""></a></li>
                                    <li><a href="#"><img src="" alt=""></a></li>
                                    <li><a href="#"><img src="" alt=""></a></li>
                                    <li><a href="#"><img src="" alt=""></a></li>
                                    <li><a href="#"><img src="" alt=""></a></li>
                                    <li><a href="#"><img src="" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom aera -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-lg-6">
                            <div class="footer-copy-right">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="footer-menu f-right">
                                <ul>
                                    <li><a href="#">Terms of use</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Modal -->
    <div class="modal fade" id="comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body pt-0">
                    <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="button button-contactForm boxed-btn p-2 w-75" id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login"
                                type="button" role="tab" aria-controls="pills-login" aria-selected="true">Đăng nhập</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="button button-contactForm boxed-btn p-2 w-75" id="pills-register-tab" data-bs-toggle="pill" data-bs-target="#pills-register"
                                type="button" role="tab" aria-controls="pills-register" aria-selected="false">Đăng ký</button>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="pills-tabContent">
                        <div class="tab-pane fade " id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                            <div class="text-center fs-20 font-weight-bold mt-3">Đăng nhập</div>
                            <form class="login">
                                <div class="mb-3 form-group">
                                    <label for="loginEmail" class="form-label fs-14">Tài khoản</label>
                                    <input type="text" class="form-control" name="username" id="loginEmail" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-4 form-group">
                                    <label for="loginPassword" class="form-label fs-14">Mật khẩu</label>
                                    <input type="password" class="form-control" id="loginPassword" name="password" required>
                                </div>
                                <button type="submit" class="rounded border-0 py-2 px-5 fs-16 btn-primary m-auto d-block">Đăng nhập</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">
                            <div class="text-center fs-20 font-weight-bold mt-3">Đăng ký</div>
                            <div class="my-2 fs-15 text-center message-register"></div>
                            <form class="register">
                                <div class="mb-3 form-group">
                                    <label for="registerName" class="fs-14">Họ tên</label>
                                    <input type="text" class="form-control" name="fullname" id="registerName" required>
                                    <span class="text-danger fs-13 error-fullname"></span>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="userName" class="fs-14">Tên tài khoản</label>
                                    <input type="text" class="form-control" name="username" id="userName" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="registerEmail" class="fs-14">Email</label>
                                    <input type="email" class="form-control" name="email" id="registerEmail" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="registerPassword" class="fs-14">Mật khẩu</label>
                                    <input type="password" class="form-control" name="password" id="registerPassword" required>
                                    <span class="text-danger fs-13 error-password"></span>
                                </div>
                                <div class="mb-4 form-group">
                                    <label for="registerPassword" class="fs-14">Nhập lại mật khẩu</label>
                                    <input type="password" class="form-control" name="repassword" id="registerPassword" required>
                                    <span class="text-danger fs-13 error-repassword"></span>
                                </div>
                                <button type="submit" class="rounded border-0 py-2 px-5 fs-16 btn-primary m-auto d-block">Đăng ký</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    <!-- JS here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{asset('frontend/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{asset('frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{asset('frontend/js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/slick.min.js')}}"></script>
    <!-- Date Picker -->
    <script src="{{asset('frontend/js/gijgo.min.js')}}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{asset('frontend/js/wow.min.js')}}"></script>
    <script src="{{asset('frontend/js/animated.headline.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.magnific-popup.js')}}"></script>

    <!-- Breaking New Pluging -->
    <script src="{{asset('frontend/js/jquery.ticker.js')}}"></script>
    <script src="{{asset('frontend/js/site.js')}}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.sticky.js')}}"></script>

    <!-- contact js -->
    <script src="{{asset('frontend/js/contact.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.form.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('frontend/js/mail-script.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.ajaxchimp.min.js')}}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{asset('frontend/js/plugins.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="{{asset('frontend/js/update.js')}}"></script>
    @if(!request()->cookie('id'))
    <script>
        $(document).ready(function(){
            $('.open-modal-comment').on('focus',function (){
                // console.log(1);
                $('#comment').modal('show');
                $('#pills-login').addClass('show active')
            })
            $('#pills-register-tab').on('click',function(){
                $('#pills-login').removeClass('show active');
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            $('.login').on('submit',function(e){
                e.preventDefault();
                let formData = new FormData($(this)[0]);
                $.ajax({
                    method: 'POST',
                    url: '{{route("customer.login")}}',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    processData: false,
                    contentType: false,
                    success: function(data){
                        console.log(data);
                        if(data.res == 'success'){
                            location.reload()
                        }
                    },
                    error: function(err){
                        console.log(err);
                    }
                })
            })
            $('.register').on('submit',function(e){
                e.preventDefault();
                let formData = new FormData($(this)[0]);
                $.ajax({
                    method: 'POST',
                    url: '{{route("customer.register")}}',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    processData: false,
                    contentType: false,
                    success: function(data){
                        console.log(data);
                        if(data.res == 'warning'){
                            $('.error-fullname').text(data.status.fullname);
                            $('.error-password').text(data.status.password);
                            $('.error-repassword').text(data.status.repassword);
                        }else{
                            if($('.error-fullname').text() != '' || $('.error-password').text() != '' || $('.error-repassword').text() != ''){
                                $('.error-fullname').text('');
                                $('.error-password').text('');
                                $('.error-repassword').text('');
                            }
                            $('.message-register').html(`<span class="${data.res == 'success' ? 'text-success' : 'text-danger'}">${data.status}</span>`);
                        }
                    },
                    error: function(err){
                        console.log(err);
                    }
                })
            })
        })
    </script>
    @endif
    <script>
        $(document).ready(function(){
            $('#comment-news').on('submit', function(e){
                e.preventDefault();
                let formData = new FormData($(this)[0]);
                formData.append('idUser',"{{request()->cookie('id')}}")
                formData.append('idNews',$(this).data('id'))
                $.ajax({
                    method: 'POST',
                    url: '{{route("comment.comment")}}',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    processData: false,
                    contentType: false,
                    success: function(data){
                        console.log(data);
                        if(data.res == 'warning'){
                            $('.error-comment').text(data.status.comment);
                        }else{
                            if($('.error-comment').text() != ''){
                                $('.error-comment').text('');
                            }
                            // $('.message-register').html(`<span class="${data.res == 'success' ? 'text-success' : 'text-danger'}">${data.status}</span>`);
                        }
                    },
                    error: function(err){
                        console.log(err);
                    }
                })
            })
        })
    </script>
</body>

</html>