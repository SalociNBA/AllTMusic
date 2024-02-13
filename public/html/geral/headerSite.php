<?php
if(!isset($_SESSION)) {
    session_start();
};
include('../PHP/conn.php');

$categoriasBusca = "SELECT * FROM categorias";
$categoria = mysqli_query($conexao, $categoriasBusca);
?>

<div class="header-site">
        <header>

            <a href="pag-index.php" id="logo-header">
                <img src="../midia/Fotos/all tmusic.png">
            </a>

            <ul>
                <li class="menu-dropdown-header">
                    <img src="../midia/Fotos/icones/icone-menu.png" class="menu-drop-btn">
                    <div class="menu-dropdown-content">
                        <?php
                            while ($value = mysqli_fetch_assoc($categoria)) {
                        ?>
                        <div class="menu-cts">
                            <h2><?php echo $value['Categoria']; ?></h2>
                            <?php
                            $idcategoria = $value['id'];
                            $subcategoriaBusca = "SELECT subcategoria FROM subcategorias WHERE $idcategoria = categoria";
                            $subcategoriaQuery = mysqli_query($conexao, $subcategoriaBusca);
                                while ($value = mysqli_fetch_assoc($subcategoriaQuery)) { ?>
                                    <a href="../html/pag-searchProducts.php?busca=<?php echo $value['subcategoria']; ?>&pagina=1"><?php echo $value['subcategoria']; ?></a>
                                <?php };
                            ?>
                            
                        </div>

                        <?php }; ?>
                        
                    </div>
                </li>
            </ul>

            <form class="form-search-header" action="../PHP/searchProducts.php" method="post">
                <input type="text" placeholder="Pesquisa" class="search-header" name="busca"id="busca">
            </form>
            
            <ul id="user-header">
                <li class="user-dropdown-header">
                    <img src="../midia/Fotos/icones/user1.png" class="user-drop-btn">
                    <div class="user-dropdown-content">
                        <div class="user-cts" id='user-cts'>
                        </div>
                    </div>
                </li>
            </ul>

        <a href="../PHP/protect-cart.php" class="cart-header">
            <img src="../midia/Fotos/icones/icone-carrinho.png">
        </a>

    </header>

    <nav>
        <a id="button1" href="../html/pag-searchProducts.php?busca=CORDAS&pagina=1&categ=1"><img src="../midia/Fotos/icones/cordas.png"></a>
        <a id="button2" href="../html/pag-searchProducts.php?busca=TECLAS&pagina=1&categ=2"><img src="../midia/Fotos/icones/teclado.png"></a>
        <a id="button3" href="../html/pag-searchProducts.php?busca=EQUIPAMENTOS&pagina=1&categ=4"><img src="../midia/Fotos/icones/amplificador.png"></a>
        <a id="button4" href="../html/pag-searchProducts.php?busca=PERCUSSAO&pagina=1&categ=5"><img src="../midia/Fotos/icones/percussão.png"></a>
        <a id="button5" href="../html/pag-searchProducts.php?busca=SOPRO&pagina=1&categ=3"><img src="../midia/Fotos/icones/sopro.png"></a>
        <a id="button6" href="../html/pag-searchProducts.php?busca=DJ&pagina=1&categ=6"><img src="../midia/Fotos/icones/DJ.png"></a>
    </nav>

</div>
<div class="white-space">
</div>

<?php

include('../PHP/header.php');
