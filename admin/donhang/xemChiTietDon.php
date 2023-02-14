<?php
    if(isset($_POST['trangthai'])){
        mysql_query("update donhang set id_trangThaiDon=".$_POST['trangthai']." where id_donHang=".$_GET['id_donhang']);
        header('location: ?option=xemdon');
    }

?>
<?php
    $qr="select*from taikhoan a join donhang b on a.id_taiKhoan=b.id_taiKhoan join chitietdonhang c on b.id_donHang=c.id_donHang join tour d on c.id_tour=d.id_tour where b.id_donHang=".$_GET['id_donhang'];
    $donhang=mysql_fetch_array(mysql_query($qr));
    $ptthanhtoan=mysql_fetch_array(mysql_query("select * from phuongthucthanhtoan where id_phuongthucthanhtoan=".$donhang['id_phuongthucthanhtoan']));
?>
<form method="POST">
    <h1>Chi tiết đơn hàng<br>
    [Mã đơn hàng:<?=$donhang['id_donHang']?>]</h1>
    <h2>Thông tin người đăng ký</h2>
    <table class="table">
        <tbody>
            <tr>
                <td>Họ và tên:</td>
                <td><?=$donhang['tenDayDu']?></td>
            </tr>
            <tr>
                <td>Điện thoại:</td>
                <td><?=$donhang['sdt']?></td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><?=$donhang['diachi']?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?=$donhang['email']?></td>
            </tr>
        </tbody>
    </table>
    <h2>Tour đăng ký</h2>
    <table class="table">
        <tbody>
            <tr>
                <td>Tên tour:</td>
                <td><?=$donhang['ten']?></td>
            </tr>
            <tr>
                <td>Hình:</td>
                <td><img style="width:300px;" src="./assets/img/slider/<?=$donhang['hinh1']?>" alt=""></td>
            </tr>
            <tr>
                <td>Đơn giá:</td>
                <td><?=number_format($donhang['gia'])?>VNĐ</td>
            </tr>
            <tr>
                <td>Phương thức thanh toán:</td>
                <td><?=$ptthanhtoan['ten_phuongthucthanhtoan']?></td>
            </tr>
        </tbody>
    </table>

    <h2>Trạng thái đơn hàng:</h2>
    <p><input type="radio" name="trangthai" value="1" <?=$donhang['id_trangThaiDon']==1?'checked':''?>>Chưa xử lý</p>
    <p><input type="radio" name="trangthai" value="2" <?=$donhang['id_trangThaiDon']==2?'checked':''?>>Đang xử lý</p>
    <p><input type="radio" name="trangthai" value="3" <?=$donhang['id_trangThaiDon']==3?'checked':''?>>Đã xử lý</p>
    <p><input type="radio" name="trangthai" value="4" <?=$donhang['id_trangThaiDon']==4?'checked':''?>>Hủy đơn</p>
    <div class=""><input type="submit" value="Xác nhận" class="btn btn-primary"></div>
</form>