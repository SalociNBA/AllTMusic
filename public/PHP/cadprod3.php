<?php //Para trabalhar com o envio das imagens ao banco de dados

include('conn.php');

//Faz a inserção das marcas
$marcasSearch = "SELECT * FROM marcas";
$marcasQuery = mysqli_query($conexao, $marcasSearch);

//Faz a inserção das categorias
$queryCategorias = "SELECT id, categoria FROM categorias ORDER BY categoria ASC";
$insertCategoria = mysqli_query($conexao, $queryCategorias);