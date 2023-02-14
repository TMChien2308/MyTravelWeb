<?php
    $tour=mysql_fetch_array(mysql_query("select*from tour where id_tour=".$_GET['id_tour']));
?>
<?php
    if(isset($_POST['ten'])){
        $ten=$_POST['ten'];
        $trangthai=$_POST['trangthai'];
        $qr="select*from tour where ten='$ten'";
        $result=mysql_query($qr);
        if(mysql_num_rows($result)!=0){
            $alert="Tên nay có rồi!";
        }else{
            $theloai=$_POST['id_theloai'];
            $tomtat=$_POST['tomtat'];
            $lichtrinh=$_POST['lichtrinh'];
            $thoigian=$_POST['thoigian'];
            $xuatphat=$_POST['xuatphat'];
            $soluong=$_POST['soluong'];
            $gia=$_POST['gia'];
            ////Xử lý ảnh/////////
            $store="./assets/img/slider/";
            $img1Name=$_FILES['img1']['name'];
            $img1Temp=$_FILES['img1']['tmp_name'];
            $exp3=substr($img1Name, strlen($img1Name)-3);#jpg,png,bmp,...
            $exp4=substr($img1Name, strlen($img1Name)-4);#jepg,webp,....


            if($exp3=='jpg'||$exp3=='png'||$exp3=='bmp'||$exp3=='gif'||$exp3=="JPG"||$exp3='PNG'||$exp3=='BMP'||$exp3=='GIF'
                ||$exp4=='jpeg'||$exp4=='webp'||$exp4=='JPEG'||$exp4=="WEBP"){
                $img1Name=time().'_'.$img1Name;

                

                    }else{
                        $alert="File đã chọn không phải file ảnh!";
                    }
                    if(empty($img1Name)){
                        $img1Name=$tour['hinh1'];
                    }

                mysql_query("update tour set
                            ten='$ten',
                            tomTat='$tomtat',
                            hinh1='$img1Name',
                            lichTrinh='$lichtrinh',
                            thoiGian='$thoigian',
                            xuatPhat='$xuatphat',
                            soLuongNguoi='$soluong',
                            gia='$gia',
                            trangThai='$trangthai',
                            id_theLoai='$theloai'
                            where id_tour=".$_GET['id_tour']);

                header('location: ?option=xemtour');
        }
    }
?>
<style>
    .i{
        width: 300px;
        height: auto;
    }
</style>
<?php
    $theloai=mysql_query("select*from theloai");
?>
<h1>Sửa Tour du lịch</h1>

<div class="container col-md-6">
    <div class="alert alert-warning" role="alert"><?=isset($alert)?$alert:''?></div>
    <form method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="">Thể loại</label>
            <select name="id_theloai" class="form-control">
                <option hidden>--Chọn thể loại--</option>
                <?php 
                    while($row_theloai=mysql_fetch_array($theloai)){
                ?>
                    <option value="<?=$row_theloai['id_theLoai']?>" <?=$row_theloai['id_theLoai']==$tour['id_theLoai']?'selected':''?>><?=$row_theloai['tenTheLoai']?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="">Tên Tour</label>
            <input type="text" class="form-control" name="ten" value="<?=$tour['ten']?>" require>
        </div>

        <div class="form-group">
            <label for="">Tóm tắt</label>
            <textarea name="tomtat" id="tomtat" cols="60" rows="5"><?=$tour['tomTat']?></textarea>
        </div>

        <div class="form-group">
            <label for="">Hình 1</label>
            <img src="./assets/img/slider/<?=$tour['hinh1']?>" alt="" class="i">
            <input type="file" class="form-control" name="img1" value="<?=$tour['hinh1']?>">
        </div>

        <div class="form-group">
            <label for="">Lịch trình</label>
            <textarea name="lichtrinh" id="lichtrinh" cols="30" rows="10"><?=$tour['lichTrinh']?></textarea>
            <script>CKEDITOR.replace("lichtrinh");</script>
        </div>

        <div class="form-group">
            <label for="">Thời gian</label>
            <input type="text" class="form-control" name="thoigian" value="<?=$tour['thoiGian']?>">
        </div>

        <div class="form-group">
            <label for="">Đia điểm xuất phát</label>
            <input type="text" class="form-control" name="xuatphat" value="<?=$tour['xuatPhat']?>">
        </div>

        <div class="form-group">
            <label for="">Số lượng khách</label>
            <input type="text" class="form-control" name="soluong" value="<?=$tour['soLuongNguoi']?>">
        </div>

        <div class="form-group">
            <label for="">Giá</label>
            <input type="number" min="100000" class="form-control" name="gia" value="<?=$tour['gia']?>">
        </div>

        <div class="form-group">
            <label for="">Trang thái</label><br>
            <input type="radio" value="1" class="" name="trangthai" <?=$tour['trangThai']==1?'checked':''?>>Hiện
            <input type="radio" value="0" class="" name="trangthai" <?=$tour['trangThai']==0?'checked':''?>>Ẩn
        </div>

        <div class="">
            <input type="submit" value="Sửa" class="btn btn-primary">
            <a href="?option=xemtour" class="btn btn-outline-secondary">Quay lại</a>
        </div>

    </form>
</div>