<?php
session_start();

$login = $_POST['usuario'];
$senha = $_POST['senha'];

$conexao = mysqli_connect('localhost', 'root', '', 'upa') or die("sem conexao Servidor");

$consulta = mysqli_query($conexao, "select * from `login` WHERE `usuario` = '$login' and `senha`= '$senha'");
if (mysqli_num_rows($consulta) > 0) {
	$_SESSION['usuario'] = $login;
	#	$_SESSION['senha'] = $senha;
	header('location: ../principal.php');
	exit;
	#	if (isset($_SESSION['usuario'])) {
	#		echo "Nome do usuario: " .  $_SESSION['usuario'] . "<br>";
	#	}
} else {
	unset($_SESSION['usuario']);
	#	unset($_SESSION['senha']);
	header('location: ../index.php');
	exit;
}
/*
// Pega os dados do usuário
$stmt = $conexao->prepare("SELECT `idlogin` FROM `login` WHERE `usuario` = ? AND `senha` = ?");
$stmt->bind_param('ss', $login, $senha);
$stmt->execute();
$res = $stmt->get_result();

// Verifica se encontrou o usuário
if ($res->num_rows) {
	$row = $res->fetch_array(MYSQLI_ASSOC);
	$_SESSION['usuario'] = $row['idlogin']; // Marca a global para verificar se o usuário está logado.
	header('Location: ../principal.html'); // Página do sistema
	exit; // Encerra a execução do script
} else {
	// Se não encontrou o usuário, manda de volta para o form de login
	header('Location: ../index.html'); // Página do sistema
	exit; // Encerra a execução do script
}
*/