<?php
include("../PHP/conn.php");

if (isset ($_GET['categ'])) {
    $categSelect = $_GET['categ'];
    $buscaSubcategoria = "SELECT * FROM subcategorias WHERE '$categSelect' = categoria ";
    $subcategoriasFiltro = mysqli_query($conexao, $buscaSubcategoria);
}

while ($value = mysqli_fetch_assoc($subcategoriasFiltro)) { ?>

<div name="subcateg">    

    <?php //Para definir as opções de subcategoria que já foram selecionadas
    if (isset($_GET['subcateg']) && $value['id'] == $_GET['subcateg']) { ?> 

        <input type="radio" name="subcateg" value="<?php echo $value['id'] ?>" id="<?php echo $value['subcategoria'] ?>" checked> 
        <label for="<?php echo $value['subcategoria'] ?>"><?php echo $value['subcategoria'] ?></label>
                            
    <?php } else { ?>

        <input type="radio" name="subcateg" value="<?php echo $value['id'] ?>" id="<?php echo $value['subcategoria'] ?>"> 
        <label for="<?php echo $value['subcategoria'] ?>"><?php echo $value['subcategoria'] ?></label>

    <?php } ?>

</div>

<?php } ?>