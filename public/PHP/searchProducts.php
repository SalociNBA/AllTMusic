<?php

include("conn.php");

$busca = $_POST['busca'];

if($_POST['busca'] == null) {
    header("location: ../html/pag-index.php");
} else {
    $siteRedirect = "location: ../html/pag-searchProducts.php?busca=" . $busca . "&pagina=1";
    header($siteRedirect);
};

?>