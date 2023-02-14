<?php
    if(isset($_GET['id_comment'])){
        $qr="update comments set trangThaiBL=0 where id_comment=".$_GET['id_comment'];
        mysql_query($qr);
    }
    if(isset($_GET['id_comments'])){
        $qr="update comments set trangThaiBL=1 where id_comment=".$_GET['id_comments'];
        mysql_query($qr);
    }
?>
<?php
    $qr="select*from comments a join taikhoan b on a.id_taiKhoan=b.id_taiKhoan join tour c on a.id_tour=c.id_tour order by id_comment";
    $result=mysql_query($qr);
?>
<h1>Danh sách bình luận</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Người đăng</th>
            <th>Tour</th>
            <th>Nội dung</th>
            <th>Ngày đăng</th>
            <th>Trang thai</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
            <?php $count=1; ?>
            <?php 
                while($row_binhluan=mysql_fetch_array($result)){
            ?>
            <tr>
                <td><?=$count++?></td>
                <td><?=$row_binhluan['tenDayDu']?></td>
                <td><?=$row_binhluan['ten']?></td>
                <td><?=$row_binhluan['noiDung']?></td>
                <td><?=$row_binhluan['ngayDang']?></td>
                <td><?=$row_binhluan['trangThaiBL']==1?'Hiện':'Ẩn'?></td>
                <td>
                    <a style="display:<?=$row_binhluan['trangThaiBL']==1?'block':'none'?>" class="btn btn-sm btn-danger" href="?option=binhluan&id_comment=<?=$row_binhluan['id_comment']?>" onclick="return comfirm('Chắc chưa Bro?')">
                    <i class="icon-a fas fa-eye-slash"></i>Ẩn</a>
                    <a style="display:<?=$row_binhluan['trangThaiBL']==0?'block':'none'?>" class="btn btn-sm btn-success" href="?option=binhluan&id_comments=<?=$row_binhluan['id_comment']?>" onclick="return comfirm('Chắc chưa Bro?')">
                    <i class="icon-a fas fa-eye"></i>Hiện</a>
                </td>
            </tr>
            <?php } ?>
    </tbody>
</table>