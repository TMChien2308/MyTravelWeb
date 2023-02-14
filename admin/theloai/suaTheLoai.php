<?php
    $theloai=mysql_fetch_array(mysql_query("select*from theloai where id_theLoai=".$_GET['id_theloai']));
?>

<?php
    if(isset($_POST['ten'])){
        $ten=$_POST['ten'];
        $qr="select*from theloai where tenTheLoai='$ten' and id_theLoai!=".$theloai['id_theLoai'];
        $result=mysql_query($qr);
        if(mysql_num_rows($result)!=0){
            $alert="Thể loại này có rồi! Kiếm gì mới hơn đi.";
        }else{
            $trangthai=$_POST['trangthai'];
            $qr="update theloai set tenTheLoai='$ten',trangThai='$trangthai'where id_theLoai=".$theloai['id_theLoai'];
            mysql_query($qr);
            header("location: ?option=xemtheloai");
        }
    }
?>
<h1>Sửa thể loại</h1>
<div class="container col-md-6">
    <div class="alert alert-warning" role="alert"><?=isset($alert)?$alert:''?></div>
    <form method="post">
        <div class="form-group">
            <label for="">Tên thể loại</label>
            <input type="text" class="form-control" name="ten" value="<?=$theloai['tenTheLoai']?>">
        </div>
        <div class="form-group">
            <label for="">Trang thái</label><br>
            <input type="radio" value="1" class="" name="trangthai" <?=$theloai['trangThai']==1?'checked':''?>>Hiện
            <input type="radio" value="0" class="" name="trangthai" <?=$theloai['trangThai']==0?'checked':''?>>Ẩn
        </div>
        <div class="">
            <input type="submit" value="Sửa" class="btn btn-primary">
            <a href="?option=xemtheloai" class="btn btn-outline-secondary">Quay lại</a>
        </div>
    </form>
</div>