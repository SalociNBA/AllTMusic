<?php

include('conn.php');

if(isset($_GET['estado'])) {
    $estado = $_GET['estado'];

    $cidadesSearch = "SELECT * FROM cidades WHERE id_estado = '$estado'";
    $cidadesQuery = mysqli_query($conexao, $cidadesSearch);
}; ?>

<option selected disabled value="null">--SELECIONE SUA CIDADE--</option>

<?php

while ($cid = mysqli_fetch_assoc($cidadesQuery)) { ?>

<option value="<?php echo $cid['id']; ?>"><?php echo $cid['nome']; ?></option>

<?php
};
