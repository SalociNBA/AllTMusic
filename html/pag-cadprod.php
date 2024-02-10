<?php
include('../PHP/cadprod3.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulário de Produtos</title>
	<style>
		form {
			margin: 20px;
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}

		label {
			display: block;
			margin-bottom: 5px;
		}

		input[type=text], select {
			padding: 5px;
			border-radius: 3px;
			border: 1px solid #ccc;
			width: 100%;
			box-sizing: border-box;
			margin-bottom: 10px;
		}

		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 10px;
			border-radius: 5px;
			border: none;
			cursor: pointer;
		}

		input[type=submit]:hover {
			background-color: #45a049;
		}
		input[type=file] {
			width: 100%;
			margin-bottom: 10px;
		}
	</style>
	<link rel="stylesheet" href="../CSS/geral.CSS">
	
</head>
<body>

		<!-- Formulário para envio dos dados do produto e cadastro no banco de dados -->
	<form method="post" action="../PHP/cadprod.php" enctype="multipart/form-data">
		<div>
			<label for="nome">Nome do produto:</label>
			<input type="text" id="nome" name="nome" placeholder="Insira o nome do produto" required>
		</div>
		
		<div>
			<label></label>
			<select id="marca" name="marca">
				<option disabled selected>--Selecione a marca do produto--</option>

				<?php 
				
				while($rowMarcas = mysqli_fetch_assoc($marcasQuery)) {

					$idMarca = $rowMarcas['id'];
					$nomeMarca = $rowMarcas['marca'];

					echo "<option value='$idMarca'>$nomeMarca</option>";

				};

				?>
			</select>
		</div>

		<div>
			<label for="preco">Preço do produto:</label>
			<input type="text" id="preco" name="preco" placeholder="Insira o preço do produto" required>
		</div>

		<div>
			<label for="quantidade">Quantidade do produto:</label>
			<input type="text" id="quantidade" name="quantidade" placeholder="Insira a quantidade do produto" required>
		</div>

		<div>
			<label for="categoria">Categoria do produto:</label>
			<select id="categoria" name="categoria">
				<option disabled selected>--Selecione Uma Categoria--</option>

				<?php

					while($rowCategorias = mysqli_fetch_assoc($insertCategoria)) {

					$idCategoria = $rowCategorias['id'];
					$nomeCategoria = $rowCategorias['categoria'];
					echo "<option value='$idCategoria'>$nomeCategoria</option>";

				};
			
				?>
				
			</select>
		</div>

		<div>
			<select id="subcategoria" name="subcategoria">
				<option disabled selected>--Selecione Qual Instrumento--</option>

			</select>
		</div>

		<div>
			<label for="descricao">Descrição do produto:</label>
			<input type="text" id="descricao" name="descricao" placeholder="Insira a descrição do produto" required>
		</div>

		<div id='image1'>
			<label for="image1">Imagem 1</label>
			<input type="file" name="image1" required>
		</div>

		<div id='image2'>
			<label for="image2">Imagem 2</label>
			<input type="file" name="image2">
		</div>

		<div id='image3'>
			<label for="image3">Imagem 3</label>
			<input type="file" name="image3">
		</div>

		<input type="submit" value="Adicionar produto">

	</form>

	<?php
		include('geral/footerSite.php');
		include('../PHP/cadprod3.php');
	?>

	<script src="../javaScriptt/cadprod-subcategorias.js"></script>
	<script src="../javaScriptt/caracteres-nomeProd.js" defer></script>

</body>
</html>