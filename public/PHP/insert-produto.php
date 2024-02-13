<?php

include('conn.php');

//Consultar os registros da tabela dos produtos com seus descontos
$produtos_search = "SELECT * FROM produtos
                    WHERE estoque > 0
                    ORDER BY id DESC
                    LIMIT 0, 16";
$produtos_query = mysqli_query($conexao, $produtos_search);

//Consultar produtos que não estão em estoque
$nProdutos_search = "SELECT * FROM produtos LIMIT 12, 0";
$nProdutos_query = mysqli_query($conexao, $nProdutos_search);

//consultar se o produto já foi favoritado
$usuarioCPF = null;
if(isset($_SESSION['cpf'])) {
    $usuarioCPF = $_SESSION['cpf'];
};

$favAddedProd = "SELECT id_produto FROM favoritos WHERE id_produto = '$usuarioCPF'";
$favAddedQuery = mysqli_query($conexao, $favAddedProd);