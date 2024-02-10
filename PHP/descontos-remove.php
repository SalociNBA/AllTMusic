<?php

include('../PHP/conn.php');

if(isset($_GET['remover'])) {
    $idProdRemove = $_GET['remover'];

    $removerDescontoSearch = "DELETE FROM descontos WHERE id_produto = '$idProdRemove'";
    $removerDescontoQuery = mysqli_query($conexao, $removerDescontoSearch);

    header("location: ../html/pag-descontos.php");
};

?>