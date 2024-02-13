<?php

include('conn.php');

//Query para buscar todos os produtos do DB
$produtosDescSearch = "SELECT * FROM produtos";
$produtosDescQuery = mysqli_query($conexao, $produtosDescSearch);


//Faz a busca dos descontos inseridos c/c as informações do produto
$descontosSearch ="SELECT * FROM descontos JOIN produtos ON descontos.id_produto = produtos.id";
$descontosQuery = mysqli_query($conexao, $descontosSearch);