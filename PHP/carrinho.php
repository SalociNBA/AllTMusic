<?php

include('insert-produto.php');
include('conn.php');
include('login.php');

if(!isset($_SESSION)) {
    session_start();
};

//Query para mostrar os produtos do carrinho
if(isset($_SESSION['cpf'])) {
$usuarioCPF = $_SESSION['cpf'];
$carrinhoSearch = "SELECT * FROM carrinho JOIN produtos ON carrinho.id_produto = produtos.id WHERE carrinho.cpf = '$usuarioCPF'";
$carrinhoQuery = mysqli_query($conexao, $carrinhoSearch);
$carrinhoQueryRows = $carrinhoQuery->num_rows;
};

//Remover
if(isset($_GET['remover'])) {
    //Remove o produto do carrinho
    $idProduto = (int) $_GET['remover'];

    $prodDelCart = "DELETE FROM carrinho WHERE id_produto = '$idProduto' AND carrinho.cpf = '$usuarioCPF'";
    $prodDelCartQuery = mysqli_query($conexao, $prodDelCart);

    header('location: ../html/pag-carrinho.php');
};


?>