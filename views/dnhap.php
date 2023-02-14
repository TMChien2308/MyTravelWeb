<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="./assets/dangnhap.css">
	<link rel="stylesheet" href="./assets/font/fontawesome-free-5.15.4-web/css/all.min.css">
	<link rel="" href="https://fonts.googleapis.com/css?family=Montserrat:400,800">
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="POST" class="f">
			<h1>ĐĂNG KÝ</h1>
			<input name="fullname" type="text" class="ip" placeholder="Nhập họ và tên" required value="<?=isset($fullname)?$fullname:''?>">
			<input name="username" type="text" class="ip" placeholder="Tên đăng nhập" />
			<input name="password" type="password" class="ip" placeholder="Nhập mật khẩu" required autocomplete="off" pattern=".{6}"
					title="Mật khẩu phải từ 6 ký tự">
			<input name="repassword" type="password" class="ip" placeholder="Nhập lại mật khẩu" autocomplete="off" oninput="
                    if(value!=password.value){document.getElementById('checkPass').
                    innerHTML='Mật khẩu không trùng khớp!'}else{document.getElementById('checkPass').
                    innerHTML=''}"><span id="checkPass" style="
                    color:red"></span>
			<input name="email" type="email" class="ip" placeholder="Nhập email" pattern=".+@.+(\.[a-z]{2,3}){1,2}" required
                    value="<?=isset($email)?$email:''?>">
			<button class="btn" name="dangky">Đăng ký</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="POST" class="f">
			<h1>ĐĂNG NHẬP</h1>
			<input class="ip" type="text" placeholder="Tên đăng nhập" />
			<input class="ip" type="password" placeholder="Mật khẩu" />
			<a href="#">Quên mật khẩu?</a>
			<button class="btn" name="dangnhap">Đăng nhập</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<button class="btn btn-c" id="signIn">Đăng nhập</button>
			</div>
			<div class="overlay-panel overlay-right">
				<button class="btn btn-c" id="signUp" >Đăng ký</button>
			</div>
		</div>
	</div>
</div>


</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="./assets/js/main.js"></script>
</html>
