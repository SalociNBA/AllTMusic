<?php // Para fazer a inserção dos produtos dentro do bendito do HTML

include("../PHP/insert-produto.php");

$count=1;
    while($value = mysqli_fetch_assoc($produtos_query)) {
        $numberFormatBr = number_format($value['preco'], 2, ',', '.');
?>

    <div class="col-md-3-col-sm-6">
        <div class="product-grid">
            <div class="product-image">
                <a href="../html/pag-produto.php?produto=<?php echo $value['id']; ?>" class="image">
                    <img src="<?php echo $value['imagem1']; ?>">
                </a>

                <?php
                    if($value['desconto'] > 0) {
                ?>
                        <span class="product-discount-label"><?php echo $value['desconto']?>%</span>
                <?php
                    };
                ?>


                <ul class="product-links">

                    <?php 
                    
                    if(isset($_SESSION['cpf'])) { ?>
                        <li><a href="../PHP/favoritos-header.php?favoritar=<?php echo $value['id']; ?>">❤</a></li>
                    <?php } else { ?>
                        <li><a id="heart" href="../html/pag-login.php">❤</a></li>
                    <?php }; ?>

                </ul>

                <?php if(isset($_SESSION['cpf']) && $value['estoque'] > 0) {?>
                <a href="../PHP/carrinho-header.php?adicionar=<?php echo $value['id']; ?>" class="add-to-cart">Add to Cart</a>
                <?php } else if (!isset($_SESSION['cpf'])){ ?>

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
    $count = $count+1;
    };
?>