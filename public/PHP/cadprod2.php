<?php

include('conn.php');

//Faz a inserção das subcategorias
if(isset($_GET['selectcategoria'])) {
$idCategoriaSelected = $_GET['selectcategoria'];
$subCategoriaSearch = "SELECT * FROM subcategorias WHERE categoria = '$idCategoriaSelected'";
$subCategoriaQuery = mysqli_query($conexao, $subCategoriaSearch);

while($rowSubCategoria = mysqli_fetch_assoc($subCategoriaQuery)) {
  $idSubCategoria = $rowSubCategoria['id'];
  $nomeSubCategoria = $rowSubCategoria['subcategoria'];?>
<option value="<?php echo $idSubCategoria; ?>"><?php echo $nomeSubCategoria ?></option>
<?php }; 
}; 
?>