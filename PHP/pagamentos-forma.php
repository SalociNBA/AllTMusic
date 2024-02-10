<?php

//Conexao com o banco de dados para puxar os produtos que o usuzário está comprando
include("conn.php");

if(!isset($_SESSION)) {
    session_start();
}
$usuarioCPF = $_SESSION['cpf'];

//dados enviados pelo post
$forma_pagamento = $_POST['forma-pagamento'];
$endereco = $_POST['ender'];
if ($endereco == 0) {
    $enderBusca = "SELECT usuarios.cep, usuarios.endereco, usuarios.num, cidades.nome AS cid, estados.uf, usuarios.complemento FROM `usuarios` JOIN `cidades` ON usuarios.cidade = cidades.id JOIN estados ON usuarios.estado = estados.id WHERE '$usuarioCPF' = usuarios.cpf";
    $enderQuery = mysqli_query($conexao, $enderBusca);
    foreach ($enderQuery as $row=>$r) {

        $enderUser = $r['endereco'] . ", " . $r['num'] . ", " . $r['cid']. "/". $r['cid']. ", ". $r['cep'];
        if($r['complemento'] != "") {$enderUser.= ", " . $r['complemento']; }

    }
}

//fazer a conversão da datas para a forma do link
//data documento
$data_atual = date("Y-m-d");
$data_documento = str_replace("/", "%2F", date('d/m/Y'));
$vencimento_documento = date('d/m/Y', strtotime('+ 10 days'));
$vencimento_documento = str_replace("/", "%2F", $vencimento_documento);

//Gerando um código da compra
$cod_compra = rand();
$cod_compra .= str_replace("/", "", date("d/m/Y"));
$verify_cod_compra = "SELECT id_venda FROM vendas WHERE id_venda = $cod_compra";
$verify_cod_compraQuery = mysqli_query($conexao, $verify_cod_compra);
while ($verify_cod_compraQuery->num_rows > 0) {
    $cod_compra = rand();
    $cod_compra .= str_replace("/", "", date("d/m/Y"));
    $verify_cod_compra = "SELECT id_venda FROM vendas WHERE id_venda = $cod_compra";
    $verify_cod_compraQuery = mysqli_query($conexao, $verify_cod_compra);
}

//valor da compra
$carrinho_atual = "SELECT produtos.id, produtos.nome, produtos.preco, produtos.desconto, carrinho.quantidade FROM carrinho JOIN produtos ON carrinho.id_produto = produtos.id WHERE $usuarioCPF = carrinho.cpf";
$carrinho_atualQuery = mysqli_query($conexao, $carrinho_atual);

$valor_boleto = 0;
while ($value = mysqli_fetch_assoc($carrinho_atualQuery)) {
    if ($value['desconto'] != 0) {
        $valor_boleto += ($value['preco'] - ($value['preco'] * $value['desconto']/100)) * $value['quantidade'];
    } else {
        $valor_boleto += $value['preco'] * $value['quantidade'];
    }
    $valor_total = $valor_boleto;
}
$valor_boleto = number_format($valor_boleto, 2, ',', '.');

//Salvendo no banco de dados
$insertSearch = "INSERT INTO `vendas`(`id_venda`, `cpf`, `endereco`, `data_compra`, `garantia`, `forma_pagamento`, `valor_total`, `cupom_desconto`, `valor_final`, `status_pagamento`) VALUES ($cod_compra, $usuarioCPF, '$enderUser', '$data_atual', null, $forma_pagamento, $valor_total, 0, $valor_total, 2);";
$insertQuery = mysqli_query($conexao, $insertSearch);

if($forma_pagamento == 1 && isset($insertQuery)) {

    $link = 'http://www.sicadi.com.br/mhouse/boleto/boleto3.php?numero_banco=341-7&local_pagamento=PAG%C1VEL+EM+QUUALQER+BANCO+AT%C9+O+VENCIMENTO&cedente=ALL+TMUSIC+LTDA.&data_documento=';
    $link .= $data_documento;
    $link .= '&numero_documento=DF+00113&especie=&aceite=N&data_processamento=';
    $link .= $data_documento;
    $link .= '&uso_banco=&carteira=179&especie_moeda=Real&quantidade=&valor=&vencimento=';
    $link .= $vencimento_documento;
    $link .= '&agencia=0049&codigo_cedente=10201-5&meunumero=00010435&valor_documento=';
    $link .= $valor_boleto;
    $link .= '&instrucoes=Taxa+de+visita+de+suporte%0D%0AAp%F3s+o+vencimento+R%24+0%2C80+ao+dia&mensagem1=&mensagem2=&mensagem3=ATEN%C7%C3O%3A+N%C3O+RECEBER+AP%D3S+15+DIAS+DO+VENCIMENTO&sacado=';

    foreach ($carrinho_atualQuery as $row=>$r) {
        $prodId = $r['id'];
        $quant = $r['quantidade'];
        $vendas_produtos_insert_Search = "INSERT INTO `vendas_produtos`(`id_venda`, `id_produto`, `quantidade`) VALUES ('$cod_compra','$prodId','$quant')";
        $vendas_produtos_query = mysqli_query($conexao, $vendas_produtos_insert_Search);
    }

    $update_search = "UPDATE vendas SET link = '$link' WHERE id_venda = '$cod_compra'";
    $update_query = mysqli_query($conexao, $update_search);

    $delete_search = "DELETE FROM carrinho WHERE $usuarioCPF = cpf";
    $delete_query = mysqli_query($conexao, $delete_search);

    header('refresh: 0;'. $link);
}

?>
<link rel="stylesheet" href="../CSS/gerando.css"></style>
<link rel="stylesheet" href="../CSS/geral7.css"></style>

<div class="centralizer">
    <div class="loader"></div>
    <h4>COMPRA REALIZADA COM SUCESSO</h4>
    <h5>GERANDO BOLETO</h5>
</div>

