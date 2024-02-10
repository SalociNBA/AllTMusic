<?php include("../PHP/pedidos-header.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/pedidos.css">
</head>
<body>
    <?php include('geral/headerSite.php'); ?>

    <div class="pedidos-content">
        <div class="">
            <h1>Pedidos</h1>
        </div>
        <div>
            <table border="1">
                <tr>
                    <th>Código da compra</th>
                    <th>Data da compra</th>
                    <th>Endereço da entrega</th>
                    <th>Valor total</th>
                    <th>Forma de pagamento</th>
                    <th>Ver detalhes</th>
                </tr>

                <?php if ($pedidos_header_query->num_rows >= 1) { while ($value = mysqli_fetch_assoc($pedidos_header_query)) { 
                    $valor_total =  number_format($value['valor_total'], 2, ',', '.')?>

                    <tr class="linhas-pedidos">
                        <td><?php echo $value['id_venda']; ?></td>
                        <td><?php echo $value['data_compra']; ?></td>
                        <td><?php echo $value['endereco']; ?></td>
                        <td>R$<?php echo $valor_total; ?></td>
                        <td><?php echo $value['forma']; ?></td>
                        <td><a>Ver Detalhes</a></td>
                    </tr>

                <?php }
                } ?>
                
            </table>
        </div>
    </div>

    <?php include('geral/footerSite.php'); ?>
</body>
</html>