<?php

if(!isset($_SESSION)) {
    session_start();
};

//vai redirecionar para a pagina de login caso o usuário não tenha feito
if($_SESSION['cpf'] == NULL) {
    header('location: ../html/pag-login.php'); //direciona para o login
} else {
    header('location: ../html/pag-carrinho.php'); //redireciona para o carrinho caso tenha uma sessão
};

?>