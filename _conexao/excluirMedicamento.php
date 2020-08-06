<?php

$host = "localhost";
$user = "root";
$senha = "";
$banco = "upa";
$lote = $_POST['lote_medicamento'];

$conn = mysqli_connect($host, $user, $senha, $banco);

$sql = "DELETE FROM cadastrar_medicamento WHERE lote_medicamento = '$lote'";

$query = mysqli_query($conn, $sql);

header('Location: ../medicamento.php');
