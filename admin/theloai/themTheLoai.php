<?php
    if(isset($_POST['ten'])){
        $ten=$_POST['ten'];
        $trangthai=$_POST['trangthai'];
        $qr="select*from theloai where tenTheLoai='$ten'";
        $result=mysql_query($qr);
        if(mysql_num_rows($result)!=0){
            $alert="Tên nay có rồi!";
        }else{
            $qr="insert theloai(tenTheLoai,trangThai) values('$ten','$trangthai')";
            mysql_query($qr);
            header("location: ?option=xemtheloai");
        }
    }
?>
<h1>Thêm thể loại</h1>
<div class="container col-md-6">
    <div class="alert alert-warning"><?=isset($alert)?$alert:''?></div>
    <form method="post">
        <div class="form-group">
            <label for="">Tên thể loại</label>
            <input type="text" class="form-control" name="ten">
        </div>
        <div class="form-group">
            <label for="">Trang thái</label><br>
            <input type="radio" value="1" class="" name="trangthai" checked>Hiện
            <input type="radio" value="0" class="" name="trangthai">Ẩn
        </div>
        <div class="">
            <input type="submit" value="Thêm" class="btn btn-primary">
            <a href="?option=xemtheloai" class="btn btn-outline-secondary">Quay lại</a>
        </div>
    </form>
</div>