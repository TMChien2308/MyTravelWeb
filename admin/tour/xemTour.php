<?php
    if(isset($_GET['id_tour'])){
        $id=$_GET['id_tour'];
        $tour=mysql_query("select*from chitietdonhang where id_tour=$id");
        if(mysql_num_rows($tour)!=0){
            mysql_query("update tour set trangThai=0 where id_tour=$id");
        }else{
            mysql_query("delete from tour where id_tour=$id");
        }
    }
?>
<?php
    $qr="select*from tour order by id_tour desc";
    if(isset($_POST['keyword-admin'])){
        $tukhoa=$_POST['keyword-admin'];
        $qr="select * from tour where ten like '%$tukhoa%' order by id_tour desc";
    }
    $result=mysql_query($qr);
?>
<style>
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
<h1>Danh sách Tour du lịch</h1>  
<div class="admin-tour">
    <div class="">
        <a class="btn btn-success" href="?option=themtour"><i class="icon-a fas fa-plus-circle"></i>Thêm Tour</a>
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
            <th>Mã Tour</th>
            <th>Tên Tour du lịch</th>
            <th>Ngày đăng</th>
            <th>Tóm tắt</th>
            <th>Thời gian</th>
            <th>Hình ảnh</th>
            <th>Điểm xuất phát</th>
            <th>Lịch trình</th>
            <th>Số lượng người</th>
            <th>Giá</th>
            <th>Trạng thái</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
            <?php $count=1; ?>
            <?php 
                while($row_tour=mysql_fetch_array($result)){
            ?>
            <tr>
                <td><?=$count++?></td>
                <td><?=$row_tour['id_tour']?></td>
                <td class="d"><?=$row_tour['ten']?></td>
                <td><?=$row_tour['ngay']?></td>
                <td class="d"><?=$row_tour['tomTat']?></td>
                <td><?=$row_tour['thoiGian']?></td>
                <td class="s">
                    <div class="anh">
                        <img src="./assets/img/slider/<?=$row_tour['hinh1']?>" alt="" class="a">
                        <img src="./assets/img/slider/<?=$row_tour['hinh2']?>" alt="" class="a">
                    </div>
                    <div class="anh">
                        <img src="./assets/img/slider/<?=$row_tour['hinh3']?>" alt="" class="a">
                        <img src="./assets/img/slider/<?=$row_tour['hinh4']?>" alt="" class="a">
                    </div>
                </td>
                <td><?=$row_tour['xuatPhat']?></td>
                <td  class="d"><?=$row_tour['lichTrinh']?></td>

                <td><?=$row_tour['soLuongNguoi']?></td>
                <td><?=number_format($row_tour['gia'])?> VNĐ</td>
                <td><?=$row_tour['trangThai']==1?'Hiện':'Ẩn'?></td>
                <td>
                    <a class="btn btn-sm btn-info" href="?option=suatour&id_tour=<?=$row_tour['id_tour']?>"><i class="icon-a fas fa-tools"></i>Sửa</a>
                    <a class="btn btn-sm btn-danger" href="?option=xemtour&id_tour=<?=$row_tour['id_tour']?>" onclick="return confirm('Chắc chưa Bro?')"><i class="icon-a fas fa-backspace"></i>Xóa</a>
                </td>
            </tr>
            <?php } ?>
    </tbody>
</table>