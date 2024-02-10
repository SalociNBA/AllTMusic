<?php

include('login.php');

if(!isset($_SESSION)) {
    session_start();
};

if ($_SESSION == NULL || !isset($_SESSION['cpf'])){
    echo "<script>
    document.getElementById('user-cts').innerHTML += '<h2>Usuário</h2>'
    document.getElementById('user-cts').innerHTML += '<a href=\"pag-login.php\">Entrar</a>'
    document.getElementById('user-cts').innerHTML += '<a href=\"pag-register.php\">Registrar</a>'
    </script>";
} else if (isset($_SESSION['cpf'])) {
    $nomeUsuário = $_SESSION['nome'];
    $nomeUsuário = explode(" ", $nomeUsuário);
    echo "<script>
    document.getElementById('user-cts').innerHTML += '<h2>" . $nomeUsuário[0] . "</h2>'
    document.getElementById('user-cts').innerHTML += '<a href=\"../html/pag-accountSetting.php\">Account</h2>'
    document.getElementById('user-cts').innerHTML += '<a href=\"../html/pag-pedidos.php\">Pedidos</h2>'
    document.getElementById('user-cts').innerHTML += '<a href=\"../html/pag-favorites.php\">Favoritos</h2>'
    document.getElementById('user-cts').innerHTML += '<a href=\"../PHP/logout.php\">Sair</h2>'
    </script>";
};

//FAZ A BUSCA DAS CATEGORIAS E SUBCATEGORIAS PARA INSERIR NO DROPDOWN
include("../PHP/conn.php");
$dropdownCategoriaMenu = "SELECT * FROM categorias";
$dropdownCategoriaMenuQuery = mysqli_query($conexao, $dropdownCategoriaMenu);