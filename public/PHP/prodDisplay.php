<?php while($value = mysqli_fetch_assoc($produtoDisplayQuery)) {
    $descricaoProd = $value['descricao']; ?>

<div class="product-contents-item-page">
    <main class="product-display">
        <figure>
            <div class="images-display">
                <img src="<?php echo $value['imagem1']; ?>" id="imageDisplay">             
                <figure class="all-product-pictures">
                    <label for="imagem1"><img src="<?php echo $value['imagem1']; ?>" id="img1"></label>
                    <label for="imagem2"><img src="<?php echo $value['imagem2']; ?>" id="img2"></label>
                    <label for="imagem3"><img src="<?php echo $value['imagem3']; ?>" id="img3"></label>

                    <div class="product-image-radio">
                        <input type="radio" name="image-selected" id="imagem1" value="image1">
                        <input type="radio" name="image-selected" id="imagem2" value="image2">
                        <input type="radio" name="image-selected" id="imagem3" value="image3">
                    <div>
                </figure>
            </div>
        </figure>
        <div class="product-infos">
            <h2 class="product-name"><?php echo $value['nome']; ?></h2>
            <a class="product-marca">marca: <?php echo $value['marca']; ?></a>
            <div class="quant-product">
                <p>Quantidade disponível: <a><?php echo $value['estoque']; ?></a>
            </div>
            
            <div class="preco-prod">

            <?php
            if($value['estoque'] == 0) { ?>

                <h3 id="product-indisponivel">Produto indisponivel</h3>

            <?php } else if ($value['desconto'] == 0) { $numberFormatBr = number_format($value['preco'], 2, ',', '.'); ?>

                <h3>R$<?php echo $numberFormatBr; ?></h3>
            </div>
            <div class='btns-product'>
                <div>
                    <a href="" id="buy-btn-prod">Comprar</a>
                </div>
                <div>
                    <a href="../PHP/carrinho-header.php?adicionar=<?php echo $value['id']; ?>" id="add-Cart-btn-prod">adicionar ao carrinho</a>
                </div>
                
            </div>

            <?php } else { 
                $desconto = $value['preco'] - ($value['preco'] * $value['desconto'] / 100);
                $numberFormatDescBr = number_format($desconto, 2, ',', '.');
                $numberFormatValueBr = number_format($value['preco'], 2, ',', '.'); ?>

                <h3>R$<?php echo $numberFormatDescBr; ?></h3>
                <span>R$<?php echo $numberFormatValueBr; ?></span>

            </div>
                
            <div class='btns-product'>
                <div>
                    <a href="" id="buy-btn-prod">Comprar</a>
                </div>
                <div>
                    <a href="../PHP/carrinho-header.php?adicionar=<?php echo $value['id']; ?>" id="add-Cart-btn-prod">adicionar ao carrinho</a>
                </div>
                
            </div>

            <?php }; ?>
        </div>
    </main>
</div>



<div class="descricao-prod-display">
    <div class="descricao-cabecalho"><h2>Descrição do Produto</h2></div>
    <textarea readonly id="descricao-prod">
        <?php echo $descricaoProd; ?>
    </textarea>
    <script src="../javaScriptt/descricaoProd.js"></script>
</div>

<script>

    let imageSelects = document.querySelectorAll("input[name='image-selected']");
    let imagemPrincipal = document.getElementById('imageDisplay');
    let painelImagens = document.getElementById('painel-imagens');
    
    let findSelectedImage = () => {
        let selectedImage = document.querySelector("input[name='image-selected']:checked");
        
        if (selectedImage.value == 'image1') {
            imagemPrincipal.src = '<?php echo $value['imagem1']; ?>';
        }

        if (selectedImage.value == 'image2') {
            imagemPrincipal.src = '<?php echo $value['imagem2']; ?>';
        }

        if (selectedImage.value == 'image3') {
            imagemPrincipal.src = '<?php echo $value['imagem3']; ?>';
        }
        
    }

    imageSelects.forEach(imageSelected => {
        imageSelected.addEventListener('change', findSelectedImage);
    });

</script>

<?php }; ?>