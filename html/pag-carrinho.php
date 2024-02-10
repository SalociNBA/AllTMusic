<?php

include('../PHP/carrinho.php');

if(!isset($_SESSION)) {
    session_start();
};

?>

<head>
    <meta name="author" content="Nícolas Barcelos Almeida">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARRINHO</title>
    <link rel="stylesheet" href="../CSS/carrinho32.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:wght@500&display=swap" rel="stylesheet">
</head>

<body>

    <?php
		include('geral/headerSite.php');
	?>

    <div class="cart-content">

        <div class="cabecalho-cart">
            <div class="picture-cabecalho">
                <h3>FOTO</h3>
            </div>

            <div class="name-cabecalho">
                <h3>NOME DO PRODUTO</h3>
            </div>

            <div class="quantidade-cabecalho">
                <h3>QUANTIDADE</h3>
            </div>

            <div class="preco-cabecalho">
                <h3>PREÇO R$</h3>
            </div>

            <div class="remover-cabecalho">
                <h3>REMOVER</h3>
            </div>

        </div>

            <?php
            if($carrinhoQueryRows > 0) {
                $valortotal = 0;
            while($value = mysqli_fetch_assoc($carrinhoQuery)) { 
                if($value['desconto'] == 0) {
                    $valortotal += $value['preco'] * $value['quantidade'];
                } else {
                    $valortotal += ($value ['preco'] - $value['preco'] * $value['desconto']/100) * $value['quantidade'];
                } 

                if ($value['quantidade'] <= 0) {

                    $idProduto = $value['id'];

                    $prodDelCart = "DELETE FROM carrinho WHERE id_produto = '$idProduto' AND carrinho.cpf = '$usuarioCPF'";
                    $prodDelCartQuery = mysqli_query($conexao, $prodDelCart); ?>

                    <script>location.reload()</script>
                    
                    <?php } ?>
            
        <div class="row">
            <div class="picture-product">
                <img src="<?php echo $value['imagem1']; ?>">
            </div><!-- picture-product -->

            <div class="name-product">
                <p>
                    <?php echo $value['nome']; ?>
                </p>
            </div>

            <div class="quantidade-product">
                <form action="../PHP/carrinhoUpdate.php?update=<?php echo $value['id']; ?>" method="POST">
                    <input class="quant-input" name="<?php echo $value['id']; ?>-quantidade-prod" type="number"
                        value="<?php echo $value['quantidade']; ?>">
                </form>
            </div>

            <div class="preco-product">

                <?php  if ($value['desconto'] > 0) {
                        $desconto = $value['preco'] - ($value['preco'] * $value['desconto']/100);
                        $montante = $desconto * $value['quantidade'];
                        $preco = number_format($montante, 2, ',', '.');?>

                <p>R$
                    <?php echo $preco; ?>
                </p>

                <?php } else { 
                        $montante = $value['preco'] * $value['quantidade'];
                        $preco = number_format($montante, 2, ',', '.');?>

                <p>R$
                    <?php echo $preco; ?>
                </p>

                <?php }; ?>
            </div>

            <div class="remove-product">
                <a href="?remover=<?php echo $value['id']; ?>">REMOVER</a>
            </div>

        </div><!-- ROW -->

            <?php }; ?>

            <div class="pag-carrinho-infos-carrinho">
                <?php $precototal = number_format($valortotal, 2, ',', '.'); ?>
                Valor total:<label>R$<?php echo $precototal; ?></label> <a href="../html/pag-pagamento.php">COMPRAR</a>
            </div>

                
                <?php
            } else {
                echo '<h2>Nenhum produto adicionado ao carrinho</h2>';
            }
            ?>

        </div><!-- cart-content -->
        


    <?php
		include('geral/footerSite.php');
	?>



</body>

</html>