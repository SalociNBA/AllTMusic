<?php

if(!isset($_SESSION)) {
    session_start();
}

$usuarioCPF = $_SESSION['cpf'];

$dadosSelect = "SELECT usuarios.endereco, usuarios.num, usuarios.cep, cidades.nome cid, estados.uf est, usuarios.complemento FROM usuarios JOIN cidades ON usuarios.cidade = cidades.id JOIN estados ON usuarios.estado = estados.id WHERE '$usuarioCPF' = usuarios.cpf";
$dadosQuery = mysqli_query($conexao, $dadosSelect);

$carrinho_atual = "SELECT produtos.id, produtos.nome, produtos.preco, produtos.desconto, carrinho.quantidade FROM carrinho JOIN produtos ON carrinho.id_produto = produtos.id WHERE $usuarioCPF = carrinho.cpf";
$carrinho_atualQuery = mysqli_query($conexao, $carrinho_atual);