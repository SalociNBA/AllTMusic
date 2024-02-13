<?php

include('conn.php');

// Verifica se houve um POST do formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Obtém os dados do formulário
  $nome = $_POST['nome'];
  $marca = $_POST['marca'];
  $preco = $_POST['preco'];
  $estoque = $_POST['quantidade'];
  $categoria = $_POST['categoria'];
  $subcategoria = $_POST['subcategoria'];
  $descricao = $_POST['descricao'];
  $caminhoImage1 = "../midia/Fotos/instrumento/$nome(1).png";

  //Faz a verificaçção se foi enviado uma imagem 2
  if(!empty($_FILES['image2']['nome'])){
    $caminhoImage2 = "../midia/Fotos/instrumento/$nome(2).png";
  } else {
    $caminhoImage2 = null;
  };

  //Faz a verificação se foi enviado uma imagem 3
  if(!empty($_FILES['image3']['nome'])){
    $caminhoImage2 = "../midia/Fotos/instrumento/$nome(3).png";
  } else {
    $caminhoImage3 = null;
  };

  //Faz a verificação se a imagem1 atende aos requisitos para ser enviada ao banco de dados
  if(!empty($_FILES['image1']['name'])) {

    $nomeArquivoImg1 = $_FILES['image1']['name'];
    $tipoImg1 = $_FILES['image1']['type'];
    $nomeTemporarioImg1 = $_FILES['image1']['tmp_name'];
    $tamanhoImg1 = $_FILES['image1']['size'];
    $errosImg1 = array();

    $tamanhoMaximo = 1024 * 1024 * 5; //5 MB
    if($tamanhoImg1 > $tamanhoMaximo) {
        $errosImg1[] = "Seu Arquivo excede o tamanho máximo permitido!<br>";
    };

    //validação pelo MIME-TyPE (recomendado)
    $tiposPermitidos = ["image/png", "image/jpg", "image/jpeg"];
    if(!in_array($tipoImg1, $tiposPermitidos)) {
        $errosImg1[] = "tipo do Arquivo não permitido<br>";
    };

    if(!empty($errosImg1)) {
        foreach($errosImg1 as $erro1) {
            echo $erro1;
        };
    } else {
        move_uploaded_file($nomeTemporarioImg1, '../midia/Fotos/instrumento/'.$nome.'(1).png'); 
    };

  };

  if(!empty($_FILES['image2']['name'])) {

    $nomeArquivoImg2 = $_FILES['image2']['name'];
    $tipoImg2 = $_FILES['image2']['type'];
    $nomeTemporarioImg2 = $_FILES['image2']['tmp_name'];
    $tamanhoImg2 = $_FILES['image2']['size'];
    $errosImg2 = array();

    $tamanhoMaximo = 1024 * 1024 * 5; //5 MB
    if($tamanhoImg2 > $tamanhoMaximo) {
        $errosImg2[] = "Seu Arquivo excede o tamanho máximo permitido!<br>";
    };

    //validação pelo MIME-TyPE (recomendado)
    $tiposPermitidos = ["image/png", "image/jpg", "image/jpeg"];
    if(!in_array($tipoImg2, $tiposPermitidos)) {
        $errosImg2[] = "tipo do Arquivo não permitido<br>";
    };

    if(!empty($errosImg2)) {
        foreach($errosImg2 as $erro2) {
            echo $erro2;
        };
    } else {
        move_uploaded_file($nomeTemporarioImg2, '../midia/Fotos/instrumento/'.$nome.'(2).png'); 
    };

  };

  if(!empty($_FILES['image3']['name'])) {

    $nomeArquivoImg3 = $_FILES['image3']['name'];
    $tipoImg3 = $_FILES['image3']['type'];
    $nomeTemporarioImg3 = $_FILES['image3']['tmp_name'];
    $tamanhoImg3 = $_FILES['image3']['size'];
    $errosImg3 = array();

    $tamanhoMaximo = 1024 * 1024 * 5; //5 MB
    if($tamanhoImg3 > $tamanhoMaximo) {
        $errosImg3[] = "Seu Arquivo excede o tamanho máximo permitido!<br>";
    };

    //validação pelo MIME-TyPE (recomendado)
    $tiposPermitidos = ["image/png", "image/jpg", "image/jpeg"];
    if(!in_array($tipoImg3, $tiposPermitidos)) {
        $errosImg3[] = "tipo do Arquivo não permitido<br>";
    };

    if(!empty($errosImg3)) {
        foreach($errosImg3 as $erro3) {
            echo $erro3;
        };
    } else {
        move_uploaded_file($nomeTemporarioImg3, '../midia/Fotos/instrumento/'.$nome.'(3).png'); 
    };

  };

  // Insere os dados na tabela "produto"
  $insertProdutoSearch = "INSERT INTO produtos (nome, descricao, marca, categoria, subcategoria, preco, estoque, imagem1, imagem2, imagem3) VALUES ('$nome', '$descricao', '$marca', '$categoria', '$subcategoria', '$preco', '$estoque', '$caminhoImage1', '$caminhoImage2', '$caminhoImage3')";

  $insertProdutoQuery = mysqli_query($conexao, $insertProdutoSearch);

};

header("../html/pag-cadprod.php");

?>

