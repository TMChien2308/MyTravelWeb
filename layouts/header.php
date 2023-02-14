<?php ob_start(); ?>
<header class="header">
    <div class="header-nav grid">
        <div class="nav-Trai">
            Hostline: +84 762 887 427
        </div>
        <div class="nav-Phai">
            <div class="nav-Phai-icon">
                <a href="#" class="icon-fb">
                    <i class="nav-icon nav-Phai-icon-link fab fa-facebook"></i>                 
                </a>
                <a href="#" class="icon-insta">
                    <i class="nav-icon nav-Phai-icon-link fab fa-instagram"></i>
                </a>
            </div>
            <?php 
                if(!isset($_SESSION['user'])){
            ?>
                <a class="DangNhap" href="dnhap.php">
                <div class="nav-Phai-DangNhap">
                    <i class="nav-icon fas fa-lock"></i>
                    Đăng Nhập
                </div>
                </a>
                <a class="DangKy" href="dnhap.php">
                <div class="nav-Phai-DangKy">
                    <i class="nav-icon fas fa-user-plus"></i>
                    Đăng Ký
                </div>
                </a>
            <?php 
                }else{ 
            ?>
                <div class="user">
                    <div class="header-navbar-user">
                        <img src="./assets/img/logo/logo.jpg" alt="" class="header-navbar-user-img">
                        <span class="header-navbar-user-name"><?php echo $_SESSION['ten']?></span>
                        <ul class="header-navbar-user-menu">
                            <li class="header-navbar-user-item header-navbar-user-item-separate">
                                <a href="?request=canhan">Thông tin tài khoản</a>
                                <a href="?request=giohang">Tour đã đăng ký</a>
                                <a href="?request=ttdangnhap">Đổi mật khẩu</a>
                                <a href="?request=logout">Đăng xuất</a>
                            </li>
                        </ul>
                    </div> 
                </div>
            <?php 
                } 
            ?>  
        </div>
    </div>
    <div class="header-menu grid">
        <div class="logo">
            <img src="./assets/img/logo/logo.png" alt="Logo">
        </div>
        <div class="menu">
            <ul class="list-menu">
                <li class="list-menu-item">
                    <a href="?request=trangchu">Trang chủ</a>
                </li>
                <li class="list-menu-item">
                    <a href="?request=tintuc">Tin tức
                    </a>
                </li>
                <li class="list-menu-item">
                    <a href="?request=tour">
                    Tour
                    <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="menu-tour">
                        <li class="menu-tour-item ">
                    <?php 
                        $theloai = DanhSachTheLoai();
                        while($row_theloai=mysql_fetch_array($theloai)){
                    ?>
                                <a href="index.php?request=search&id_theLoai=<?php echo $row_theloai['id_theLoai']?>">
                                <?=$row_theloai['tenTheLoai']?></a>
                            <?php 
                                } 
                            ?>
                        </li>
                    </ul>
                </li>
                <li class="list-menu-item">
                    <a href="?request=gioithieu">Giới thiệu</a>
                </li>
            </ul>
        </div>
    </div>
</header>
