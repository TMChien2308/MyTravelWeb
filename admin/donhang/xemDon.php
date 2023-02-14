<?php
    if(isset($_GET['id_donhang'])){
        $id=$_GET['id_donhang'];
        mysql_query("delete from donhang where id_donhang=$id");}
?>
<?php
    $trangthai=isset($_GET['trangthai'])?$_GET['trangthai']:'';
    $qr="select*from donhang where id_trangThaiDon='$trangthai' order by id_donHang desc";
    $result=mysql_query($qr);
?>
<h1>DS đơn đăng ký [<?=$trangthai==1?'Chưa xử lý':($trangthai==2?'Đang xử lý':($trangthai==3?'Đã xử lý':($trangthai==4?'Hủy':'Hoàn thành')))?>]</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã đơn</th>
            <th>Ngày đăng ký</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
            <?php $count=1; ?>
            <?php 
                while($row_donhang=mysql_fetch_array($result)){
            ?>
            <tr>
                <td><?=$count++?></td>
                <td><?=$row_donhang['id_donHang']?></td>
                <td><?=$row_donhang['ngayDatTour']?></td>
                <td>
                    <a style="display:<?=$trangthai!=4?'block':'none'?>" class="btn btn-sm btn-info" href="?option=xemchitietdon&id_donhang=<?=$row_donhang['id_donHang']?>"><i class="icon-a fas fa-info-circle"></i>Xem chi tiết</a>
                    <a style="display:<?=$trangthai==4?'block':'none'?>" class="btn btn-sm btn-danger" href="?option=xemdonhang&id_donhang=<?=$row_donhang['id_donHang']?>" onclick="return confirm('Chắc chưa Bro?')"><i class="icon-a fas fa-backspace"></i>Xóa</a>
                </td>
            </tr>
            <?php } ?>
    </tbody>
</table>