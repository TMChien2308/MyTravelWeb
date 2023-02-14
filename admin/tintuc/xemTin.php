<?php
    if(isset($_GET['id_tin'])){
        $id=$_GET['id_tin'];

        mysql_query("delete from tintuc where id_tin=$id");
        
    }
?>
<?php
    $qr="select*from tintuc order by id_tin desc";
    if(isset($_POST['keyword-admin'])){
        $tukhoa=$_POST['keyword-admin'];
        $qr="select * from tintuc where ten like '%$tukhoa%' order by id_tin desc";
    }
    $result=mysql_query($qr);
?>
<style>
    .d{
        display: -webkit-box;
        max-height: 8.2rem;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
        -webkit-line-clamp: 5;
        line-height: 1.6rem;
    }
    .a{
        width: 100px;
        height: 70px;
    }
    .n{
        width: 400px;
        display: -webkit-box;
        max-height: 8.2rem;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
        -webkit-line-clamp: 5;
        line-height: 1.6rem;
    }
    .admin-tour{
        display: flex;
        margin-bottom: 10px;
    }
    .search-tour-admin{
        width: 400px;
        display: flex;
        margin-left: 400px;
    }
</style>
<h1>Danh sach tin</h1>
<div class="admin-tour">
    <div class="">
        <a class="btn btn-success" href="?option=themtin"><i class="icon-a fas fa-plus-circle"></i>Thêm Tin</a>
    </div> 
    <form action="" method="POST" class="search-tour-admin">
        <input class="form-control" name="keyword-admin" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã Tin</th>
            <th>Tên tin</th>
            <th>Ngày đăng</th>
            <th>Tóm tắt</th>
            <th>Hình ảnh</th>
            <th>Nội dung</th>
            <th>Số người xem</th>
            <th>Trạng thái</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
            <?php $count=1; ?>
            <?php 
                while($row_tin=mysql_fetch_array($result)){
            ?>
            <tr>
                <td><?=$count++?></td>
                <td><?=$row_tin['id_tin']?></td>
                <td class="d"><?=$row_tin['ten']?></td>
                <td><?=$row_tin['ngay']?></td>
                <td class="d"><?=$row_tin['tomTat']?></td>
                <td>
                    <img src="./assets/img/slider/<?=$row_tin['urlHinh']?>" alt="" class="a">
                </td>
                <td class="n"><?=$row_tin['noiDung']?></td>
                <td><?=$row_tin['soNguoiXem']?></td>
                <td><?=$row_tin['trangThai']==1?'Hiện':'Ẩn'?></td>
                <td>
                    <a class="btn btn-sm btn-info" href="?option=suatin&id_tin=<?=$row_tin['id_tin']?>">
                    <i class="icon-a fas fa-tools"></i>Sửa</a>
                    <a class="btn btn-sm btn-danger" href="?option=xemtin&id_tin=<?=$row_tin['id_tin']?>" onclick="return comfirm('Chắc chưa Bro?')">
                    <i class="icon-a fas fa-backspace"></i>Xóa</a>
                </td>
            </tr>
            <?php } ?>
    </tbody>
</table>