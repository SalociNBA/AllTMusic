<?php

include("../PHP/conn.php");

//Para definir a pagina que o usuario está navegando
$pagina = filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT);

$limite = 30;

$inicio = ($pagina * $limite) - $limite;

//Para mostrar os produtos conforme a pagina que o usuário está navegando



if(!isset($_GET['busca']) || $_GET['busca'] == null) {

    header('location../html/pag-index.php');
    
} else {

        $userBusca = $conexao->real_escape_string($_GET['busca']);

        //pesquisar o produto pelo nome, descrição, marca, categoria, subcategoria
        $userSearch = "SELECT *
        FROM produtos
        WHERE (produtos.nome LIKE '%$userBusca%'
        OR produtos.descricao LIKE '%$userBusca%'
        OR produtos.marca = (SELECT id
                            FROM marcas
                            WHERE marca LIKE '%$userBusca%')
        OR produtos.categoria = (SELECT id
                                FROM categorias
                                WHERE Categoria LIKE '%$userBusca%')
        OR produtos.subcategoria = (SELECT id
                                    FROM subcategorias
                                    WHERE subcategoria LIKE '%$userBusca%'))";

        //Inserção dos filtros para a busca
        if(isset($_GET['categ'])) {
            $categFilter = $_GET['categ'];
            $userSearch .= "AND produtos.categoria = '$categFilter'";
        }

        //PEgando o número de linhas para fazer a divisão de produtos na paginação
        $userSearchNumRows = mysqli_query($conexao, $userSearch);
        $userSearchNumRows = $userSearchNumRows->num_rows;

        //Pesquisa de produtos com limitação para ser exibido na página
        //$userSearch .= "LIMIT $inicio, $limite"; //LIMIT[ANTES DO PRIMEIRO ITEM QUE APARECE], [QUANTOS APARECERÃO]
        $userSearchQuery = mysqli_query($conexao, $userSearch);

    }

    $numPaginas = ceil($userSearchNumRows/$limite);