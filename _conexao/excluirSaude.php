<?php

$host = "localhost";
$user = "root";
$senha = "";
$banco = "upa";
$lote_saude = $_POST['lote_saude'];

$conn = mysqli_connect($host, $user, $senha, $banco);

$sql = "DELETE FROM cadastrar_produto_saude WHERE lote_saude = '$lote_saude' ";

$query = mysqli_query($conn, $sql);

header('Location: ../produtoSaude.php');
