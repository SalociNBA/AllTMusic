<?php

session_start();
include("conn.php");

    $prodId = $_GET['update'];

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $prodQuant = $_POST["$prodId-quantidade-prod"];
        $userCPF = $_SESSION['cpf'];
        $carrinhoUpdate = "UPDATE carrinho SET quantidade = '$prodQuant' WHERE '$prodId' = id_produto AND cpf = '$userCPF'";
        mysqli_query($conexao, $carrinhoUpdate);
        //echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
        header('location: ../html/pag-carrinho.php');

    }

    ?>