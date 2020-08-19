<?php

$host = "localhost";
$user = "root";
$senha = "";
$banco = "upa";
$lote = $_POST['lote_lab_venc'];

$conn = mysqli_connect($host, $user, $senha, $banco);

$sql = "UPDATE cadastrar_itens_laboratoriais SET vencimentol = 1 WHERE lote_laboratorio = '$lote'";
$query = mysqli_query($conn, $sql);

header('Location: ../itenslaboratoriais.php');
