<?php
    if(isset($_POST['btn2'])){
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        mysql_query("update taikhoan set taiKhoan='$username', matKhau='$password' where taiKhoan='".$_SESSION['user']."'");
    }
?>
<?php
    $qr="select*from taikhoan where taiKhoan='".$_SESSION['user']."'";
    $user=mysql_fetch_array(mysql_query($qr));
?>
<div class="f-thongtin2" style="margin-top: 190px; ">
    <form action="" method="post" class="form-cc">
        <h2 class="title-thongtin">Thông tin đăng nhập</h2>
        <div class="row-cc">
            <label class="cc-title"><i class="fas fa-user"></i>Tên đăng nhập :</label>
            <input type="text" name="username" class="input cc-txt text-validated" value="<?=$user['taiKhoan']?>" placeholder="Nhập tài khoản" required>
        </div>
        <div class="row-cc">
            <label class="cc-title"><i class="fas fa-lock"></i>Mật khẩu :</label>
            <input name="password" type="password" class="input cc-txt text-validated" placeholder="Nhập mật khẩu" required autocomplete="off" pattern=".{6}"
					title="Mật khẩu phải từ 6 ký tự">
        </div>
        <div class="row-cc">
            <label class="cc-title"><i class="fas fa-lock"></i>Nhập lại mật khẩu :</label>
            <input name="repassword" type="password" class="input cc-txt text-validated" placeholder="Nhập lại mật khẩu" autocomplete="off" oninput="
            if(value!=password.value){document.getElementById('checkPass').
            innerHTML='Mật khẩu không trùng khớp!'}else{document.getElementById('checkPass').
            innerHTML=''}"><span id="checkPass" style="
            color:red"></span>
        </div>
        <div class="btn-thongtin2">
            <input name="btn2" type="submit" class="btn btn--primary btn-thongtin" value="Đổi mật khẩu">
        </div>
    </form>
    </div>
</div>