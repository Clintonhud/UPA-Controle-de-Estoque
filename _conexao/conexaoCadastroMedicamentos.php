<?php

session_start();

$lote = $_POST['lote'];
$nome = $_POST['nome'];
$dataEntrada = $_POST['dataEntrada'];
$qtdLote = $_POST['qtdLote'];
$dataValidade = $_POST['dataValidade'];
$forma = $_POST['forma'];
$concentracao = $_POST['concentracao'];
$retirada = 0;
$login = 1;

$conexao = mysqli_connect("localhost", "root", "", "upa") or die(mysqli_error("Falha na conexao do banco"));

$cadastro = ("INSERT INTO `cadastrar_medicamento` (`lote_medicamento`, `nome_item`, `data_entrada`, `qtd_lote`, `data_validade`, `forma_farmaceutica`, `concentracao`, `total_retirada`, `login_idlogin`)
    VALUES('$lote', '$nome', '$dataEntrada', '$qtdLote', '$dataValidade', '$forma', '$concentracao', '$retirada', '$login')");

mysqli_query($conexao, $cadastro);

if ($cadastro == '') {
    echo "<script>alert('Houve um erro ao cadastrar!');
    location.href=\"cadastroMedicamento.php\"</script>";
} else {
    echo "<script>alert('Registro cadastrado com sucesso!');
    location.href=\"../medicamento.php\"</script>";
}
