<?php

$host = "localhost";
$user = "root";
$senha = "";
$banco = "upa";
$lote = $_POST['lote_med_venc'];

$conn = mysqli_connect($host, $user, $senha, $banco);

$sql = "UPDATE cadastrar_medicamento SET vencimento = 1 WHERE lote_medicamento = '$lote'";
$query = mysqli_query($conn, $sql);

header('Location: ../medicamento.php');
