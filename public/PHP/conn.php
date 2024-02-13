<?php
error_reporting(0);
// Conectar ao banco de dados
$host = 'localhost'; // endereço do servidor de banco de dados
$usuario = 'root'; // nome de usuário do banco de dados
$senha_db = ''; // senha do banco de dados
$banco = 'instrumentos'; // nome do banco de dados

$conexao = mysqli_connect($host, $usuario, $senha_db, $banco);

// Verificar se a conexão foi estabelecida com sucesso
if (!$conexao) {
    die('Erro na conexão com o banco de dados: ' . mysqli_connect_error());
}