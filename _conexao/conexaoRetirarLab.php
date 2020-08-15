<?php

session_start();

$host = "localhost";
$user = "root";
$senha = "";
$banco = "upa";

$quantidade = $_POST['qtd'];
$lote = $_POST['lote'];

$conn = mysqli_connect($host, $user, $senha, $banco);

$pesquisa = "SELECT * FROM cadastrar_itens_laboratoriais WHERE lote_laboratorio = '$lote'";
$result = mysqli_query($conn, $pesquisa);

while ($tbl = mysqli_fetch_array($result)) {
    if ($tbl["qtd_lotel"] > $quantidade) {
        $sql = "UPDATE cadastrar_itens_laboratoriais SET qtd_lotel = qtd_lotel - '$quantidade' WHERE lote_laboratorio = '$lote'";
        $query = mysqli_query($conn, $sql);

        $sql2 = "UPDATE cadastrar_itens_laboratoriais SET total_retirada_lab = total_retirada_lab + '$quantidade' WHERE lote_laboratorio = '$lote'";
        $query = mysqli_query($conn, $sql2);

        header('Location: ../itenslaboratoriais.php');
    } else {
        echo "<script>alert('Quantidade Acima do Estoque!');
    location.href=\"../itenslaboratoriais.php\"</script>";
    }
}
