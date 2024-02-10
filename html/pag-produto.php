<?php

session_start();
include('../PHP/produtos.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="author" content="Nícolas Barcelos Almeida">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All TMusic</title>
    <link rel="stylesheet" href="../CSS/produtod.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <?php
		include('geral/headerSite.php');
	?>

    <?php
        include('../PHP/prodDisplay.php');
    ?>

    <?php
		include('geral/footerSite.php');
	?>

    <?php
        include('../PHP/produtos.php');
        include('../PHP/carrinho.php');
    ?>

</body>

</html>