<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="./assets/font/fontawesome-free-5.15.4-web/css/all.min.css">
	<link rel="" href="https://fonts.googleapis.com/css?family=Montserrat:400,800">
</head>
<style>
* {
	box-sizing: border-box;
}

body {
	background: #f6f5f7;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 100vh;
	margin: -20px 0 50px;
}

h1 {
	font-weight: bold;
	margin: 0;
}

h2 {
	text-align: center;
}




a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
}

.btn {
	border-radius: 20px;
	border: 1px solid #FF4B2B;
	background-color: #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 30px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

.btn:active {
	transform: scale(0.95);
}

.btn:focus {
	outline: none;
}

.btn.btn-c {
	background-color: transparent;
	border-color: #FFFFFF;
}

.f {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

.ip {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

.container {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	min-height: 480px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.sign-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}

.container.right-panel-active .sign-in-container {
	transform: translateX(100%);
}

.sign-up-container {
	left: 0;
	width: 50%;
	opacity: 0;
	z-index: 1;
}

.container.right-panel-active .sign-up-container {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}

@keyframes show {
	0%, 49.99% {
		opacity: 0;
		z-index: 1;
	}
	
	50%, 100% {
		opacity: 1;
		z-index: 5;
	}
}

.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

.container.right-panel-active .overlay-container{
	transform: translateX(-100%);
}

.overlay {
	background: #fe2214;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
	transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
  	transform: translateX(50%);
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}


.overlay-right {
	right: 0;
	transform: translateX(0);
}


.social-container {
	margin: 20px 0;
}

.social-container .social {
	border: 1px solid #DDDDDD;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
}
.tb{
	font-size: 0.9rem;
	color: red;
}
</style>
<?php
    ob_start();
    session_start();
    require "lib/dbCon.php";
    require "lib/main.php";        
?>
<?php
    if(isset($_POST["dangnhap"])){
        $username=$_POST["Lusername"];
        $password=$_POST["Lpassword"];
        $password=md5($password);
        $qr="select * from taikhoan where taiKhoan = '$username'
        and matKhau='$password' and trangThai=1";
        $user = mysql_query($qr);
        if(mysql_num_rows($user)==0){
            $alert="Đăng nhập không thành công!";
        }else{
            $row=mysql_fetch_array($user);
            $_SESSION['user']=$username;
            $_SESSION['hinhnen']=$row['hinhNen'];
            $_SESSION["ten"]=$row['tenDayDu'];
            $_SESSION["admin"]=$row['admin'];
            if($_GET['id_tour']){
            $idTour=$_GET['id_tour'];
            echo"<script>alert('Rồi á giờ qua bình luận đi');location='index.php?request=chitietsanpham&id_tour=$idTour';</script>";  
            }else{
                header('location: .');
            }
        }
    }
?>
<?php
    if(isset($_POST['dangky'])){
        $username=$_POST['username'];
        $query="select*from taikhoan where taiKhoan='$username'";
        $result=mysql_query($query);
        $password=md5($_POST['password']);
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        if(mysql_num_rows($result)!=0){
            $aler="Tên đăng nhập đã có sẵn!";
        }else{
            $query="insert taikhoan(taiKhoan,matKhau,tenDayDu,email)
            values('$username','$password','$fullname','$email')";
            mysql_query($query);
            header('location: dnhap.php');
            exit();
        }
    }
?>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="POST" class="f">
			<h1>ĐĂNG KÝ</h1>
			<div class="tb"><?=isset($aler)?$aler:''?></div>
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
			<div class="">
			<button class="btn" name="dangky">Đăng ký</button>
			<a href="index.php" class="btn">Quay lại</a>
			</div>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="POST" class="f">
			<h1>ĐĂNG NHẬP</h1>
			
			<input class="ip" name="Lusername" type="text" placeholder="Tên đăng nhập" />
			<input class="ip" name="Lpassword" type="password" placeholder="Mật khẩu" />
			<div class="tb"><?=isset($alert)?$alert:''?></div>
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
<script>
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});

	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</html>
