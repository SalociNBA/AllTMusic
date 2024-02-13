<?php
include('conn.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter os dados do formulário
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $dataNasc = $_POST['data_nasc'];
    $email = $_POST['email'];
    $emailConfirm = $_POST["email2"];
    $celular = $_POST['cel'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $num = $_POST['n-end'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $complemento = $_POST['complemento'];
    $senha = $_POST['user-senha'];
    $senhaConfirm = $_POST['user-senha2'];

    $erros = [];
    //Verificação se o nome não está vazio
    if($nome == null) {
        $erros[] = "<script>var nomediv = document.getElementById('nomediv');
        nomediv.innerHTML += '<p class=\"msn-erro\">*O campo Nome precisa ser preenchido</p>';</script>";
    }

    //Verificação se o CPF válido já foi registrado no banco de dados
    $cpfbusca = "SELECT cpf FROM usuarios WHERE cpf='$cpf'";
    $cpfquery = mysqli_query($conexao, $cpfbusca);

    if ($cpfquery->num_rows > 0) {
        $erros[] = "<script>var cpfdiv = document.getElementById('cpfdiv');
        cpfdiv.innerHTML += '<p class=\"msn-erro\">* O CPF inserido já está em uso</p>';</script>";
    }
    //Se o CPF não está vazio
    $cpf = preg_replace('/\D/', '', $cpf);
    if(strlen($cpf) !== 11) {
        $erros[] = "<script>var cpfdiv = document.getElementById('cpfdiv');
        cpfdiv.innerHTML += '<p class=\"msn-erro\">* Insira seu CPF</p>';</script>";
    }

    //Verificar se foi inserido um email
    if($email == null) {
        $erros[] = "<script>var emaildiv = document.getElementById('emaildiv');
        emaildiv.innerHTML += '<p class=\"msn-erro\">* Insira seu E-mail Principal</p>';</script>";
    }
    //verificar se o já existe o email no banco de dados
    $emailbusca = "SELECT e_mail FROM usuarios WHERE '$email' = e_mail";
    $emailQuery = mysqli_query($conexao, $emailbusca);
    if($emailQuery->num_rows > 0) {
        $erros[] = "<script>var emaildiv = document.getElementById('emaildiv');
        emaildiv.innerHTML += '<p class=\"msn-erro\">* Este e-mail já está em uso</p>';</script>";
    }
    //Verificação se os email e o de confirmação coincidem
    if($email != $emailConfirm) {
        $erros[] = "<script>var email1div = document.getElementById('email1div');
        email1div.innerHTML += '<p class=\"msn-erro\">* Os emails não coincidem</p>';</script>";
    }

    //Verificação da data de nascimento vazia
    if($dataNasc == null) {
        $erros[] = "<script>var nascdiv = document.getElementById('nascdiv');
        nascdiv.innerHTML += '<p class=\"msn-erro\">* Insira sua data de nascimento</p>';</script>";
    }

    //verificação se foi inserido um numero de celular
    if (strlen($celular) != 11) {
        $erros[] = "<script>var celdiv = document.getElementById('celdiv');
        celdiv.innerHTML += '<p class=\"msn-erro\">* Insira um numero para contato</p>';</script>";
    }

    //Verificação se um CEP foi digitado
    $cep = preg_replace('/\D/', '', $cep);
    if (strlen($cep) !== 8) {
        $erros[] = "<script>var cepdiv = document.getElementById('cepdiv');
        cepdiv.innerHTML += '<p class=\"msn-erro\">* Insira seu CEP</p>';</script>";
    }

    //confirmação se um endereço foi enviado
    if (strlen($cep) == null) {
        $erros[] = "<script>var enddiv = document.getElementById('enddiv');
        enddiv.innerHTML += '<p class=\"msn-erro\">* Insira seu endereço</p>';</script>";
    }

    //Verifica se um número do endereço foi inserido
    if ($num == null) {
        $erros[] = "<script>var numdiv = document.getElementById('numdiv');
        numdiv.innerHTML += '<p class=\"msn-erro\">* Insira o número do endereço</p>';</script>";
    }

    //Verificação se um estado foi selecionado
    if ($estado == null) {
        $erros[] = "<script>var estdiv = document.getElementById('estdiv');
        estdiv.innerHTML += '<p class=\"msn-erro\">* escolha seu estado</p>';</script>";
    }

    //verificação se uma cidade foi selecionada
    if ($cidade == null) {
        $erros[] = "<script>var ciddiv = document.getElementById('ciddiv');
        ciddiv.innerHTML += '<p class=\"msn-erro\">* escolha sua cidade</p>';</script>";
    }

    //Verificação da força da senha
    //quantidade caracteres
    if (strlen($senha) < 8) {
        $erros[] = "<script>var senhadiv = document.getElementById('senhadiv');
        senhadiv.innerHTML += '<p class=\"msn-erro\">* A senha é muito curta: min 8 caracteres</p>';</script>";
    }
    //verificação de letras minuscular
    if(!preg_match('/[a-z]/', $senha)) {
        $erros[] = "<script>var senhadiv = document.getElementById('senhadiv');
        senhadiv.innerHTML += '<p class=\"msn-erro\">* A senha deve conter letras minusculas</p>';</script>";
    }
    //verificação se a senha possui letras maiusculas
    if(!preg_match('/[A-Z]/', $senha)) {
        $erros[] = "<script>var senhadiv = document.getElementById('senhadiv');
        senhadiv.innerHTML += '<p class=\"msn-erro\">* A senha deve conter letras maiusculas</p>';</script>";
    }
    //verificação se possui caracteres especiais
    if(!preg_match('/^[\w$@]{6,}$/', $senha)) {
        $erros[] = "<script>var senhadiv = document.getElementById('senhadiv');
        senhadiv.innerHTML += '<p class=\"msn-erro\">* A senha deve conter caracteres especiais</p>';</script>";
    }
    //verificação se possui número na senha
    if(!preg_match('/[0-9]/', $senha)) {
        $erros[] = "<script>var senhadiv = document.getElementById('senhadiv');
        senhadiv.innerHTML += '<p class=\"msn-erro\">* A senha deve conter números</p>';</script>";
    }
    //Verificação se a senha é compativel com a confirmação
    if($senha !== $senhaConfirm) {
        $erros[] = "<script>var senhaconfirdiv = document.getElementById('senhaconfirdiv');
        senhaconfirdiv.innerHTML += '<p class=\"msn-erro\">* As senhas não correspondem</p>';</script>";
    }

    // Inserir os dados no banco de dados


    if(count($erros) == 0) {
        $registerInsert = "INSERT INTO usuarios (cpf, nome, data_nascimento, e_mail, celular, cep, endereco, num, cidade, estado, complemento, senha) VALUES ('$cpf', '$nome', '$dataNasc', '$email', '$celular', '$cep', '$endereco', '$num', '$cidade', '$estado', '$complemento', '$senha')";
        $registerQuery = mysqli_query($conexao, $registerInsert);
        header("../html/pag-login.php");
    } else {
        foreach($erros as $erro) {
            echo $erro;
        };
    }

}
