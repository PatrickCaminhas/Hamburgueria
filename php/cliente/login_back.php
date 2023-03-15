<?php

// Incluir o arquivo de conexão com o banco de dados
include("db_connect.php");

// Verificar se o botão de login foi pressionado
if (isset($_POST['login'])) {

// Capturar os dados do formulário
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

//Verificar se o usuário existe no banco de dados
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);

// Verificar se a consulta retornou algum registro
if (mysqli_num_rows($result) == 1) {

// Verificar se a senha está correta
$user = mysqli_fetch_assoc($result);
if (password_verify($password, $user['password'])) {

// Iniciar a sessão e guardar o nome de usuário
session_start();
$_SESSION['username'] = $username;

// Redirecionar o usuário para a página de perfil
header('location: profile.php');

} else {
// Exibir uma mensagem de erro se a senha estiver incorreta
$errMsg = 'Senha incorreta';
}

} else {
// Exibir uma mensagem de erro se o usuário não existir
$errMsg = 'Usuário não encontrado';
}

}

?>