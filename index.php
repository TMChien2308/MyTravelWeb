<?php ob_start(); ?>
<?php
    session_start();
    require "lib/dbCon.php";
    require "lib/main.php";
?>
<?php 
    $qr = "select*from tour a
    join theloai b on a.id_theLoai = b.id_theLoai where a.trangThai=1 limit 0,12";
    $result = mysql_query($qr);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C-Travel</title>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/OwlCarousel/owl.carousel.css">
    <link rel="stylesheet" href="./assets/OwlCarousel/owl.theme.default.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>
    <div class="main">
        <section>
            <?php require "layouts/header.php" ;?>
        </section>

        <section>
            <?php require "layouts/content.php" ;?> 
        </section>            

        <footer>
            <?php require "layouts/footer.php" ;?>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="js/jquery.number.js"></script>
    <script src="./assets/js/owl.carousel.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>