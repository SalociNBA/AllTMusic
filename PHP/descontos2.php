<?php

include("conn.php");

//Pega o produto selecionado e mostra seu desconto
if(isset($_GET['produtoSelected'])) {
    $idProdutoSelected = $_GET['produtoSelected'];
    $descontosSearch = "SELECT * FROM descontos WHERE id_produto = '$idProdutoSelected'";
    $descontosQuery = mysqli_query($conexao, $descontosSearch); 
    $descontosNumRows = $descontosQuery->num_rows;

    if($descontosNumRows == 0) {

        ?>0<?php

    } else {

        while($rowDesconto = mysqli_fetch_assoc($descontosQuery)) {
            $descontoProdSelectedChange = $rowDesconto['desconto'];
            echo $descontoProdSelectedChange;
        };
    };
};