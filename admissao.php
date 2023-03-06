<?php
//Inclui no banco de dados os dados preenchidos do formulario de admissao
if(isset($_POST['nome_funcionario'])) {
    include('conexao.php');

    $nome = $_POST['nome_funcionario'];
    $cpf = $_POST['cpf_funcionario'];
    $cargo = $_POST['cargo'];
    $salario = $_POST['salario'];
    $nascimento = $_POST['data_nascimento'];

    $sql_code = "INSERT INTO funcionarios (nome, nascimento, data_admissao, cargo, cpf, salario) 
    VALUE('$nome', '$nascimento', NOW(), '$cargo', '$cpf', '$salario')";

    $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
    if($deu_certo) 
        unset($_POST);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admissão</title>
</head>
<body>
    <h1>Cadastro de Funcionário</h1>
    <form method="POST" action="">
        <p>
            Nome:
            <input name="nome_funcionario" type="text">
        </p>
        <p>
            Cpf: 
            <input name="cpf_funcionario" type="text">
        </p>
        <p>
            Data de nascimento:
            <input name="data_nascimento" type="text">
        </p>
        <p>
            Cargo Atual:
            <input name="cargo" type="text">
        </p>
        <p>
            <label>Salário(mês):</label>
            <input name="salario" type="text">
        </p>
        <button type="submit">Salvar dados</button>
    </form>
</body>
</html>
