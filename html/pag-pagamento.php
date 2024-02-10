<?php include("../PHP/formas-pagamento.php"); ?>
<?php include("../PHP/pagamento-dados.php"); ?>
<?php if($carrinho_atualQuery->num_rows == 0) {
    header('location: ../html/pag-carrinho.php');
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/pagamento2.css">
    <title>Pagamento</title>
</head>
<body>
    <?php include("geral/headerSite.php"); ?>

    <div class="pagamento-content">

        <form class="pedido-infos" action="../PHP/pagamentos-forma.php" method="POST">
            <div class="pagamentos-dados-user">

                <div class ="forma-pagamento-div">

                    <h2>Forma de pagamento</h2>

                    <?php while ($value = mysqli_fetch_assoc($formasQuery)) { ?>

                        <div class="forma-pagamento-content">
                            <input type="radio" value="<?php echo $value['id']; ?>" name="forma-pagamento" id="<?php echo $value['forma'];?>" <?php if($value['id'] == 1){ echo "checked"; } ?>> <label for="<?php echo $value['forma'];?>"><img src="<?php echo $value['imagem']; ?>"></label>
                        </div>

                    <?php } ?>

                </div>

                <div class="endereco-entrega">

                    <h2>Endereço</h2>

                    <?php while ($value = mysqli_fetch_assoc($dadosQuery)){ ?>

                    <div class="select-endereco">
                        <input type="radio" name="ender" id="end-princ" value ="0" checked> <label for="end-princ"><?php echo $value['endereco'] . ", " . $value['num'] . ", " . $value['cep'] . ", " . $value['cid'] . "/" . $value['est']; if($value['complemento'] !== "") { echo ", " . $value['complemento']; } ?></label>
                    </div>

                    <?php } ?> 

                    <a href="">+</a>

                </div>

            </div>

            <div class="pagamentos-infos-compra">
                <h2>Carrinho</h2>
                <table>
                    <tr>
                        <th>Quantidade</th>
                        <th>Nome</th>
                        <th>Preço</th>
                    </tr>
                
                    <?php $valor_total = 0;
                    while ($value = mysqli_fetch_assoc($carrinho_atualQuery)) {
                        if ($value['desconto'] == 0) {
                            $valor_total += $value['preco'] * $value['quantidade'];
                            $preco = number_format($value['preco'], 2, ',', '.');
                        } else {
                            $valor_total += ($value['preco'] - $value['preco']*$value['desconto']/100) * $value['quantidade'];
                            $preco = number_format($value['preco'] - $value['preco'] * $value['desconto']/100, 2, ',', '.');
                        } ?>

                    <tr>
                        <td>x<?php echo $value['quantidade']; ?></td>
                        <td><?php echo $value['nome']; ?></td>
                        <td>R$<?php echo $preco; ?></td>
                    </tr>
                    <?php } ?>

                </table>

                <div class="finalizar_compra">
                    <?php $valor_total = number_format($valor_total, 2, ',', '.'); ?>
                    Valor total: <h3>R$<?php echo $valor_total; ?></h3>
                </div>
                <div class="btn_finalizar">
                    <input type="submit" value="FINALIZAR COMPRA">
                </div>
            </div>

        </form>
        <div></div>
        <div></div>

    </div><!-- pagamento-content -->

    <?php include("geral/footerSite.php"); ?>
</body>
</html>