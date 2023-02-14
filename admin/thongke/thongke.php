<?php 
    $qr="select*from donhang a 
        join chitietdonhang b on a.id_donHang=b.id_donHang 
        join taikhoan c on a.id_taiKhoan=c.id_taiKhoan
        where a.id_trangThaiDon='5' order by a.ngayDatTour desc";
    if(isset($_GET['a'])){
        $qr="select*from donhang a 
        join chitietdonhang b on a.id_donHang=b.id_donHang 
        join taikhoan c on a.id_taiKhoan=c.id_taiKhoan
        where year(a.ngayHoanThanh)=year(CURRENT_DATE())
        AND month(a.ngayHoanThanh)=month(CURRENT_DATE()) 
        and a.id_trangThaiDon=5 GROUP BY a.id_donHang desc";
    }
    $result=mysql_query($qr);
?>
<style>
    .ad{
        display: flex;
        justify-content: space-between;
        margin-right: 20px;
        margin-bottom: 20px;
    }
    h1{
        line-height: 2rem;
    }
</style>
<div class="ad"><h1>DS đơn đã hoàn tất</h1>
<a class="btn btn-success" href="?option=thongke&a"><i class="icon-a fas fa-chart-bar"></i>Thống kê tháng mới nhất</a></div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Người đăng ký</th>
            <th>Điện thoại</th>
            <th>Mã đơn</th>
            <th>Ngày đăng ký</th>
            <th>Ngày hoàn thành</th>
            <th>Giá</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
            <?php $count=1; ?>
            <?php 
                    $total=0;
                while($row_donhang=mysql_fetch_array($result)){
                    $subtotal =$row_donhang['gia'];
					$total+=$subtotal;
            ?>
            <tr>
                <td><?=$count++?></td>
                <td><?=$row_donhang['tenDayDu']?></td>
                <td><?=$row_donhang['sdt']?></td>
                <td><?=$row_donhang['id_donHang']?></td>
                <td><?=$row_donhang['ngayDatTour']?></td>
                <td><?=$row_donhang['ngayHoanThanh']?></td>
                <td><?=number_format($row_donhang['gia'])?> VNĐ</td>
                <td>
                    <a class="btn btn-sm btn-info" href="?option=chitietthongke&id_donhang=<?=$row_donhang['id_donHang']?>"><i class="icon-a fas fa-info-circle"></i>Xem chi tiết</a>
                </td>
            </tr>
            
            <?php } ?>
            <tr>
                <span><b>Tổng tiền :</b></span>
                <?=number_format($total)?> VNĐ
            </tr>
    </tbody>
</table>