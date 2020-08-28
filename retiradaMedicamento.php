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
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Página Principal</title>
        <link rel="stylesheet" href="_css/estilo.css">
        <link rel="stylesheet" href="_css/cadastro.css">

        <script language="javascript" src="_javascript/funcoes.js"></script>
    </head>

    <body>
        <header id="cabecalho">
            <h1>Controle de Estoque > Medicamentos > Retirada de Estoque</h1>
            <p><a href="medicamento.php">Voltar</a></p>
        </header>

        <?php

        $lote = $_POST['lote_med'];


        ?>

        <section id="principal">
            <h1 id="med">Retirada de Medicamentos</h1>
            <form method="POST" action="_conexao/conexaoRetirarMed.php">
                <p class="solo"><label for="cMed">Quantidade Requerida</label></p> <br><input type="number" class="grande" id="cMed" name="qtd" required autofocus />

                <input type="hidden" name="lote" value="<?php echo $lote ?>">

                <button type="submit">Retirar</button>
            </form>
        </section>

        <?php

        ?>

    </body>

    </html>
<?php
}
?>