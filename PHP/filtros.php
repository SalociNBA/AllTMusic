<?php

include("../PHP/conn.php");

$buscaCategorias = "SELECT * FROM categorias";
$categoriasFiltro = mysqli_query($conexao, $buscaCategorias);

$buscaMarcas = "SELECT * FROM marcas";
$marcasFiltros = mysqli_query($conexao, $buscaMarcas);