<?php

if(!isset($_SESSION))
    session_start();

if(!isset($_SESSION['usuario']))
    die('Você não está logado. <a href="login.php"> Clique aqui</a> para logar.');

if(isset($_POST['email'])) {
    
    include('conexao.php');

    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $mysqli->query("INSERT INTO cadastro (email, senha) VALUES('$email', '$senha')");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <a href="login.php">Voltar para o login</a>
    <form method="POST" action="">
        <p>
            <label>Nome:</label>
            <input value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>" name="nome" type="text">
        </p>
        <p>
            <label>E-mail:</label>
            <input value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" name="email" type="text">
        </p>
        <p> 
            <label>Senha:</label>
            <input value="<?php if(isset($_POST['senha'])) echo $_POST['senha']; ?>" name="senha" type="text">
        </p>
        <p>
            <button type="submit">Salvar Login</button>
        </p>
</form>
</body>
</html>
