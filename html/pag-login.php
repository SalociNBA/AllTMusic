<?php
include("../PHP/login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:wght@500&display=swap" rel="stylesheet">
</head>

<body>

    <div class="main-login">
        <div class="quadrado">
            <!-- Div do lado esquerdo que terá a merda da imagem-->
            <div class="lLogin">
                <img src="../midia/Fotos/Login (2).png" alt="">
            </div>

            <!-- Div do lado direito que terá o login e o registro-->
            <div class="rLogin">
                <form class="data" action="" method="post">
                    <h1>LOGIN</h1>
                    <input type="email" placeholder="Email" class="entrada" name="email" required>
                    <input type="password" placeholder="Senha" class="entrada" name="password"  id= "password" required>
                    <div id="check">
                        <input type="checkbox" id="chbox">
                        <label for="chbox">Mostrar Senha</label>
                    </div>
                    <button>Login</button>
                    <p id="no-acc">Ainda não possui uma conta?
                        <a href="../html/pag-register.php">Registrar-se</a>
                    </p>
                    <p id="no-pass">Esqueceu sua senha?
                        <a href="#">Recuperar senha</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <?php
		include('geral/footerSite.php');
	?>

    <script src="../javaScriptt/login.js"></script>

</body>

</html>