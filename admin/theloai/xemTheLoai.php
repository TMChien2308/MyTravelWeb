<?php
    if(isset($_GET['id_theloai'])){
        $id=$_GET['id_theloai'];
        $tour=mysql_query("select*from tour where id_theLoai=$id");
        if(mysql_num_rows($tour)!=0){
            mysql_query("update theloai set trangThai=0 where id_theLoai=$id");
        }else{
            mysql_query("delete from theloai where id_theLoai=$id");
        }
    }
?>
<?php
    $qr="select*from theloai order by id_theLoai";
    $result=mysql_query($qr);
?>
<h1>Danh sách thể loại</h1>
<div class=""><a class="btn btn-success" href="?option=themtheloai"><i class="icon-a fas fa-plus-circle"></i>Thêm thể loại</a></div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Ma the loai</th>
            <th>Ten</th>
            <th>Trang thai</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
            <?php $count=1; ?>
            <?php 
                while($row_theloai=mysql_fetch_array($result)){
            ?>
            <tr>
                <td><?=$count++?></td>
                <td><?=$row_theloai['id_theLoai']?></td>
                <td><?=$row_theloai['tenTheLoai']?></td>
                <td><?=$row_theloai['trangThai']==1?'Hiện':'Ẩn'?></td>
                <td>
                    <a class="btn btn-sm btn-info" href="?option=suatheloai&id_theloai=<?=$row_theloai['id_theLoai']?>">
                    <i class="icon-a fas fa-tools"></i>Sửa</a>
                    <a class="btn btn-sm btn-danger" href="?option=xemtheloai&id_theloai=<?=$row_theloai['id_theLoai']?>" onclick="return comfirm('Chắc chưa Bro?')">
                    <i class="icon-a fas fa-backspace"></i>Xóa</a>
                </td>
            </tr>
            <?php } ?>
    </tbody>
</table>