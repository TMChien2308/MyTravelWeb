<?php
    if(isset($_GET['huy'])){
        mysql_query("update donhang set id_trangThaiDon=4 where 1 and id_donHang=".$_GET['id_donhang']);
    }
    if(isset($_GET['xacnhan'])){
        mysql_query("update donhang set id_trangThaiDon=5,ngayHoanThanh=now() where 1 and id_donHang=".$_GET['id_donhang']);
    }
?>
<style>
    .gio-img{
        margin-left: 350px;
    }
</style>
<div class="grid" style="margin-top: 190px; ">
    <h1>CÁC TOUR ĐÃ ĐĂNG KÝ</h1>

    <?php $thongtingiohang = ThongTinGioHang();
    if(mysql_num_rows($thongtingiohang)==0){?>
        <img src="./assets/img/logo/giohangtrong.jpg" alt="" class="gio-img">
    <?php }else{?>
    <table class="table-gio">
    <thead>
            <tr>
                <th class="row-gio gio">STT</th>
                <th class="row-gio gio">Người đăng ký</th>
                <th class="row-gio gio">Tên tour</th>
                <th class="row-gio gio">Đơn giá</th>
                <th class="row-gio gio">Thơi gian</th>
                <th class="row-gio gio" >Điểm xuất phát</th>
                <th class="row-gio gio">Hình ảnh</th>
                <th class="row-gio gio">Ngày đăng ký</th>
                <th class="row-gio gio">Phương thức thanh toán</th>
                <th class="row-gio gio">Trạng thái</th>
                <th class="row-gio gio">Action</th>
            </tr>
        </thead>
    <form method="post">
        <tbody>
                <?php $count=1; ?>
                <?php 
                    // $thongtingiohang = ThongTinGioHang();
                    while($row_thongtingiohang=mysql_fetch_array($thongtingiohang)){
                ?>
                <tr>
                    <td class="row-gio"><?=$count++?></td>
                    <td class="row-gio"><?=$row_thongtingiohang['tenDayDu']?></td>
                    <td class="row-gio"><?=$row_thongtingiohang['ten']?></td>
                    <td class="row-gio"><?= number_format($row_thongtingiohang['gia'])?> VNĐ</td>
                    <td class="row-gio"><?=$row_thongtingiohang['thoiGian']?></td>
                    <td class="row-gio"><?=$row_thongtingiohang['xuatPhat']?></td>
                    <td class="row-gio">
                        <img src="./assets/img/slider/<?=$row_thongtingiohang['hinh1']?>" alt="" class="img-gio">
                    </td>
                    <td class="row-gio"><?=$row_thongtingiohang['ngayDatTour']?></td>
                    <td class="row-gio"><?=$row_thongtingiohang['ten_phuongthucthanhtoan']?></td>
                    <td class="row-gio"><?=$row_thongtingiohang['ten_trangThaiDon']?></td>
                    <td class="row-gio">
                        <a style="display:<?=$row_thongtingiohang['id_trangThaiDon']!=5&&$row_thongtingiohang['id_trangThaiDon']!=4?'block':'none'?>" class="btn-huy" href="?request=giohang&id_donhang=<?=$row_thongtingiohang['id_donHang']?>&huy">
                        <i class="icon-a fas fa-times-circle"></i>Hủy</a>
                        <a style="display:<?=$row_thongtingiohang['id_trangThaiDon']==3?'block':'none'?>" class="btn-xacnhan" href="?request=giohang&id_donhang=<?=$row_thongtingiohang['id_donHang']?>&xacnhan">
                        <i class="fas fa-check-circle"></i>
                        Xong
                        </a>
                    </td>
                </tr>
    
                <?php } ?>

        </tbody> 
        </form>
    </table>
    <?php } ?>
</div>