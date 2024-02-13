<?php

include('../PHP/conn.php');

$idProdutoDisplay = $_GET['produto'];

$produtoDisplaySearch = "SELECT produtos.id, produtos.nome, produtos.descricao, produtos.estoque, produtos.preco, produtos.imagem1, produtos.imagem2, produtos.imagem3, produtos.desconto, marcas.marca FROM produtos LEFT JOIN marcas ON marcas.id = produtos.marca WHERE produtos.id = '$idProdutoDisplay'";
$produtoDisplayQuery = mysqli_query($conexao, $produtoDisplaySearch);