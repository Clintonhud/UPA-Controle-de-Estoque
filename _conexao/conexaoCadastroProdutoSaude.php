<?php

session_start();

$lote = $_POST['lote'];
$nome = $_POST['nome'];
$dataEntrada = $_POST['dataEntrada'];
$qtdLote = $_POST['qtdLote'];
$dataValidade = $_POST['dataValidade'];
$modalidade = $_POST['modalidade'];
$login = 1;

$conexao = mysqli_connect("localhost", "root", "", "upa") or die(mysqli_error("Falha na conexao do banco"));

$cadastro = ("INSERT INTO `cadastrar_produto_saude` (`lote_saude`, `nome_items`, `data_entradas`, `qtd_lotes`, `data_validades`, `modalidade`, `login_idlogin`)
    VALUES('$lote', '$nome', '$dataEntrada', '$qtdLote', '$dataValidade', '$modalidade', '$login')");

mysqli_query($conexao, $cadastro);

if ($cadastro == '') {
    echo "<script>alert('Houve um erro ao cadastrar!');
    location.href=\"cadastroProdutoSaude.php\"</script>";
} else {
    echo "<script>alert('Registro cadastrado com sucesso!');
    location.href=\"../produtoSaude.php\"</script>";
}
