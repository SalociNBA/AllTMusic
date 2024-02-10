<?php
include("../PHP/searchProductsItens.php");
include("../PHP/filtros.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/index70.css">
    <link rel="stylesheet" href="../CSS/searchProductsss.css">
</head>
<body>
    <?php
        include("../html/geral/headerSite.php");
    ?>

    <div class="content-search-products">
        <h2>Exibindo resultados para "<?php echo $userBusca; ?>":</h2>
        <div class="pag-search-filtros-produtos">
            <form class="filtros-pesquisa" action="../html/pag-searchProducts.php" method="GET">
                <div class="header-hidden">
                    <input type="text" value="<?php echo $_GET['busca']?>" name="busca"> 
                    <input type="number" value="<?php echo $_GET['pagina']?>" name="pagina">
                    <input type="submit">
                </div>
                <h3>Preço</h3>
                <div class="pag-search-filtro-preco">

                    <?php //Para inserir o valor minimo no HTML
                    if(isset($_GET['min'])) {?>

                        <input type="number" placeholder="Min." name="min" value="<?php echo $_GET['min'] ?>">
                        
                    <?php } else {?>

                        <input type="number" placeholder="Min." name="min">

                    <?php } ?> -
                    <?php //Para inserir o valor maximo no HTML
                    if(isset($_GET['min'])) { ?>

                        <input type="number" placeholder="Max." name="max" value="<?php echo $_GET['max'] ?>">

                    <?php } else {?>

                        <input type="number" placeholder="Max." name="max">

                    <?php } ?>

                </div>

                <h3>Categoria</h3>

                <div class="pag-search-filtro-Categoria">
                
                    <?php while ($value = mysqli_fetch_assoc($categoriasFiltro)) { ?>
                        <div class="categoria-filtro">
                            <?php if (isset($_GET['categ']) && $_GET['categ'] == $value['id']) {?>

                                <input type="radio" value="<?php echo $value['id'] ?>" id="<?php echo $value['Categoria'] ?>" name="categ" checked>
                                <label for="<?php echo $value['Categoria']; ?>"><?php echo $value['Categoria'] ?> </label>
                            
                            <?php } else { ?>

                            <input type="radio" value="<?php echo $value['id']; ?>" id="<?php echo $value['Categoria']; ?>" name="categ">
                            <label for="<?php echo $value['Categoria'] ?>"><?php echo $value['Categoria'] ?> </label>

                            <?php } ?>
                            
                        </div>
                    <?php } ?>
                </div>
                <h3>SubCategoria</h3> 

                <div id="subcateg-filtro-div">
                    <script src="../javaScriptt/subcategFiltros.js"></script>
                </div>

                <h3>MARCAS</h3>
            </form>

            <div class="display-products">
                <?php
                include("../PHP/produtosDisplaySearch.php");
                ?>
            </div>
        </div>
    </div>

    <div class="pag-nums-search">

        <!-- puxa para a pagina de número anterior (<<) -->
        <?php if ($pagina > 1) { ?>
            <a href="?busca=<?php echo $_GET['busca']; ?>&pagina=<?php echo $_GET['pagina']-1; ?>"><<</a>
        <?php }; ?>
        
        <!-- puxa para a pagina de dois números anteriores (num) -->
        <?php if ($pagina > 2 ) { ?>
            <a href="?busca=<?php echo $_GET['busca']; ?>&pagina=<?php echo $pagina-2; ?>"><?php echo $pagina-2 ?></a>
        <?php }; ?>

        <!-- puxa para a pagina de número anterior (num) -->
        <?php if ($pagina > 1 ) { ?>
            <a href="?busca=<?php echo $_GET['busca']; ?>&pagina=<?php echo $pagina-1; ?>"><?php echo $pagina-1 ?></a>
        <?php }; ?>

        <!-- Número da página -->
        <?php echo $pagina; ?>

        <!-- puxa para a proxima página (num) -->
        <?php if ($pagina < $numPaginas) { ?>
            <a href="?busca=<?php echo $_GET['busca']; ?>&pagina=<?php echo $pagina+1; ?>"><?php echo $pagina+1; ?></a>
        <?php }; ?>

        <!-- puxa para a proxima da proxima página (num) -->
        <?php if ($pagina < $numPaginas-1) { ?>
            <a href="?busca=<?php echo $_GET['busca']; ?>&pagina=<?php echo $pagina+2; ?>"><?php echo $pagina+2; ?></a>
        <?php }; ?>

        <!-- puxa para a proxima pagina (>>) -->
        <?php if ($pagina < $numPaginas) { ?>
            <a href="?busca=<?php echo $_GET['busca']; ?>&pagina= <?php echo $pagina+1; ?>">>></a>
        <?php }; ?>

    </div>

    <?php
        include("../html/geral/footerSite.php");
    ?>
</body>
</html>