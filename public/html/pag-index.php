<?php

session_start();

include('../PHP/insert-produto.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="author" content="Nícolas Barcelos Almeida">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All TMusic</title>
    <link rel="stylesheet" href="../CSS/index70.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:wght@500&display=swap" rel="stylesheet">
</head>

<body>

    <?php
        include('geral/headerSite.php');
    ?>

    <div class="pic-ctn">
        <img src="../midia/Fotos/banners-inicial/Tagima Anuncio Banner 1.png" alt="" class="pic">
        <img src="../midia/Fotos/banners-inicial/BANNER TECLADO ROLAND.png" alt="" class="pic">
        <img src="../midia/Fotos/banners-inicial/BATERIA BANNER.png" alt="" class="pic">
        <img src="../midia/Fotos/banners-inicial/orange_Prancheta 1.png" alt="" class="pic">
        <img src="../midia/Fotos/banners-inicial/BANNER MESA DJ DDJ.png" alt="" class="pic">
    </div>
    <div class="site-content-all">
        <div class="marcas-parceiras">

            <h2>MARCAS</h2>

            <div class="slider">
                <div class="slide-track">
                    <div class="slide">
                        <img src="../midia/Fotos/Marcas/tagima.png" height="100" width="250" alt="" />
                    </div>
                    <div class="slide">
                        <img src="../midia/Fotos/Marcas/yamaha.png" height="100" width="250" alt="" />
                    </div>
                    <div class="slide">
                        <img src="../midia/Fotos/Marcas/giannini.png" height="100" width="250" alt="" />
                    </div>
                    <div class="slide">
                        <img src="../midia/Fotos/Marcas/roland.png" height="100" width="250" alt="" />
                    </div>
                    <div class="slide">
                        <img src="../midia/Fotos/Marcas/boss.png" height="100" width="250" alt="" />
                    </div>
                    <div class="slide">
                        <img src="../midia/Fotos/Marcas/fender.png" height="100" width="250" alt="" />
                    </div>
                    <div class="slide">
                        <img src="../midia/Fotos/Marcas/sg.png" height="100" width="250" alt="" />
                    </div>
                    <div class="slide">
                        <img src="../midia/Fotos/Marcas/casio.png" height="100" width="250" alt="" />
                    </div>
                    <div class="slide">
                        <img src="../midia/Fotos/Marcas/tagima.png" height="100" width="250" alt="" />
                    </div>
                    <div class="slide">
                        <img src="../midia/Fotos/Marcas/tagima.png" height="100" width="250" alt="" />
                    </div>
                    <div class="slide">
                        <img src="../midia/Fotos/Marcas/tagima.png" height="100" width="250" alt="" />
                    </div>
                    <div class="slide">
                        <img src="../midia/Fotos/Marcas/tagima.png" height="100" width="250" alt="" />
                    </div>
                    <div class="slide">
                        <img src="../midia/Fotos/Marcas/tagima.png" height="100" width="250" alt="" />
                    </div>
                    <div class="slide">
                        <img src="../midia/Fotos/Marcas/tagima.png" height="100" width="250" alt="" />
                    </div>
                </div>

            </div><!-- slider -->

        </div>

        <h2> ULTIMOS PEDIDOS </h2>

        <div class="row">

        <?php

        include("../PHP/produtosDisplayIndex.php");

        ?>

        </div><!-- row -->

    </div>

    <?php
        include('geral/footerSite.php');
    ?>

</body>

</html>