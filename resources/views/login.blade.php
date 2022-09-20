<!doctype html>
<html lang="en">
<head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="{{asset('public/frontend/css/style_login.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="{{asset('public/backend/fonts/fontawesome-free-6.1.1-web/css/all.css')}}" rel="stylesheet">

</head>
<body class="body">
<?php
	use Illuminate\Support\Facades\Session;
?>
<a href="https://front.codes/" class="logo" target="_blank">
	<img src="{{asset('public/frontend/img/logo.png')}}" alt="">
</a>

<div class="section">
	<div class="container">
		<div class="row full-height justify-content-center">
			<div class="col-12 text-center align-self-center py-5">
				<div class="section pb-5 pt-5 pt-sm-2 text-center">
					<h6 class="mb-0 pb-3"><span>Đăng nhập </span><span>Đăng ký</span></h6>
					<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
					<label for="reg-log"></label>
					
					<div class="card-3d-wrap mx-auto" style="height: 700px !important;">
						<div class="card-3d-wrapper">
							<div class="card-front">
								<div class="center-wrap">
									<div class="section text-center">
										<h4 class="mb-4 pb-3">Đăng nhập</h4>
										<form action="{{URL::to('/log-in')}}" method="post">
											@csrf
											<div class="form-group">
												<?php
													use Illuminate\Support\Facades\Cookie;
													$message = Session::get('message');
													if(isset($message)){
														echo $message;
														Session::put('message','');
													}else if(isset($errors)){
														foreach($errors->all() as $error){
															echo $val;
														}
													}	
												?>
											</div>	
											<div class="form-group">
												<input type="email" name="email" class="form-style" @if(Cookie::has('remember_email')) value="{{Cookie::get('remember_email')}}" @else value="" @endif placeholder="Email của bạn" id="logemail" autocomplete="off">
												<i class="input-icon uil uil-at"></i>
											</div>	
											
											<div class="form-group mt-2">
												<input type="password" name="password" class="form-style" @if(Cookie::has('remember_password')) value="{{Cookie::get('remember_password')}}" @else value="" @endif placeholder="Mật khẩu của bạn" id="pw" autocomplete="off">
												<i class="fa-solid fa-eye input-eye" id="eye" onclick="showPass()"></i>
												<i class="input-icon uil uil-lock-alt" ></i>
											</div>
											<div class="form-check d-flex justify-content-start mb-4" style="text-align: start !important;">
												<input class="form-check-input me-2" type="checkbox" @if(Cookie::has('remember')) checked @elseif(Cookie::has('not_remember')) no-checked @endif id="form2Example33" name="rememberme" />
												<label class="form-check-label" for="form2Example33">
													Remember Me
												</label>
											</div>
											<div class="row mt-4">
												<div class="form-group col-6">
													<a href="{{URL::to('/login-gg')}}" class="btn btn-block btn-outline-info">Login with Google</a>
													<!-- <a href="" class="btn btn-block btn-outline-primary"> <i class="fab fa-facebook-f"></i>   Login via facebook</a> -->
												</div>
												<div class="form-group col-6">
													<!-- <a href="" class="btn btn-block btn-outline-info"> <i class="fab fa-twitter"></i>   Login via Twitter</a> -->
													<a href="{{URL::to('/login-fb')}}" class="btn btn-block btn-outline-primary">Login with FB</a>
												</div>
											</div>
											<div class="g-recaptcha mt-4" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
											<br/>
											@if($errors->has('g-recaptcha-response'))
											<span class="invalid-feedback" style="display:block">
												<strong>{{$errors->first('g-recaptcha-response')}}</strong>
											</span>
											@endif
											<input class="btn-submit mt-2" type="submit" name="dangnhap" value="Đăng nhập">
										</form>
										<p class="mb-0 mt-4 text-center"><a href="{{URL::to('/check-email')}}" class="link">Quên mật khẩu?</a></p>
									</div>
								</div>
							</div>
							<div class="card-back">
								<div class="center-wrap">
									<form action="{{URL::to('/register')}}" method="post">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Đăng ký</h4>
											@csrf
											
											<div class="form-group">
												<input type="text" name="name_user" class="form-style" placeholder="Tên đầy đủ của bạn" id="logname" autocomplete="off">
												<i class="input-icon uil uil-user"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="email" name="email_user" class="form-style" placeholder="Email của bạn" id="logemail" autocomplete="off">
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="password" class="form-style" placeholder="Mật khẩu của bạn" id="pw1" autocomplete="off">
												<i class="fa-solid fa-eye input-eye" id="eye1" onclick="showPass1()"></i>
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<div class="form-group mt-2">
												<input type="password" name="repassword" class="form-style" placeholder="Nhập lại mật khẩu" id="pw2" autocomplete="off">
												<i class="fa-solid fa-eye input-eye" id="eye2" onclick="showPass2()"></i>
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<input class="btn-submit mt-4" type="submit" name="dangky" value="Đăng ký">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function showPass(){
		let pass = document.getElementById('pw');
		let eyes = document.getElementById('eye');
		if(pass.type === 'password'){
			pass.type = 'text';
			eyes.classList.add('fa-eye-slash');
		}else{
			pass.type = 'password';
			eyes.classList.remove('fa-eye-slash');
			
		}
	}
	function showPass1(){
		let pass = document.getElementById('pw1');
		let eyes = document.getElementById('eye1');
		if(pass.type === 'password'){
			pass.type = 'text';
			eyes.classList.add('fa-eye-slash');
		}else{
			pass.type = 'password';
			eyes.classList.remove('fa-eye-slash');
			
		}
	}
	function showPass2(){
		let pass = document.getElementById('pw2');
		let eyes = document.getElementById('eye2');
		if(pass.type === 'password'){
			pass.type = 'text';
			eyes.classList.add('fa-eye-slash');
		}else{
			pass.type = 'password';
			eyes.classList.remove('fa-eye-slash');
			
		}
	}
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>

