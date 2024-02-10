<?php

include("conn.php");
if(!isset($_SESSION)) {
    session_start();
}
$usuarioCPF = $_SESSION['cpf'];

//Lógica para inserir os pedidos na primeira tela de todos os pedidos
$pedidos_header_search = "SELECT * FROM vendas JOIN formas_pagamento ON formas_pagamento.id = vendas.forma_pagamento WHERE $usuarioCPF = vendas.cpf";
$pedidos_header_query = mysqli_query($conexao, $pedidos_header_search);