<?php
    include('../PHP/favoritos.php');
    if(!isset($_SESSION['cpf'])) {
        session_start();
    };
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="author" content="Nícolas Barcelos Almeida">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All TMusic</title>
    <link rel="stylesheet" href="../CSS/geral7.css">
    <link rel="stylesheet" href="../CSS/favoritos.css">
    <link rel="stylesheet" href="../CSS/index70.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:wght@500&display=swap" rel="stylesheet">
</head>

<body>

    <?php
		include('geral/headerSite.php');
	?>

    <div class="title-fav">
        <h1> FAVORITOS </h1>
    </div>

    <div class="favorite">

    <?php 
    if ($pagFavQueryRows > 0) {
    ?>

        <div class="row">

            <?php // Para fazer a inserção dos produtos dentro do bendito do HTML
                while($value = mysqli_fetch_assoc($pagFavQuery)) {
                    $numberFormatBr = number_format($value['preco'], 2, ',', '.');
            ?>

            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="pag-produto.php?produto=<?php echo $value['id']; ?>" class="image">
                            <img src="<?php echo $value['imagem1']; ?>">
                        </a>

                        <?php if($value['desconto'] > 0){?>

                        <span class="product-discount-label"><?php echo $value['desconto']?>%</span>
                        
                        <?php }; ?>


                        <ul class="product-links">

                            <?php if(isset($_SESSION['cpf'])) { ?>

                            <li><a href="../PHP/favoritos-header.php?favoritar=<?php echo $value['id']; ?>">❤</a></li>

                            <?php } else { ?>

                            <li><a href="../PHP/favoritos-header.php?favoritar=<?php echo $value['id']; ?>">❤</a></li>

                            <?php }; ?>

                        </ul>

                        <?php if(isset($_SESSION['cpf']) && $value['estoque'] > 0) {?>

                        <a href="?adicionar=<?php echo $value['id']; ?>" class="add-to-cart">Add to Cart</a>

                        <?php } else if (!isset($_SESSION['cpf']) && $value['estoque'] > 0) { ?>

                        <a href="pag-login.php" class="add-to-cart">Add to Cart</a>

                        <?php }; ?>

                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="pag-produto.php?produto=<?php echo $value['id']; ?>">
                                <?php echo $value['nome']; ?>
                        </a></h3>


                        <?php if($value['desconto'] > 0 && $value['estoque'] > 0) { 
                    $precoDesc = $value['preco'] - ($value['preco'] * $value['desconto']/100);
                    $precoDescFormat = number_format($precoDesc, 2, ',', '.'); ?>

                        <div class="price">R$
                        <?php echo $precoDescFormat;  ?> <span> <?php echo $numberFormatBr; ?></span>
                        </div>

                <?php } else if ($value['estoque'] > 0) { ?>

                        <div class="price">R$
                        <?php echo $numberFormatBr; ?>
                        </div>

                <?php } else if ($value['estoque'] == 0) { ?>
                    <div class="nprice">
                        INDISPONIVEL
                    </div>
                <?php }; ?>
                    </div>
                </div><!-- product-grid -->
            </div>

        <?php
            };
        ?>
        </div><!-- row -->

    <?php 
    } else {
        echo '<h2>-NENHUM PRODUTO ADICIONADO AOS FAVORITOS-</h2>';
    };
    ?>

    </div>

    <?php
		include('geral/footerSite.php');
	?>

    <?php
    include('../PHP/favoritos.php');
    ?>

</body>

</html>