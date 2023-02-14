<div class="grid" style="margin-top: 190px;">
<h2 class="moi-title">
    MỚI NHẤT
</h2>
<div class="moi">
    
    <div class="moi-trai">
    <?php
        $tinmoinhat_mottin = TinMoiNhat_MotTin();
        $row_tinmoinhat_mottin = mysql_fetch_array($tinmoinhat_mottin)
    ?>
        <div class="moi-trai-img">
            <img  alt="" class="moi-trai-img-1" src="assets/img/slider/<?php echo $row_tinmoinhat_mottin['urlHinh']?>"/>
        </div>
        <a href="index.php?request=chitiettintuc&idTin=<?php echo $row_tinmoinhat_mottin['id_tin']?>">
            <h2 class="moi-trai-title">
            <?php echo $row_tinmoinhat_mottin['ten']?> 
            </h2>
        </a>
        <p class="moi-trai-tomtat">
        <?php echo $row_tinmoinhat_mottin['tomTat']?>
        </p>
        <div class="moi-trai-ngay">
        <?php echo $row_tinmoinhat_mottin['ngay']?>
        </div>
    </div>
    <div class="moi-phai">
    <?php
        $batinmoi = TinMoiNhat_BaTin();
        while($row_batinmoi = mysql_fetch_array($batinmoi)){
    ?>
        <div class="moi-phai-3">
            <div class="moi-phai-img">
                <img src="./assets/img/slider/<?php echo $row_batinmoi['urlHinh']?>" alt="" class="moi-phai-img-3">
            </div>
            <div class="moi-phai-conteiner">
                <a href="index.php?request=chitiettintuc&idTin=<?php echo $row_batinmoi['id_tin']?>">
                    <h2 class="moi-phai-title">
                    <?php echo $row_batinmoi['ten']?>  
                    </h2>
                </a>
                <div class="moi-phai-tomtat">
                <?php echo $row_batinmoi['tomTat']?>
                </div>
                <div class="moi-phai-ngay">
                <?php echo $row_batinmoi['ngay']?>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
        
        
    </div>
</div>
<h2 class="moi-title">
    XEM NHIỀU
</h2>
<div class="grid-row">
    <?php
        $tinxemnhieu = TinXemNhieu();
        while($row_tinxemnhieu = mysql_fetch_array($tinxemnhieu)){
    ?>
    <div class="grid-column-2-4">
        <a href="index.php?request=chitiettintuc&idTin=<?php echo $row_tinxemnhieu['id_tin']?>" class="xemnhieu-link">
            <div class="xemnhieu-img" style="background-image: url('./assets/img/slider/<?php echo $row_tinxemnhieu['urlHinh']?>');">
                <h2 class="xemnhieu-title">
                    <?php echo $row_tinxemnhieu['ten']?>
                </h2>
                <div class="xemnhieu-ngay"><?php echo $row_tinxemnhieu['ngay']?></div>
                <div class="xemnhieu-luotxem"><?php echo $row_tinxemnhieu['soNguoiXem']?> &nbsp; người đã xem</div>
            </div>
        </a>
    </div>
    <?php
        }
    ?>
    
</div>