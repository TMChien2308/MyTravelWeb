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

            $img2Name=$_FILES['img2']['name'];
            $img2Temp=$_FILES['img2']['tmp_name'];
            $exp3=substr($img2Name, strlen($img1Name)-3);#jpg,png,bmp,...
            $exp4=substr($img2Name, strlen($img1Name)-4);#jepg,webp,....

            $img3Name=$_FILES['img3']['name'];
            $img3Temp=$_FILES['img3']['tmp_name'];
            $exp3=substr($img3Name, strlen($img1Name)-3);#jpg,png,bmp,...
            $exp4=substr($img3Name, strlen($img1Name)-4);#jepg,webp,....

            $img4Name=$_FILES['img4']['name'];
            $img4Temp=$_FILES['img4']['tmp_name'];
            $exp3=substr($img4Name, strlen($img1Name)-3);#jpg,png,bmp,...
            $exp4=substr($img4Name, strlen($img1Name)-4);#jepg,webp,....


            if($exp3=='jpg'||$exp3=='png'||$exp3=='bmp'||$exp3=='gif'||$exp3=="JPG"||$exp3='PNG'||$exp3=='BMP'||$exp3=='GIF'
                ||$exp4=='jpeg'||$exp4=='webp'||$exp4=='JPEG'||$exp4=="WEBP"){
                    
                $img1Name=time().'_'.$img1Name;
                $img2Name=time().'_'.$img2Name;
                $img3Name=time().'_'.$img3Name;
                $img4Name=time().'_'.$img4Name;
                
                move_uploaded_file($img1Temp,$store.$img1Name);
                move_uploaded_file($img2Temp,$store.$img2Name);
                move_uploaded_file($img3Temp,$store.$img3Name);
                move_uploaded_file($img4Temp,$store.$img4Name);
                

                mysql_query("insert tour(ten,tomTat,hinh1,hinh2,hinh3,hinh4,lichTrinh,ngay,thoiGian,xuatPhat,soLuongNguoi,gia,trangThai,id_theLoai)
                        VALUES ('$ten','$tomtat','$img1Name','$img2Name','$img3Name','$img4Name','$lichtrinh',now(),'$thoigian','$xuatphat','$soluong','$gia','$trangthai','$theloai')");
                header('location: ?option=xemtour');

            }else{
                $alert="Lỗi rồi!";
            }

           
            ////////////////////////
        }
    }
?>
<?php
    $theloai=mysql_query("select*from theloai");
?>
<h1>Thêm Tour du lịch</h1>
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
                    <option value="<?=$row_theloai['id_theLoai']?>"><?=$row_theloai['tenTheLoai']?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="">Tên Tour</label>
            <input type="text" class="form-control" name="ten" require>
        </div>

        <div class="form-group">
            <label for="">Tóm tắt</label>
            <textarea name="tomtat" id="tomtat" cols="60" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="">Hình 1</label>
            <input type="file" class="form-control" name="img1">
        </div>

        <div class="form-group">
            <label for="">Hình 2</label>
            <input type="file" class="form-control" name="img2">
        </div>

        <div class="form-group">
            <label for="">Hình 3</label>
            <input type="file" class="form-control" name="img3">
        </div>

        <div class="form-group">
            <label for="">Hình 4</label>
            <input type="file" class="form-control" name="img4">
        </div>

        <div class="form-group">
            <label for="">Lịch trình</label>
            <textarea name="lichtrinh" id="lichtrinh" cols="30" rows="10"></textarea>
            <script>CKEDITOR.replace("lichtrinh");</script>
        </div>

        <div class="form-group">
            <label for="">Thời gian</label>
            <input type="text" class="form-control" name="thoigian">
        </div>

        <div class="form-group">
            <label for="">Đia điểm xuất phát</label>
            <input type="text" class="form-control" name="xuatphat">
        </div>

        <div class="form-group">
            <label for="">Số lượng khách</label>
            <input type="text" class="form-control" name="soluong">
        </div>

        <div class="form-group">
            <label for="">Giá</label>
            <input type="number" min="100000" class="form-control" name="gia">
        </div>

        <div class="form-group">
            <label for="">Trang thái</label><br>
            <input type="radio" value="1" class="" name="trangthai" checked>Hiện
            <input type="radio" value="0" class="" name="trangthai">Ẩn
        </div>

        <div class="">
            <input type="submit" value="Thêm" class="btn btn-primary">
            <a href="?option=xemtour" class="btn btn-outline-secondary">Quay lại</a>
        </div>

    </form>
</div>