<?php
    if(isset($_POST['btn1'])){
        $fullName=$_POST['fullName'];
        $mobile=$_POST['mobile'];
        $email=$_POST['email'];
        $diachi=$_POST['diachi'];
        mysql_query("update taikhoan set tenDayDu='$fullName', sdt='$mobile',email='$email', diachi='$diachi' where taiKhoan='".$_SESSION['user']."'");
    }
?>
<?php
    $qr="select*from taikhoan where taiKhoan='".$_SESSION['user']."'";
    $user=mysql_fetch_array(mysql_query($qr));
?>

<div class="grid" style="margin-top: 190px; ">
    <div class="f-thongtin1">
    <form action="" method="post" class="form-cc">
        <h2 class="title-thongtin">Thông tin tài khoản</h2>
        
        <div class="row-cc">
            <label class="cc-title"><i class="fas fa-user-tie"></i>Họ và tên :</label>
            <input type="text" name="fullName" class="input cc-txt text-validated" value="<?=$user['tenDayDu']?>" placeholder="Nhập họ và tên" required>
        </div>
        <div class="row-cc">
            <label class="cc-title"><i class="fas fa-phone"></i>Điện thoại :</label>
            <input type="tel" name="mobile" value="<?=$user['sdt']?>" class="input cc-txt text-validated" placeholder="Nhập số điện thoại" required>
        </div>
        <div class="row-cc">
            <label class="cc-title"><i class="fas fa-envelope"></i>Email :</label>
            <input type="email" name="email" class="input cc-txt text-validated" value="<?=$user['email']?>" placeholder="Nhập email" pattern=".+@.+(\.[a-z]{2,3}){1,2}" required>
        </div>
        <div class="row-cc">
            <label class="cc-title"><i class="fas fa-map-marker"></i>Địa chỉ :</label>
            <textarea class="input cc-txt text-validated" placeholder="Nhập địa chỉ" name="diachi"><?=$user['diachi']?></textarea>
        </div>
        <div class="row-cc">
            <input type="submit" name="btn1" value="CẬP NHẬT THÔNG TIN" class="btn btn--primary btn-thongtin" >
        </div>
    </form>

    </div>
   
</div>