<?php

if(isset($_POST['email'])) {
    include("conexao.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql_code = "SELECT * FROM cadastro WHERE email='$email' LIMIT 1";
    $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);


    $usuario = $sql_exec->fetch_assoc();
    if(password_verify($senha, $usuario['senha'])) {
        if(!isset($_SESSION))
            session_start();
        $_SESSION['usuario'] = $usuario['id'];
        header("Location: menu.php");
    } else {
        echo "Falha ao logar! Senha ou email incorretos";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="">
        <p>
            <label for="">Email</label>
            <input class="caixa-login" placeholder="Email" name="email" type="text">
        </p>
        <p>
            <label for="">Senha</label>
            <input class="caixa-login" placeholder="Senha" name="senha" type="password">
        </p>
        <button type="submit">Logar</button>
    </form>
</body>
</html>
