<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    echo "<script>alert('Realize o login para acessar o sistema!');
    location.href=\"./index.php\"</script>";
} else {
?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="_imagens/titulo.png">
        <title>Cadastro de Medicamentos</title>
        <link rel="stylesheet" href="_css/estilo.css">
        <link rel="stylesheet" href="_css/cadastro.css">
    </head>

    <body>
        <header id="cabecalho">
            <h1>Controle de Estoque > Medicamentos </h1>
            <p><a href="medicamento.php">Voltar</a></p>
        </header>
        <section id="principal">
            <h1 id="med">Cadastrar Medicamentos</h1>
            <form method="POST" action="_conexao/conexaoCadastroMedicamentos.php">
                <p class="solo"><label for="cMed">Nome do Medicamento</label></p> <br><input type="text" class="grande" id="cMed" name="nome" required autofocus />
                <p class="outros"><label for="cData">Data de Entrada</label></p>
                <p id="lote"><label for="cLote">Lote</label></p>
                <input type="date" class="pequeno" id="cData" name="dataEntrada" required autofocus />
                <input type="text" class="pequeno" id="cLote" name="lote" required autofocus />
                <p class="outros"><label for="cQtdLote">Quantidade em Lote</label></p>
                <p id="lateralpeq"><label for="cValidade">Data de Validade</label></p>
                <input type="number" class="pequeno" id="cQtdLote" name="qtdLote" required autofocus />
                <input type="date" class="pequeno" id="cValidade" name="dataValidade" required autofocus />
                <p class="solo"><label for="cFormula">Forma Farmacêutica</label></p><br>
                <input type="text" class="grande" id="cFormula" name="forma" placeholder="Ex: Comprimido, Frasco, Frasco/Ampola, Ampola, Bisnaga" required autofocus />
                <p class="solo"><label for="cConcent">Concentração</label></p><br>
                <input type="text" class="grande" id="cConcent" name="concentracao" required autofocus /><br>
                <button type="submit">Cadastrar</button>
            </form>
        </section>

    </body>

    </html>
<?php
}
?>