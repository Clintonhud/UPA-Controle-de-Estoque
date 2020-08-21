<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="_imagens/titulo.png">
    <title>Relatórios</title>
    <link rel="stylesheet" href="_css/estilo.css">
    <link rel="stylesheet" href="_css/relatorio.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<script>
    $(document).ready(function() {
        $(".valor").on("input", function() {
            var textoDigitado = $(this).val();
            var inputCusto = $(this).attr("custo");
            var inputCusto2 = $(this).attr("custoexemplo");
            $("#" + inputCusto).val(textoDigitado);
            $("#" + inputCusto2).val(textoDigitado);
        });
    });
</script>

<body>
    <header id="cabecalho">
        <h1>Controle de Estoque > Emissão de Relatórios</h1>
        <p><a href="principal.html">Voltar</a></p>
    </header>
    <section id="esquerdo" class="formulario">
        <form method="POST" action="gerarRelatorioMedVenc.php">
            <h1>Relatório dos Produtos Vencidos</h1>
            <p>Data Inicial</p>
            <input type='date' id='valor1' class='valor' name='data_inicial' custo='custo1' custoexemplo='custoexemplo1'>
            <p id="meio">até</p>
            <input type='date' id='valor2' class='valor' name='data_fim' custo='custo2' custoexemplo='custoexemplo2'>
            <p>Data Final</p>
            <button id="espacoCima" type="submit">Estoque Medicamentos</button>
        </form>
        <form method="POST" action="gerarRelatorioSauVenc.php">
            <input type="hidden" type='date' id='custo1' name='data_inicial'>
            <input type="hidden" type='date' id='custo2' name='data_fim'>
            <button type="submit">Produtos para Saúde</button>
        </form>
        <form method="POST" action="gerarRelatorioLabVenc.php">
            <input type="hidden" type='date' id='custoexemplo1' name='data_inicial'>
            <input type="hidden" type='date' id='custoexemplo2' name='data_fim'>
            <button type="submit">Itens Laboratoriais</button>
        </form>
    </section>

    <aside id="direito" class="formulario">
        <form method="POST" action="gerarRelatorioMed.php">
            <h1>Relatorio Geral do Estoque</h1>
            <p>Data Inicial</p>
            <input type='date' id='valor1' class='valor' name='data_inicial' custo='custo1' custoexemplo='custoexemplo1'>
            <p id="meio">até</p>
            <input type='date' id='valor2' class='valor' name='data_fim' custo='custo2' custoexemplo='custoexemplo2'>
            <p>Data Final</p>
            <button id="espacoCima" type="submit">Estoque Medicamentos</button>
        </form>
        <form method="POST" action="gerarRelatorioSau.php">
            <input type="hidden" type='date' id='custo1' name='data_inicial'>
            <input type="hidden" type='date' id='custo2' name='data_fim'>
            <button type="submit">Produtos para Saúde</button>
        </form>
        <form method="POST" action="gerarRelatorioLab.php">
            <input type="hidden" type='date' id='custoexemplo1' name='data_inicial'>
            <input type="hidden" type='date' id='custoexemplo2' name='data_fim'>
            <button type="submit">Itens Laboratoriais</button>
        </form>
    </aside>

</body>

</html>