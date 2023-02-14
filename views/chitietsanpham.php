<?php
    if(isset($_POST['content'])){
        $content=$_POST['content'];
        $idTour=$_GET['id_tour'];
        if(isset($_SESSION['user'])){
            $idtaikhoan=mysql_fetch_array(mysql_query("select*from taikhoan where taiKhoan='".$_SESSION['user']."'"));
            $idTaikhoan=$idtaikhoan['id_taiKhoan'];
            mysql_query("insert comments (id_taiKhoan,id_tour,ngayDang,noiDung) values ($idTaikhoan,$idTour,now(),'$content')");
            echo"<script>alert('Bình luận rồi đó tí nó hiện')</script>";
        }else{
            $_SESSION['content']=$content;
            echo"<script>alert('Chưa đăng nhập mà đòi comment hả bạn!');
                location='dnhap.php?id_tour=$idTour';</script>";
        }
    }
?>
<?php
    $luotdangky=mysql_num_rows(mysql_query("select*from chitietdonhang where id_tour=".$_GET['id_tour']));
?>
<div class="grid" style="    margin-top: 159px;">
<div class="containerr-1">

    <div class="box-container-1">
        <?php
        $id_tour = $_GET["id_tour"];
        settype($id_theLoai,"int");
        $ChiTietTour = ChiTietTour($id_tour);
        $row_ChiTietTour = mysql_fetch_array($ChiTietTour)
        ?>
        
        <div class="box-1 active-1">
            <img src="assets/img/slider/<?php echo $row_ChiTietTour['hinh1']?>" alt="">
        </div>
        <div class="box-1">
            <img src="assets/img/slider/<?php echo $row_ChiTietTour['hinh2']?>" alt="">
        </div>
        <div class="box-1">
            <img src="assets/img/slider/<?php echo $row_ChiTietTour['hinh3']?>" alt="">
        </div>
        <div class="box-1">
            <img src="assets/img/slider/<?php echo $row_ChiTietTour['hinh4']?>" alt="">
        </div>


    </div>
</div>

    <div class="ChiTietTour">
        <div class="ChiTietTour-trai">
            <h2 class="ChiTietTour-trai-title"><?php echo $row_ChiTietTour['ten']?></h2>
            <div class="ChiTietTour-trai-time">Thời gian: <?php echo $row_ChiTietTour['thoiGian']?></div>
            <div class="ChiTietTour-trai-SoLuong">Số lượng: <?php echo $row_ChiTietTour['soLuongNguoi']?> Khách</div>
            <div class="ChiTietTour-trai-price">Giá: <?php echo number_format($row_ChiTietTour['gia'])?> VNĐ</div>
        </div>
        <div class="ChiTietTour-phai">
            <div class="ChiTietTour-phai-NhanXet"><?=$luotdangky?> Người đã đăng ký</div>
                <a class="btn-DangKy" href="?request=order&action=order&idTour=<?=$row_ChiTietTour['id_tour']?>">
                        <i class="icon-DangKy fas fa-shopping-cart"></i>
                        <label>Đăng ký Tour</label>
                </a>
            </div>
        </div>

    <div class="ChiTietTour-duoi">
        <div class="lichtrinhdulich">
            <h2 class="lichtrinh">LỊCH TRÌNH</h2>
            <div class="lt-tt">
            <span><?php echo $row_ChiTietTour['lichTrinh']?></span>
            </div> 
        </div>

        <div class="binhluan">
            <h2>COMMENT:</h2>
            <div class="bl-66">
                    <?php
                        $idTour=$_GET['id_tour'];
                        $comment=mysql_query("select*from taikhoan a join comments b on a.id_taiKhoan=b.id_taiKhoan join tour c on b.id_tour=c.id_tour where c.id_tour=$idTour and b.trangThaiBL=1");
                        if(mysql_num_rows($comment)==0){
                            echo"<div style='color:green'>Chưa có bình luận nào!</div>";
                        }else{
                            while($row_comment=mysql_fetch_array($comment)){
                    ?>
                
                        <div class="bl-content">
                            <div class="bl">
                                <img class="bt-img" src="./assets/img/slider/<?=$row_comment['hinhNen']?>">
                                <div class="bl-name-ngay">
                                    <span class="bl-name"><?=$row_comment['tenDayDu']?></span>
                                    <span class="bl-ngay"><?=$row_comment['ngayDang']?></span>
                                </div>
                            </div>
                            <div class="bl-noidung"><?=$row_comment['noiDung']?></div>
                        </div>
                    <?php            
                            }
                        }
                    ?>
            </div>
           
            <form class="f-bl" method="post">
                <div class="f-bl-content">
                <textarea class="subject" name="content" cols="30" rows="10" placeholder="Nhập bình luận...."></textarea>
                </div>
                <div class="btn-bl">
                    <input class="btn btn--primary" type="submit" value="Đăng bình luận">
                </div>
            </form>
        </div>
    </div>
    <hr>

</div>
