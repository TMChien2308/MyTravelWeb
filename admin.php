<?php
    ob_start();
    session_start();
    require "lib/dbCon.php";
    require "lib/main.php";
    if( isset($_SESSION['user']) && $_SESSION['admin']!=0){
?>
<?php
    $chuaxuly=mysql_num_rows(mysql_query("select*from donhang where id_trangThaiDon=1"));
    $dangxuly=mysql_num_rows(mysql_query("select*from donhang where id_trangThaiDon=2"));
    $daxuly=mysql_num_rows(mysql_query("select*from donhang where id_trangThaiDon=3"));
    $huy=mysql_num_rows(mysql_query("select*from donhang where id_trangThaiDon=4"));
    $xong=mysql_num_rows(mysql_query("select*from donhang where id_trangThaiDon=5"));
?>
<style>
    .icon-a{
        margin-right: 5px;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <script src="./public/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="./assets/font/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/admin.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <table class="table table-bordered">
        <tr class="admin">
            <td class="admin-row" >
                <img class="admin-img" src="./assets/img/logo/avatar-default-icon.png" alt="">
                <label class="admin-name"><?=$_SESSION['user']?></label>
                <div class="admin-icon">
                    <a href="index.php?request=trangchu" class="icon-1 btn btn-success"><i class=" admin-icon-item fas fa-home"></i></a><br>
                    <a href="?option=logout" class="btn btn-danger"><i class="admin-icon-item  fas fa-sign-out-alt"></i></a>
                </div>
            </td>
            <td align="center">
                <label class="name">TRANG QUẢN TRỊ</label>
                <img class="admin-logo" src="./assets/img/logo/logo.jpg" alt="">
            </td>
        </tr>
        <tr>
            <td>
                <nav class="menu nav flex-column">
                    <div class="menu-admin"><i class="fas fa-bars"></i> Danh mục quản lý</div>
                    <a class="nav-link" href="?option=xemtheloai"><i class="icon-a fas fa-stream"></i>Thể loại</a>
                    <a class="nav-link" href="?option=xemtour"><i class="icon-a fas fa-map-marked-alt"></i>Tour</a>
                    <a class="nav-link" href="?option=xemtin"><i class="icon-a fas fa-newspaper"></i>Tin tức</a>
                    <a class="nav-link" href="?option=binhluan"><i class="icon-a fas fa-comments"></i>Comments</a>
                    <a class="nav-link" href="?option=taikhoan"><i class="icon-a fas fa-user-circle"></i>Tài khoản</a>
                    <a class="nav-link" href="?option=thongke"><i class="icon-a fas fa-atlas"></i>Đơn đã xong [<span style="color:red;"><?=$xong?></span>]</a>
                    <div>
                    <div class="menu-admin"><i class="fas fa-book"></i>QL đơn đăng ký</div>
                        <div><a class="nav-link" href="?option=xemdonhang&trangthai=1"><i class="icon-a fab fa-buffer"></i>Chưa xử lý [<span style="color:red;"><?=$chuaxuly?></span>]</a></div>
                        <div><a class="nav-link" href="?option=xemdonhang&trangthai=2"><i class="icon-a fab fa-buffer"></i>Đang xử lý [<span style="color:red;"><?=$dangxuly?></span>]</a></div>
                        <div><a class="nav-link" href="?option=xemdonhang&trangthai=3"><i class="icon-a fab fa-buffer"></i>Đã xử lý [<span style="color:red;"><?=$daxuly?></span>]</a></div>
                        <div><a class="nav-link" href="?option=xemdonhang&trangthai=4"><i class="icon-a fab fa-buffer"></i>Đơn đã hủy [<span style="color:red;"><?=$huy?></span>]</a></div> 
                    </div>
                </nav> 
            </td>
            <td>
                <?php
                    if(isset($_GET['option'])){
                        switch($_GET['option']){
                            case'logout':
                                unset($_SESSION['user']);
                                header('location: index.php');
                                break;
                            case'xemtheloai':
                                include"admin/theloai/xemTheLoai.php";
                                break;
                            case'themtheloai':
                                include"admin/theloai/themTheLoai.php";
                                break;
                            case'suatheloai':
                                include"admin/theloai/suaTheLoai.php";
                                break;
                            case'xemtour':
                                include"admin/tour/xemTour.php";
                                break;
                            case'themtour':
                                include"admin/tour/themTour.php";
                                break;
                            case'suatour':
                                include"admin/tour/suaTour.php";
                                break;
                            case'xemtin':
                                include"admin/tintuc/xemTin.php";
                                break;
                            case'themtin':
                                include"admin/tintuc/themTin.php";
                                break;
                            case'suatin':
                                include"admin/tintuc/suaTin.php";
                                break;
                            case'xemdonhang':
                                include"admin/donhang/xemDon.php";
                                break;
                            case'xemchitietdon':
                                include"admin/donhang/xemChiTietDon.php";
                                break;
                            case'thongke':
                                include"admin/thongke/thongke.php";
                                break;
                                case'chitietthongke':
                                    include"admin/thongke/chitietthongke.php";
                                    break;
                            case'binhluan':
                                include"admin/binhluan/xemBinhLuan.php";
                                break;
                            case'taikhoan':
                                include"admin/taikhoan/xemTaiKhoan.php";
                                break;
                        }
                    }
                ?>
            </td>
        </tr>
    </table>
    <?php
    }else{
        header('location: index.php');
    }
    ?>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

    
</script>
</body>
</html>