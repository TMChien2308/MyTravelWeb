<?php
    $banner = banner(1);
    while($row_banner = mysql_fetch_array($banner)){
?>
<div class="banner" style="background-image: url('./assets/img/logo/<?php echo $row_banner['urlHinh']?>');">
<?php
    }
?>
    <div class="banner-content">
        <h1 class="content-slogan">KHÁM PHÁ</h1>
        <div class="content-search">
            <form action="?request=search" method="post">
            <input type="search" name="keyword" class="search-input" placeholder="Tìm kiếm ...." require>
            <button class="search-btn" type="submit">
                <i class="search-btn-icon fas fa-search"></i>
            </button>
            </form>
        </div>
    </div>
    <div class="search-menu">
        <ul class="search-list">
            <li class="search-item active-search"><a href="#" class="search-link"><img class="search-link-img"
                        src="./assets/img/banner/suitcase.png" alt="">HOTELS</a></li>
            <li class="search-item"><a href="#" class="search-link"><img class="search-link-img" src="./assets/img/banner/bus.png"
                        alt="">CAR RENTALS</a></li>
            <li class="search-item"><a href="#" class="search-link"><img class="search-link-img"
                        src="./assets/img/banner/departure.png" alt="">FLIGHTS</a></li>
            <li class="search-item"><a href="#" class="search-link"><img class="search-link-img" src="./assets/img/banner/island.png"
                        alt="">TRIPS</a></li>
            <li class="search-item"><a href="#" class="search-link"><img class="search-link-img" src="./assets/img/banner/cruise.png"
                        alt="">CUISES</a></li>
            <li class="search-item"><a href="#" class="search-link"><img class="search-link-img" src="./assets/img/banner/diving.png"
                        alt="">ACTIVES</a></li>
        </ul>
    </div>
</div>
<div class="gioithieu grid">
    <div class="gioithieu-name" >C-Travel</div>
    <div class="gioithieu-title">CHÀO MỪNG ĐẾN VỚI CHÚNG TÔI</div>
    <div class="gioithieu-content">Một trong những yếu tố hàng đầu để những chuyến công tác của bạn trở nên nhẹ nhàng, thoải mái chính là việc lựa chọn một khách sạn cao cấp để lưu trú trong suốt thời gian đi công tác. Những khách sạn sang trọng với nhiều dịch vụ cao cấp, gần trung tâm và nơi công tác vừa giúp cho bạn được thư thả, tận hưởng thời gian nghỉ ngơi.
    </div>
    <div class="gioithieu-link"><a href="?request=gioithieu" class="gioithieu-link-xemchitiet">Xem chi tiết</a></div>
</div>

<div class="TinMoi grid">
    <h2 class="moi-title">TIN NỔI BẬT</h2>
    <div class="TinMoi-content">

        <?php
            $tinmoinhat1=TinMoiNhat_MotTin();
            $row_tinmoinhat1 = mysql_fetch_array($tinmoinhat1);
            $tinmoinhat2= TinMoiNhat_TinHai();
            $row_tinmoinhat2 = mysql_fetch_array($tinmoinhat2);
        ?>

        <div class="TinMoi-content-1">
            <div class="TinMoi-content-img" style="background-image: url('./assets/img/slider/<?=$row_tinmoinhat1['urlHinh']?>')">
            </div>
            <div class="TinMoi-content-mota">
                <h3 class="TinMoi-content-mota-title"><?=$row_tinmoinhat1['ten']?></h3>
                <p class="TinMoi-content-mota-tomtat">
                <?=$row_tinmoinhat1['tomTat']?>
                </p>
                <a class="btn btn--primary" href="?request=chitiettintuc&idTin=<?=$row_tinmoinhat1['id_tin']?>"><i class="icon-a fas fa-info-circle"></i>Xem chi tiết</a>
            </div>
        </div>
        <div class="TinMoi-content-1">
            <div class="TinMoi-content-mota">
                <h3 class="TinMoi-content-mota-title"><?=$row_tinmoinhat2['ten']?></h3>
                <p class="TinMoi-content-mota-tomtat">
                    <?=$row_tinmoinhat2['tomTat']?>
                </p>
                <a class="btn btn--primary" href="?request=chitiettintuc&idTin=<?=$row_tinmoinhat2['id_tin']?>"><i class="icon-a fas fa-info-circle"></i>Xem chi tiết</a>
            </div>
            <div class="TinMoi-content-img" style="background-image: url('./assets/img/slider/<?=$row_tinmoinhat2['urlHinh']?>')">
            </div>                           
        </div>
    </div>
</div>

<div class="TourMoi grid">
    <h2 class="moi-title">TOUR MỚI</h2>
    <div class="TourMoi-content owl-carousel owl-theme">
        <?php 
            $tourmoinhat = TourMoiNhat();
            while($row_tourmoinhat = mysql_fetch_array($tourmoinhat)){
        ?>
        <a href="index.php?request=chitietsanpham&id_tour=<?php echo $row_tourmoinhat['id_tour']?>">
            <div class="TourMoi-box">
                <img src="./assets/img/slider/<?= $row_tourmoinhat['hinh1']?>" alt="" class="TourMoi-img">
                <div class="TourMoi-data">
                    <div class="TourMoi-data-tag">
                        <p class="TourMoi-name"><?= $row_tourmoinhat['ten']?></p>
                        <span class="TourMoi-time"><?= $row_tourmoinhat['ngay']?></span>
                    </div>
                    <div class="TourMoi-data-quocte">
                        <p class="TourMoi-quocte">Khởi hành: <?= $row_tourmoinhat['xuatPhat']?></p>
                        <p class="TourMoi-quocte-text">Giá tiền: <?= number_format($row_tourmoinhat['gia'])?> VNĐ</p>
                    </div>
                </div>
            </div>
        </a>
        <?php 
            }
        ?>
        
    </div>
</div>
