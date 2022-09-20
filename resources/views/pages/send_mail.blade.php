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
					<h6 class="mb-0 pb-3"><span>Quên mật khẩu </span></h6>
					<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
					<div class="card-3d-wrap mx-auto">
						<div class="card-3d-wrapper">
							<div class="card-front">
								<div class="center-wrap">
									<div class="section text-center">
										<h4 class="mb-4 pb-3">Email cần lấy</h4>
										<form action="{{URL::to('/send-mail')}}" method="post">
											@csrf
                                            <div class="form-group">
												<?php
													$message = Session::get('message_pass');
													if(isset($message)){
														echo $message;
													}	
												?>
											</div>	
											<div class="form-group">
												<input type="email" name="email" class="form-style" placeholder="Email của bạn" id="logemail" autocomplete="off">
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group">
												Lưu ý: 
												<span>Hãy vào gmail để kích hoạt xác minh 2 bước!</span>
											</div>
											<input class="btn-submit mt-4" type="submit" name="quenmatkhau" value="Quên mật khẩu">
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
</body>
</html>

