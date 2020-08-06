<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="_css/estilo.css">
    <link rel="stylesheet" href="_css/cadastro.css">
</head>

<body>
    <header id="cabecalho">
        <h1>Controle de Estoque > Produtos para Saúde</h1>
        <p><a href="produtoSaude.php">Voltar</a></p>
    </header>
    <section id="principal">
        <h1>Cadastrar Produto para Saúde</h1>
        <form method="POST" action="_conexao/conexaoCadastroProdutoSaude.php">
            <p class="solo"><label for="cProduto">Nome do Produto</label></p> <br><input type="text" class="grande" id="cProduto" name="nome" required autofocus />
            <p class="outros"><label for="cData">Data de Entrada</label></p>
            <p id="lote"><label for="cLote">Lote</label></p>
            <input type="date" class="pequeno" id="cData" name="dataEntrada" required autofocus />
            <input type="text" class="pequeno" id="cLote" name="lote" required autofocus />
            <p class="outros"><label for="cQtdLote">Quantidade em Lote</label></p>
            <p id="lateralpeq"><label for="cValidade">Data de Validade</label></p>
            <input type="number" class="pequeno" id="cQtdLote" name="qtdLote" required autofocus />
            <input type="date" class="pequeno" id="cValidade" name="dataValidade" required autofocus />
            <p class="solo"><label for="cModalidade">Modalidade</label></p><br>
            <input type="text" class="grande" id="cModalidade" name="modalidade" required autofocus /><br>
            <button type="submit">Cadastrar</button>
        </form>
    </section>

</body>

</html>