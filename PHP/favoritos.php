<?php

include('conn.php');

if (!isset($_SESSION)) {
    session_start();
};

if(isset($_SESSION['cpf'])) {
    $usuarioCPF = $_SESSION['cpf'];
};

//Pegar os produtos que estão adicionados aos favoritos e exibir na página
$pagFavSearch = "SELECT * FROM favoritos JOIN produtos WHERE favoritos.cpf = '$usuarioCPF' AND favoritos.id_produto = produtos.id ";
$pagFavQuery = mysqli_query($conexao, $pagFavSearch);
$pagFavQueryRows = $pagFavQuery->num_rows;