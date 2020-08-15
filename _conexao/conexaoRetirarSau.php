<?php

session_start();

$host = "localhost";
$user = "root";
$senha = "";
$banco = "upa";

$quantidade = $_POST['qtd'];
$lote = $_POST['lote'];

$conn = mysqli_connect($host, $user, $senha, $banco);

$pesquisa = "SELECT * FROM cadastrar_produto_saude WHERE lote_saude = '$lote'";
$result = mysqli_query($conn, $pesquisa);

while ($tbl = mysqli_fetch_array($result)) {
    if ($tbl["qtd_lotes"] > $quantidade) {
        $sql = "UPDATE cadastrar_produto_saude SET qtd_lotes = qtd_lotes - '$quantidade' WHERE lote_saude = '$lote'";
        $query = mysqli_query($conn, $sql);

        $sql2 = "UPDATE cadastrar_produto_saude SET total_retirada_saude = total_retirada_saude + '$quantidade' WHERE lote_saude = '$lote'";
        $query = mysqli_query($conn, $sql2);

        header('Location: ../produtoSaude.php');
    } else {
        echo "<script>alert('Quantidade Acima do Estoque!');
    location.href=\"../produtoSaude.php\"</script>";
    }
}
