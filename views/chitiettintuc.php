<div class="grid">
    <div class="ChiTietTinTuc">
    <?php
        if(isset($_GET["idTin"])){
            $idTin = $_GET["idTin"];
            settype($idTin,"int");
        }else{
            $idTin=1;
        }
        CapNhatSoLanXemTin($idTin);
        ?>
        <?php
        $idTin = ChiTietTin($idTin);
        $row_idTin = mysql_fetch_array($idTin)
        ?>
        <div class="grid-column-8">
            <h2 class="ChiTietTinTuc-trai-title">
                <?php echo $row_idTin['ten'] ?>
            </h2>
            <div class="ChiTietTinTuc-ngay"><?php echo $row_idTin['ngay'] ?></div>
            
            <div class="ChiTietTinTuc-content">
                <?php echo $row_idTin['noiDung']?>
            </div>
            <div class="ChiTietTinTuc-luotxem">Lượt xem :<label class="ChiTietTinTuc-songuoixem"><?php echo $row_idTin['soNguoiXem'] ?> người xem</label></div>
        </div>

        <div class="grid-column-3">
            <h2 class="ChiTietTinTuc-phai-title">
                TIN NGẪU NHIÊN
            </h2>
            <?php
                $tinngaunhien = TinNgauNhien();
                while($row_tinngaunhien = mysql_fetch_array($tinngaunhien)){
            ?>
            <a href="index.php?request=chitiettintuc&idTin=<?php echo $row_tinngaunhien['id_tin']?>" class="tinngaunhien-link">
                <div class="tinngaunhien-img" style="background-image: url('./assets/img/slider/<?php echo $row_tinngaunhien['urlHinh'] ?>');">
                    <h2 class="tinngaunhien-title">
                        <?php echo $row_tinngaunhien['ten'] ?>
                    </h2>
                    <div class="tinngaunhien-ngay"><?php echo $row_tinngaunhien['ngay'] ?></div>
                </div>
            </a>
            <?php } ?>

        </div>    
    </div>
</div>


