<div class="grid " style="margin-top: 140px;">
        <!-- Row là dòng -->
    <div class="grid-row app-content">
        <!-- Phần này ám chỉ các cột nằm trong 1 dòng -->
        <div class="grid-column-2">
            <nav class="category">
                <h3 class="category-heading">  
                <i class="fas fa-bars"></i>                  
                    Danh mục
                </h3>
                <ul class="category-list">
                    <?php 
                        $theloai = DanhSachTheLoai();
                        while($row_theloai=mysql_fetch_array($theloai)){
                    ?>
                    <li class="category-item">
                        <a href="index.php?request=search&id_theLoai=<?php echo $row_theloai['id_theLoai']?>"
                          
                         class="category-item-link" style="text-transform:capitalize;"><?php echo $row_theloai['tenTheLoai']?>
                         </a>
                    </li>
                    <?php
                        }
                    ?>
            </nav>
        </div>

        <div class="grid-column-10">
            <div class="home-filter">
                <span class="home-filter-label">Sắp xếp theo</span>
                <a href="index.php?request=search&all" class="btn home-filter-btn btn--primary">Tất cả</a>
                <a href="index.php?request=search&new" class="btn home-filter-btn">Mới nhất</a>
                <a href="" class="btn home-filter-btn btn--disabled">Ưa chuộng</a>

                <div class="select-input">
                    <span class="select-input-label">
                        Giá
                    </span>
                    <i class="select-input-icon fas fa-angle-down"></i>
                    <ul class="select-input-list">
                        <?php 
                            $cacmucgia = CacMucGia();
                            while($row_cacmucgia = mysql_fetch_array($cacmucgia)){
                        ?>
                        <li class="select-input-item">
                            <a href="?request=search&mucGia=<?=$row_cacmucgia['khoangGia']?>" class="select-input-link"><?=$row_cacmucgia['khoangGia']?></a>                                        
                        </li>
                        <?php } ?>
                        
                    </ul>
                </div>
                <div class="home-filter-page">
                    <span class="home-filter-page-num">
                        <span class="home-filter-page-current">1</span>
                        /14
                    </span>
                    <div class="home-filter-page-control">
                        <a href="" class="home-filter-page-btn home-filter-page-btn-disabled">
                            <i class="home-filter-page-icon fas fa-angle-left"></i>
                        </a>
                        <a href="" class="home-filter-page-btn">
                            <i class="home-filter-page-icon fas fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="home-product">
                <div class="grid-row">                       
                        <?php if(mysql_num_rows($result)==0){ ?>
                            <img width="1000px" src="./assets/img/logo/chuacotournao.png" alt="">
                        <?php }else{ ?>
                            <?php while($rs = mysql_fetch_array($result)){ ?>
                    <div class="grid-column-2-4">
                        <a href="index.php?request=chitietsanpham&id_tour=<?php echo $rs['id_tour']?>" class="home-product-item">
                            <div class="home-product-item-img" style="background-image: url('./assets/img/slider/<?php echo $rs['hinh1']?>');"></div>
                            <div class="home-product-item-datetime">
                                <div class="home-product-item-date"><?php echo $rs['ngay']?></div>
                                <div class="home-product-item-time"><?php echo $rs['thoiGian']?></div>
                            </div>
                            <div class="home-product-item-title"><?php echo $rs['ten']?></div>
                            <div class="home-product-item-origan-start">Nơi xuất phát: <?php echo $rs['xuatPhat']?></div>
                            <div class="home-product-item-people">Số lượng: <?php echo $rs['soLuongNguoi']?> người</div>
                            <div class="home-product-item-price"><?php echo number_format($rs['gia'])?> vnđ</div>
                            <button class="btn home-product-item-details btn--primary"><i class="icon-a fas fa-info-circle"></i> Xem chi tiết</button>
                            <div class="home-product-item-comment"><?=$rs['tenTheLoai']?></div>
                        </a>
                    </div>
                    <?php }?>
                            <?php } ?>

                </div>
            </div>
                    <!-- <div class="pages"> -->
                <!-- <?php for($i=1;$i<=$tongTrang;$i++):?> -->
                    <!-- // PHẦN HIỂN THỊ PHÂN TRANG -->
                               
                                <!-- <a href="?request=<?=$option?>&trang=<?=$i?>"><?=$i?></a> -->
                               
                <!-- <?php endfor; ?> -->
                <!-- </div> -->
        </div> 

    </div> 
</div>
<script>
    const homefilterbtn = document.querySelectorAll('.home-filter-btn');
    function activeLink(){
        homefilterbtn.forEach((item) =>
        item.classList.remove('btn--primary'));
        this.classList.add('btn--primary');
    }
    homefilterbtn.forEach((item) =>
    item.addEventListener("click",activeLink));
</script>