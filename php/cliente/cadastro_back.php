<?php

$dbhost = 'localhost'; // endereço do servidor de banco de dados
$dbuser = 'root'; // usuário do banco de dados
$dbpass = ''; // senha do usuário do banco de dados
$dbname = 'meubanco'; // nome do banco de dados

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$con){
    die('Não foi possível conectar: ' . mysqli_error($con));
}

if(isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuarios (nome, email, senha)
    VALUES ('$nome', '$email', '$senha')";

    if (mysqli_query($con, $sql)) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário: " . mysqli_error($con);
    }
}
?>