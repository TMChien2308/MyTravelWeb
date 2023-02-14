<?php

function TourMoiNhat(){
    $qr = "
            select*from tour
            order by id_tour desc
            limit 0,6
    ";
    return mysql_query($qr);
}

function TinMoiNhat_MotTin(){
    $qr = "
            select*from tintuc
            order by id_tin desc
            limit 0,1
    ";
    return mysql_query($qr);
}

function TinMoiNhat_TinHai(){
    $qr = "
            select*from tintuc
            order by id_tin desc
            limit 1,2
    ";
    return mysql_query($qr);
}

function TinMoiNhat_BaTin(){
    $qr = "
            select*from tintuc
            order by id_tin desc
            limit 1,3
    ";
    return mysql_query($qr);
}

function TinXemNhieu(){
    $qr = "
            select*from tintuc
            order by soNguoiXem desc
            limit 0,3
    ";
    return mysql_query($qr);
}

function banner($vitri){
    $qr = "
            select*from banner 
            where vitri = $vitri
    ";
    return mysql_query($qr);
}

function DanhSachtheLoai(){
    $qr = "
            select*from theloai where trangThai=1
    ";
    return mysql_query($qr);
}

function Ten(){
    $qr = "select ten from taikhoan";
    return mysql_query($qr);
}

function ChiTietTour($id_tour){
    $qr = "select * from tour
            where id_tour=$id_tour";
    return mysql_query($qr);
}

function ChiTietTin($idTin){
    $qr = "select*from tintuc
            where id_tin=$idTin";
    return mysql_query($qr);
        
}

function TinNgauNhien(){
    $qr = "select * from tintuc
            order by rand() limit 3";
    return mysql_query($qr);
}

function CapNhatSoLanXemTin($idTin){
    $qr=" update tintuc set soNguoiXem = soNguoiXem + 1
    where id_tin=$idTin";
    mysql_query($qr);
}

function CacMucGia(){
    $qr="select * from gia where trangThai=1";
    return mysql_query($qr);
}

function ThongTinGioHang(){
    $qr="select*from 
         taikhoan                 a
    join donhang			 b on a.id_taiKhoan			  =  b.id_taiKhoan
    join chitietdonhang 	 c on b.id_donHang			  =  c.id_donHang
    join phuongthucthanhtoan d on d.id_phuongthucthanhtoan=  b.id_phuongthucthanhtoan
    join tour 				 e on e.id_tour               =  c.id_tour 
    join chitiettrangthaidon f on f.id_trangThaiDon       =  b.id_trangThaiDon  
    where a.taiKhoan='".$_SESSION['user']."'     order by ngayDatTour desc";
    return mysql_query($qr);
}

// function PhanTrang($from,$sotinmottrang){
//     $qr="
//         select * from tour order by id_tour desc limit $from, $sotinmottrang
//     ";
//     return mysql_query($qr);
// }
?>