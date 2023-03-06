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
