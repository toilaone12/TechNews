<!doctype html>
<html lang="en">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('public/backend/css/style.css')}}">

	</head>
	<body class="img js-fullheight" style="background-image: url({{asset('public/backend/images/bg.jpg')}});">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
		      	<form action="{{URL::to('/login-admin')}}" method="POST" class="signin-form">
					@csrf
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="username" placeholder="Username" required>
		      		</div>
					<div class="form-group">
					<input id="password-field" type="password" name="password" class="form-control" placeholder="Password" required>
					<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
					</div>
					<div class="form-group" style="padding: 0 20px;">
						<?php
						use Illuminate\Support\Facades\Session;
						$message = Session::get('message');

						if(isset($message)){
							echo $message;
							Session::put("message",null);	
						}
						?>
					</div>
					<div class="form-group">
						<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
					</div>
					<div class="form-group d-md-flex">
						<div class="w-50">
							<label class="checkbox-wrap checkbox-primary">Remember Me
								<input type="checkbox" checked>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="w-50 text-md-right">
							<a href="#" style="color: #fff">Forgot Password</a>
						</div>
					</div>
				</form>
	          
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('public/backend/js/jquery.min.js')}}"></script>
  <script src="{{asset('public/backend/js/popper.js')}}"></script>
  <script src="{{asset('public/backend/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('public/backend/js/main.js')}}"></script>

	</body>
</html>

