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
        <title>Página Principal</title>
        <link rel="stylesheet" href="_css/estilo.css">
    </head>

    <script language="javascript" src="_javascript/funcoes.js"></script>


    <body>
        <header id="cabecalho">
            <h1>Controle de Estoque</h1>
            <p><a href="_conexao/logoff.php">Sair</a></p>
        </header>
        <section>
            <figure id="logo">
                <img id="icone" src="_imagens/logoUPA.png">
            </figure>
        </section>

        <aside id="lateral">
            <nav id="botoes">
                <h1>Menu Principal</h1>
                <ul>
                    <li onmouseover="mudafoto('_imagens/medicamentos2.png')" onmouseout="mudafoto('_imagens/logoUPA.png')">
                        <a href="medicamento.php">MEDICAMENTOS</a></li>
                    <li onmouseover="mudafoto('_imagens/produto_saude2.png')" onmouseout="mudafoto('_imagens/logoUPA.png')">
                        <a href="produtoSaude.php">PRODUTOS PARA SAÚDE</a></li>
                    <li onmouseover="mudafoto('_imagens/itensLaboratoriais2.png')" onmouseout="mudafoto('_imagens/logoUPA.png')"><a href="itenslaboratoriais.php">ITENS
                            LABORATORIAIS</a></li>
                    <li onmouseover="mudafoto('_imagens/relatorio2.png')" onmouseout="mudafoto('_imagens/logoUPA.png')"><a href="relatorio.php">EMISSÃO DE RELATÓRIOS</a></li>
                </ul>
            </nav>
        </aside>
        <footer id="rodape">
            <p>Corporation 2020 - Sannins Lendários</p>
        </footer>

    </body>

    </html>
<?php
}
?>