<?php
session_start();
$login = $_POST['usuario'];
$senha = $_POST['senha'];

$conexao = mysqli_connect('localhost', 'root', '', 'upa') or die("sem conexao Servidor");

$consulta = mysqli_query($conexao, "select * from `login` WHERE `usuario` = '$login' and `senha`= '$senha'");
if (mysqli_num_rows($consulta) > 0) {
	$_session['usuario'] = $login;
	$_session['senha'] = $senha;
	header('location: ../principal.html');
} else {
	unset($_session['usuario']);
	unset($_session['senha']);
	header('location: ../index.html');
}
