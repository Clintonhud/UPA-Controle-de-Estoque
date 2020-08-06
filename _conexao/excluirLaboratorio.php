<?php

$host = "localhost";
$user = "root";
$senha = "";
$banco = "upa";
$lote_laboratorio = $_POST['lote_laboratorio'];

$conn = mysqli_connect($host, $user, $senha, $banco);

$sql = "DELETE FROM cadastrar_itens_laboratoriais WHERE lote_laboratorio = '$lote_laboratorio' ";

$query = mysqli_query($conn, $sql);

header('Location: ../itenslaboratoriais.php');
