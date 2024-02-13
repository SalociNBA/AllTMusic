<?php

include('conn.php');

if (!isset($_SESSION)) {
    session_start();
};

$usuarioCPF = null;
if(isset($_SESSION['cpf'])) {
    $usuarioCPF = $_SESSION['cpf'];
};

//Para favoritar
if(isset($_GET['favoritar'])) {

    $idProdFav = (int) $_GET['favoritar']; //pegando o (ID) do elemento

    //Para verificação se o produto já foi adicionado anteriormente
    $favVerifySearch = "SELECT * FROM favoritos WHERE id_produto = '$idProdFav' AND cpf = '$usuarioCPF'";
    $favVerifyQuery = mysqli_query($conexao, $favVerifySearch);
    $favQueryNumRows = $favVerifyQuery->num_rows;

    //Etapa de adicionar aos favoritos
    if($favQueryNumRows === 0) {
        $favProdINSERT = "INSERT INTO favoritos (cpf, id_produto) VALUES ($usuarioCPF, $idProdFav)";
        $favProdQuery = mysqli_query($conexao, $favProdINSERT);
    } else {
        $favProdDELETE = "DELETE FROM favoritos WHERE cpf = '$usuarioCPF' AND id_produto = '$idProdFav'";
        $favProdQuery = mysqli_query($conexao, $favProdDELETE);
    };

    $_GET['favoritar'] = null;

};

echo "<script language='javascript'>history.back()</script>";