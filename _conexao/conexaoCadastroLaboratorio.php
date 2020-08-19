<?php

session_start();

$lote = $_POST['lote'];
$nome = $_POST['nome'];
$dataEntrada = $_POST['dataEntrada'];
$qtdLote = $_POST['qtdLote'];
$dataValidade = $_POST['dataValidade'];
$forma = $_POST['forma'];
$login = 1;
$retirada = 0;
$vencimento = 0;

$conexao = mysqli_connect("localhost", "root", "", "upa") or die(mysqli_error("Falha na conexao do banco"));

$cadastro = ("INSERT INTO `cadastrar_itens_laboratoriais` (`lote_laboratorio`, `nome_iteml`, `data_entradal`, `qtd_lotel`, `data_validadel`, `forma`, `total_retirada_lab`, `vencimentol`, `login_idlogin`)
    VALUES('$lote', '$nome', '$dataEntrada', '$qtdLote', '$dataValidade', '$forma', '$retirada', $vencimento, '$login')");

mysqli_query($conexao, $cadastro);

if ($cadastro == '') {
    echo "<script>alert('Houve um erro ao cadastrar!');
    location.href=\"cadastroItensLaboratoriais.php\"</script>";
} else {
    echo "<script>alert('Registro cadastrado com sucesso!');
    location.href=\"../itenslaboratoriais.php\"</script>";
}
