<?php

include('conn.php');

if(isset($_POST['email']) || isset($_POST['password'])) {

    if(strlen($_POST['email']) == 0 ) {
        echo '<script> alert("Digite um Email") </script>';
    } else if (strlen($_POST['password']) == 0 ) {
        echo '<script> alert("Digite sua Senha") </script>';
    } else {

        //Parte que pegara os dados para efetuar o login
        $email = $conexao->real_escape_string($_POST['email']);
        $password = $conexao->real_escape_string($_POST['password']);

        //Parte dos usuários fazerem login

        $sqlSearch = "SELECT * FROM usuarios WHERE e_mail = '$email' AND senha = '$password'";
        $sqlQuery = $conexao->query($sqlSearch) or die("falha no login");

        //Puxando os dados para usar na sessão
        $quantidade = $sqlQuery->num_rows;
        if($quantidade === 1) {
          
            $usuario = mysqli_fetch_assoc($sqlQuery);
            if(!isset($_SESSION)) {
                session_start();
            };
                
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['cpf'] = $usuario['cpf'];
           
            header('location: ../html/pag-index.php');

        };

    };

};