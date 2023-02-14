<?php
    if(isset($_POST['ten'])){
        $ten=$_POST['ten'];
        $trangthai=$_POST['trangthai'];
        $qr="select*from tintuc where ten='$ten'";
        $result=mysql_query($qr);
        if(mysql_num_rows($result)!=0){
            $alert="Tên nay có rồi!";
        }else{
            $tomtat=$_POST['tomtat'];
            $noidung=$_POST['noidung'];
            ////Xử lý ảnh/////////
            $store="./assets/img/slider/";
            $imgName=$_FILES['img']['name'];
            $imgTemp=$_FILES['img']['tmp_name'];
            $exp3=substr($imgName, strlen($imgName)-3);#jpg,png,bmp,...
            $exp4=substr($imgName, strlen($imgName)-4);#jepg,webp,....

            if($exp3=='jpg'||$exp3=='png'||$exp3=='bmp'||$exp3=='gif'||$exp3=="JPG"||$exp3='PNG'||$exp3=='BMP'||$exp3=='GIF'
                ||$exp4=='jpeg'||$exp4=='webp'||$exp4=='JPEG'||$exp4=="WEBP"){
                $img1Name=time().'_'.$img1Name;
                move_uploaded_file($imgTemp,$store.$imgName);
                mysql_query("insert tintuc(ten,tomTat,urlHinh,noiDung,soNguoiXem,ngay,trangThai)
                        VALUES ('$ten','$tomtat','$imgName','$noidung',0,now(),'$trangthai')");
                header('location: ?option=xemtin');

            }else{
                $alert="lỗi rồi!";
            }
        }
    }
?>
<h1>Thêm Tin</h1>
<div class="container col-md-6">

    <div class="alert alert-warning" role="alert"><?=isset($alert)?$alert:''?></div>

    <form method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="">Tên</label>
            <input type="text" class="form-control" name="ten" require>
        </div>

        <div class="form-group">
            <label for="">Tóm tắt</label>
            <textarea name="tomtat" id="tomtat" cols="70" rows="10"></textarea>
        </div>

        <div class="form-group">
            <label for="">Hình</label>
            <input type="file" class="form-control" name="img">
        </div>

        <div class="form-group">
            <label for="">Nôi dung</label>
            <textarea name="noidung" id="noidung" cols="30" rows="10"></textarea>
            <script>CKEDITOR.replace("noidung");</script>
        </div>

        <div class="form-group">
            <label for="">Trang thái</label><br>
            <input type="radio" value="1" class="" name="trangthai" checked>Hiện
            <input type="radio" value="0" class="" name="trangthai">Ẩn
        </div>

        <div class="">
            <input type="submit" value="Thêm" class="btn btn-primary">
            <a href="?option=xemtin" class="btn btn-outline-secondary">Quay lại</a>
        </div>

    </form>
</div>