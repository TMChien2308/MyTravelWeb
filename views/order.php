<?php
    if(isset($_SESSION['user'])){

?>
<?php
    if(isset($_POST['fullName'])){
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

<?php
    if(isset($_POST['idPhuongthucthanhtoan'])){ 
    $idTaikhoan=$_POST['idTaikhoan'];
    $idPhuongthucthanhtoan=$_POST['idPhuongthucthanhtoan'];
    $user=mysql_fetch_array(mysql_query($qr));
    mysql_query("insert donhang (id_taiKhoan,id_Phuongthucthanhtoan,ngayDatTour) values('$idTaikhoan','$idPhuongthucthanhtoan',now())");
    $order=mysql_fetch_array(mysql_query("select id_donHang from donhang order by id_donHang desc limit 1"));
    $idDonhang=$order['id_donHang'];
    $idTour=$_GET['idTour'];
    $dongia=mysql_fetch_array(mysql_query("select gia from tour where id_tour=$idTour"));
    $gia=$dongia['gia'];
    mysql_query("insert chitietdonhang values('$idDonhang','$idTour','$gia')");
    header('location: ?request=giohang');
    }
    
?>
<div class="grid">
    <div class="od">
        <div class="credit">
            <h1>ORDER</h1>
            <form action="" method="post" class="form-cc">
                
                <div class="row-cc">
                    <label class="cc-title"><i class="fas fa-user-tie"></i>Họ và tên :</label>
                    <input type="text" name="fullName" class="input cc-txt text-validated" value="<?=$user['tenDayDu']?>" required>
                </div>
                <div class="row-cc">
                    <label class="cc-title"><i class="fas fa-phone"></i>Điện thoại :</label>
                    <input type="tel" name="mobile" value="<?=$user['sdt']?>" class="input cc-txt text-validated" required>
                </div>
                <div class="row-cc">
                    <label class="cc-title"><i class="fas fa-envelope"></i>Email :</label>
                    <input type="email" name="email" class="input cc-txt text-validated" value="<?=$user['email']?>" pattern=".+@.+(\.[a-z]{2,3}){1,2}" required>
                </div>
                <div class="row-cc">
                    <label class="cc-title"><i class="fas fa-map-marker"></i>Địa chỉ :</label>
                    <textarea class="input cc-txt text-validated" value="" name="diachi"><?=$user['diachi']?></textarea>
                </div>
                <div class="row-cc">
                    <input type="submit" name="" value="CẬP NHẬT THÔNG TIN" class="btn btn--primary" >
                </div>
            </form>
        </div>
        <?php
            $phuongthucthanhtoan=mysql_query("select*from phuongthucthanhtoan where trangThai");
        ?>
        <div class="credit-1"> 
            <h2>Phương thức thanh toán</h2>
            <form action="" method="post" class="form-cc">

                <?php 
                    $phuongthucthanhtoan=mysql_query("select*from phuongthucthanhtoan where trangThai");
                    while($row_phuongthucthanhtoan=mysql_fetch_array($phuongthucthanhtoan)){
                ?>
                    <div class="rd">
                    <input type="radio" class="rd-button" name="idPhuongthucthanhtoan" value="<?=$row_phuongthucthanhtoan['id_phuongthucthanhtoan']?>" <?=$row_phuongthucthanhtoan['id_phuongthucthanhtoan']!=1?:'checked'?>> 
                    <label class="rd-text"><?=$row_phuongthucthanhtoan['ten_phuongthucthanhtoan']?></label> 
                    </div>
                    <?php } ?>
                    <input type="hidden" name="idTaikhoan" class="" value="<?=$user['id_taiKhoan']?>" required>
                    <div class="">
                    <input type="submit" name="" value="ĐĂNG KÝ TOUR"  class="btn btn-od btn--primary " >
                </div>
            </form>
        </div>
    </div>
</div>
<?php }else{ ?>
    <script type="text/javascript">
            function Redirect() {
               window.location="dnhap.php?order=1";
            }
            setTimeout('Redirect()', 0,1);
      </script>
<?php } ?>