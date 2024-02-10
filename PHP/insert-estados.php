<?php

include('conn.php');

$estadoSearch = "SELECT * FROM estados";
$estadosQuery = mysqli_query($conexao, $estadoSearch);