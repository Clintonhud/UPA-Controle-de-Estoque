<?php

session_start();

$host = "localhost";
$user = "root";
$senha = "";
$banco = "upa";

$quantidade = $_POST['qtd'];
$lote = $_POST['lote'];

$conn = mysqli_connect($host, $user, $senha, $banco);

$pesquisa = "SELECT * FROM cadastrar_medicamento WHERE lote_medicamento = '$lote'";
$result = mysqli_query($conn, $pesquisa);

while ($tbl = mysqli_fetch_array($result)) {
    if ($tbl["qtd_lote"] > $quantidade) {
        $sql = "UPDATE cadastrar_medicamento SET qtd_lote = qtd_lote - '$quantidade' WHERE lote_medicamento = '$lote'";
        $query = mysqli_query($conn, $sql);

        $sql2 = "UPDATE cadastrar_medicamento SET total_retirada = total_retirada + '$quantidade' WHERE lote_medicamento = '$lote'";
        $query = mysqli_query($conn, $sql2);

        header('Location: ../medicamento.php');
    } else {
        echo "<script>alert('Quantidade Acima do Estoque!');
    location.href=\"../Medicamento.php\"</script>";
    }
}
