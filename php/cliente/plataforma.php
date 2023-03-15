<?php

// Incluir o arquivo de conexão com o banco de dados
include("db_connect.php");

// Iniciar a sessão
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['username'])) {
header('location: login.php');
exit;
}

// Capturar o nome do usuário logado
$username = $_SESSION['username'];

// Buscar o usuário no banco de dados
$query = "SELECT * FROM usuario WHERE email = '$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

?>
<html>
<head>
<title>Perfil</title>
</head>
<body>

<h1>Perfil</h1>

<div>
<p>Bem vindo, <?php echo $user['nome']; ?></p>
<a href="pedidos.php">Realizar Pedidos</a>
</div>

<a href="logout.php">Sair</a>

</body>
</html>