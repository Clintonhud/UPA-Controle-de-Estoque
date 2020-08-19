<?php

$host = "localhost";
$user = "root";
$senha = "";
$banco = "upa";
$lote = $_POST['lote_sau_venc'];

$conn = mysqli_connect($host, $user, $senha, $banco);

$sql = "UPDATE cadastrar_produto_saude SET vencimentos = 1 WHERE lote_saude = '$lote'";
$query = mysqli_query($conn, $sql);

header('Location: ../produtoSaude.php');
