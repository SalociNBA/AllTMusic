<?php
include('../PHP/insert-estados.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../CSS/register2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <!--As informações inseridas aqui serão apenas para clientes, no caso de um novo funcionário, o email será criado direto no banco de dados-->
    <div class="square">
        <div class="register">
            <form id="form" method="post" action="">

                <h1>REGISTRAR</h1>

                <div class="conjunto-dados">
                    <div class="dados" id="nomediv">
                        <label for="nome">Nome Completo</label>
                        <input type="text" name="nome" id="nome">
                    </div>    
                </div>
                

                <div class="conjunto-dados">
                    <div class="dados" id="cpfdiv">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" id="cpf" maxlength="14" onkeypress="$(this).mask('000.000.000-00');">
                    </div>

                    <div class="dados" id="nascdiv">
                        <label for="data_nasc">Data de Nascimento</label>
                        <input type="date" name="data_nasc" id="data_nasc">
                    </div>

                    <div class="dados" id="celdiv">
                        <label for="cel">Celular</label>
                        <input type="number" id="cel" name="cel" maxlength="14" placeholder="(xx) xxxxx-xxxx">
                    </div>
                </div>

                <div class="conjunto-dados">
                    <div class="dados" id="emaildiv">
                        <label for="email">E-Mail</label>
                        <input type="email" id="email" name="email">
                    </div>
                    
                    <div class="dados" id="email1div">
                        <label for="confir">Confirme seu E-Mail</label>
                        <input type="email" id="email2" name="email2">
                    </div>                    
                </div>

                <div class="conjunto-dados">
                    <div class="dados" id="cepdiv">
                        <label for="cep">CEP</label>
                        <input type="text" name="cep" id="cep" onkeypress="$(this).mask('00.000-000')">
                    </div>
                    <div class="dados" id="enddiv">
                        <label for="end">Endereço</label>
                        <input type="text" placeholder="ex. R. Astolfinho Guerra" minlength="8" name="endereco" id="endereco">
                    </div>
                    <div class="dados" id="numdiv">
                        <label for="num">Nº</label>
                        <input type="number" name="n-end" id="n-end">
                    </div>
                </div>

                <div class="conjunto-dados-select">
                    <div class="dados-select" id="estdiv">
                        <label>Estado</label>
                        <select name="estado" id="estado">
                            <option selected disabled value="">--SELECIONE SEU ESTADO--</option>

                                <?php
                                while($est = mysqli_fetch_assoc($estadosQuery)) { ?>
                                    <option value="<?php echo $est['id'];?>"><?php echo $est['uf'];?></option>
                                <?php
                                };
                                ?>

                        </select>
                    </div>
                    <div class="dados-select" id="ciddiv">
                        <label>Cidade</label>
                        <select name="cidade" id="cidade">
                            <option selected disabled value="">--SELECIONE SUA CIDADE--</option>
                        </select>
                    </div>
                </div>
                
                <div class="conjunto-dados">
                    <div class="dados">
                        <label>Complemento</label>
                        <input type="text" placeholder="Ex: próximo ao campo de areia, portão verde" name="complemento" id="complemento">
                    </div>
                </div>

                <div class="conjunto-dados">
                    <div class="dados" id="senhadiv">
                        <label>Senha</label>
                        <input type="password" id="user-senha" name="user-senha">
                    </div>
                    <div class="dados" id="senhaconfirdiv"> 
                        <label>confirme sua Senha</label>
                        <input type="password" id="user-senha2" name="user-senha2">
                    </div>
                </div>

                <button id="button-register">REGISTRAR</button>

                <div id="entrar">
                    Já possui uma conta?
                    <a href="../html/pag-login.php">Entrar</a>
                </div>

            </form>
            <div class="image"></div>
        </div>
    </div>

    <?php
		include('geral/footerSite.php');
        include('../PHP/register.php');
	?>
    <script src="../javaScriptt/bloqCaracteresRegister.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="../javaScriptt/register33.js"></script>

</body>

</html>
