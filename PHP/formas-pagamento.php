<?php

include("conn.php");

$formasSearch = "SELECT * FROM formas_pagamento";
$formasQuery = mysqli_query($conexao, $formasSearch);