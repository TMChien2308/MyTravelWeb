<?php
    if(isset($_GET['id_taikhoan'])){
        $id=$_GET['id_taikhoan'];
        mysql_query("update taikhoan set trangThai=0 where id_taiKhoan=$id");
    }
    if(isset($_GET['idtaikhoan'])){
        $id=$_GET['idtaikhoan'];
        mysql_query("update taikhoan set trangThai=1 where id_taiKhoan=$id");
    }
?>
<?php
    $qr="select*from taikhoan where admin=0 order by id_taiKhoan ";
    $result=mysql_query($qr);
?>
<h1>Danh sách tài khoản</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã tài khoản</th>
            <th>Họ và tên</th>
            <th>Tên đăng nhập</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>email</th>
            <th>Trạng thái</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
            <?php $count=1; ?>
            <?php 
                while($row_taikhoan=mysql_fetch_array($result)){
            ?>
            <tr>
                <td><?=$count++?></td>
                <td><?=$row_taikhoan['id_taiKhoan']?></td>
                <td><?=$row_taikhoan['tenDayDu']?></td>
                <td><?=$row_taikhoan['taiKhoan']?></td>
                <td><?=$row_taikhoan['diachi']?></td>
                <td><?=$row_taikhoan['sdt']?></td>
                <td><?=$row_taikhoan['email']?></td>
                <td><?=$row_taikhoan['trangThai']==1?'Mở':'Khóa'?></td>
                <td>
                    <a style="display:<?=$row_taikhoan['trangThai']==1?'block':'none'?>" class="btn btn-sm btn-danger" href="?option=taikhoan&id_taikhoan=<?=$row_taikhoan['id_taiKhoan']?>" onclick="return comfirm('Chắc chưa Bro?')"><i class="icon-a fas fa-lock"></i>Khóa</a>
                    <a style="display:<?=$row_taikhoan['trangThai']==0?'block':'none'?>" class="btn btn-success" href="?option=taikhoan&idtaikhoan=<?=$row_taikhoan['id_taiKhoan']?>" onclick="return confirm('Chắc chưa Bro?')"><i class="icon-a fas fa-lock-open"></i>Mở</a>
                </td>
            </tr>
            <?php } ?>
    </tbody>
</table>