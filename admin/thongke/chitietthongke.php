<?php
    $qr="select*from taikhoan a 
        join donhang b on a.id_taiKhoan=b.id_taiKhoan 
        join chitietdonhang c on b.id_donHang=c.id_donHang 
        join tour d on c.id_tour=d.id_tour 
        join chitiettrangthaidon e on b.id_trangThaiDon=e.id_trangThaiDon
        where b.id_donHang=".$_GET['id_donhang'];
    $donhang=mysql_fetch_array(mysql_query($qr));
    $ptthanhtoan=mysql_fetch_array(mysql_query("select * from phuongthucthanhtoan where id_phuongthucthanhtoan=".$donhang['id_phuongthucthanhtoan']));
?>
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
            <tr>
                <td>Trạng thái đơn hàng:</td>
                <td><?=$donhang['ten_trangThaiDon']?></td>
            </tr>
        </tbody>
    </table>
