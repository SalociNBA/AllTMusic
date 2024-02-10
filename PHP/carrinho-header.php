<?php

include('conn.php');

if(!isset($_SESSION)) {
    session_start();
};

$usuarioCPF = $_SESSION['cpf'];

//Adicionar
if(isset($_GET['adicionar'])) {

    $idProduto = (int) $_GET['adicionar']; //Coletando o (ID) do item selecionado

    //Etapa de verificação se o produto já foi adicionado ao carrinho anteriormente
    $cartVerifySearch = "SELECT * FROM carrinho WHERE id_produto = '$idProduto' AND cpf = '$usuarioCPF'";
    $cartVerifyQuery = mysqli_query($conexao, $cartVerifySearch);
    $cartVerifyQueryAssoc = mysqli_fetch_assoc($cartVerifyQuery);
    $verify = $cartVerifyQuery->num_rows;

    //Etapa de adicionar ao carrinho
    if($verify == 1) {
        $quantProduto = $cartVerifyQueryAssoc['quantidade'];
        $newQuantProduto = $quantProduto + 1;
        $prodUpdtCart = "UPDATE carrinho SET quantidade = $newQuantProduto WHERE id_produto = $idProduto AND cpf = $usuarioCPF";
        $prodUpdtCartQuery = mysqli_query($conexao, $prodUpdtCart);
    } else {
        $prodAddCart = "INSERT INTO carrinho VALUES($usuarioCPF, $idProduto, 1)";
        $prodAddCartQuery = mysqli_query($conexao, $prodAddCart);
    };

};

echo "<script language='javascript'>history.back()</script>";