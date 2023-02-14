<?php 
    $qr="";
    $option='tour';
    if(isset($_GET['id_theLoai'])){
        $idtheloai=$_GET['id_theLoai'];
        $qr="select*from tour a join theloai b on a.id_theLoai=b.id_theLoai where a.trangThai=1 and a.id_theLoai=$idtheloai  order by a.id_tour desc limit 0,9";
        $option='search&id_theLoai='.$_GET['id_theLoai'];
    }
    elseif(isset($_GET['new'])){
        $qr="select*from tour a
        join theloai b on a.id_theLoai = b.id_theLoai where a.trangThai=1 order by a.id_tour desc limit 0,12";
    }
    elseif(isset($_GET['all'])){
        $qr="select*from tour a
        join theloai b on a.id_theLoai = b.id_theLoai where a.trangThai=1 limit 0,12";
    }
    elseif(isset($_POST['keyword'])){
        $tukhoa=$_POST['keyword'];
        $qr="select * from tour a join theloai b on a.id_theLoai=b.id_theLoai where a.ten like '%$tukhoa%' order by a.id_tour desc";
        // $option='search&keyword='.$_GET['keyword'];
    }
    elseif(isset($_GET['mucGia'])){
        $mucgia=$_GET['mucGia'];
        $mucgiane=preg_split('[\s]',$mucgia);
        $from=0;
        $to=0;
        if($mucgiane[0]=='Từ'){
            $from=$mucgiane[1];
        }else{
            $mucgiane1=preg_split('[\-]',$mucgiane[0]);
            $from=$mucgiane1[0];
            $to=$mucgiane1[1];
        }
        $from*=1000000;
        $to*=1000000;
        $qr="select*from tour a join theloai b on a.id_theLoai=b.id_theLoai where a.trangThai=1 and a.gia>=$from";
        if($to!=0){
            $qr="select*from tour a join theloai b on a.id_theLoai=b.id_theLoai where a. trangThai=1 and a.gia>=$from and a.gia<=$to";
        }
        $option='search&mucGia='.$_GET['mucGia'];
    }
// // $page: xem số sản phẩm ở trang số bn
//     $trang=1;
//     if(isset($_GET['trang'])){
//         $page=$_GET['trang'];
//     }
//     //Số lượng sản phẩm mỗi trang
//     $sotour1trang=3;
//     //Lấy các sản phẩm bắt đằn từ chỉ số bn trong bảng
//     $f=($trang-1)*$sotour1trang;
//     //Lấy tổng số sản phẩm
//     $tongTour=mysql_query("select*from tour a join theloai b on a.id_theLoai=b.id_theLoai  where a.trangThai=1 and a.id_theLoai=$idtheloai");
//     // //Tính tổng số trang
//     $tongTrang=ceil(mysql_num_rows($tongTour)/$sotour1trang);
//     //Lấy các sản pah
//     $qr="select * from tour a join theloai b on a.id_theLoai=b.id_theLoai  where a.trangThai=1 and a.id_theLoai=$idtheloai limit 3, $sotour1trang";


    
    $result=mysql_query($qr);

?>
 <?php require "views/tour.php" ;?>
                    
