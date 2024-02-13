<?php

include('conn.php');

//Faz a busca do desconto do produto inserido
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $idProdutoDesconto = $_POST['productSelected'];
    $descontoProduto = $_POST['descontoProduct'];

    if($descontoProduto < 1 && $descontoProduto > 100) {

        header("location: ../html/pag-descontos.php");

    } else {

        $descontoVerifySearch = "SELECT * FROM descontos WHERE id_produto = '$idProdutoDesconto'";
        $descontoVerifyQuery = mysqli_query($conexao, $descontoVerifySearch);
        $descontoVerifyNumRows = $descontoVerifyQuery->num_rows;

        if($descontoVerifyNumRows == 0) {
            $descontoInsert = "INSERT INTO descontos (id_produto, desconto) VALUES ('$idProdutoDesconto', '$descontoProduto')";
            $descontoInsertQuery = mysqli_query($conexao, $descontoInsert);
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
        } else {
            $descontoUpdate = "UPDATE descontos SET desconto = '$descontoProduto' WHERE id_produto = '$idProdutoDesconto'";
            $descontoUpdateQuery = mysqli_query($conexao, $descontoUpdate);
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
        };
    };
};
