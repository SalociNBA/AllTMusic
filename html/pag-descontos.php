<?php
    include("../PHP/descontos3.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descontos</title>
    <link rel="stylesheet" href="../CSS/descontos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <form action="" method="post" id="form-descontos">
            <div id="selectProduto">
                <label>Nome do produto</label> <br>
                <select name = "productSelected" id="productSelected">

                    <?php 

                    while($rowProdutos = mysqli_fetch_assoc($produtosDescQuery)) {
                        $nomeProd = $rowProdutos['nome'];
                        $idProd = $rowProdutos['id'];
                    ?>
                    <option value="<?php echo $idProd ?>"><?php echo $nomeProd ?></option>

                    <?php
                    };
                    ?>
                </select> <br>
            </div><!-- selectProduto -->

            <div id="desconto-content">
                <label>Desconto</label> <br>
                <input type="number" value="" name="descontoProduct" id="descontoProduct">
            </div> <br>
            <input type="submit">
        </form>
    </div>

    <div class="container">
        <table id="descontos-products-display">
            <tr class="cabecalho-descontos-display">
                <td id="desconto-image-display" class="colum-image">Imagem</td>
                <td id="desconto-name-display" class="colum-nome">Nome Produto </td>
                <td id="desconto-desconto-display" class="colum-desconto">Desconto</td>
                <td id="desconto-remover-display" class="colum-remover">Remover Desconto</td>
            </tr>

            <?php
                while($rowDescontos = mysqli_fetch_assoc($descontosQuery)) {
            ?>
                   <tr>
                        <td class="colum-image"><img src="<?php echo $rowDescontos['imagem1']; ?>"></td>
                        <td class="colum-nome"><p><?php echo $rowDescontos['nome']; ?></p></td>
                        <td class="colum-desconto"><p><?php echo $rowDescontos['desconto']; ?>%</p></td>
                        <td class="colum-remover"><a href="../PHP/descontos-remove.php?remover=<?php echo $rowDescontos['id']; ?>">REMOVER</a></td>
                   </tr> 
            <?php
                };
            ?>
        </table>
    </div>

    <?php 
        include('geral/footerSite.php');
        include('../PHP/descontos.php');
    ?>

    <script src="../javaScriptt/descontos.js"></script>

</body>
</html>
