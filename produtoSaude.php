<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="_css/estilo2.css">
    <link rel="stylesheet" href="_css/listaItens.css">
    <link rel="stylesheet" href="_css/stylesheet.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css_bootstrap/bootstrap.min.css">

    <title>Produtos para Saúde</title>
    <script type="text/javascript" src="_javascript/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="_javascript/scriptsaude.js"></script>

</head>

<script>
    function Nova() {
        location.href = "cadastroProdutoSaude.php";
    }
</script>

<body>
    <header id="cabecalho">
        <h1>Controle de Estoque > Produtos para Saúde</h1>
        <p><a href="principal.html">Voltar</a></p>
    </header>
    <div id="busca">
        <form id="form">
            <input type="text" name="campo" id="campo" size="50" placeholder="BUSCAR">
        </form>
        <button type="button" onclick="Nova()">Cadastrar</button>
    </div>
    <div id="resultado">
        <?php

        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $bancodedados = "upa";

        $mysqli = new mysqli($servidor, $usuario, $senha, $bancodedados);

        $sql = ("SELECT * FROM cadastrar_produto_saude");
        $result = mysqli_query($mysqli, $sql);

        echo "
        <table>
            <thead>
                <tr>
                    <td>Nome do Item</td>
                    <td>Data de Entrada</td>
                    <td>Lote</td>
                    <td>Qtd em Lote</td>
                    <td>Data de Validade</td>
                    <td>Modalidade</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>

            <tbody>
                ";

        while ($tbl = mysqli_fetch_array($result)) {

            $nome = $tbl["nome_items"];
            $dataEntrada = $tbl["data_entradas"];
            $lote = $tbl["lote_saude"];
            $qtdLote = $tbl["qtd_lotes"];
            $dataValidade = $tbl["data_validades"];
            $modalidade = $tbl["modalidade"];
            echo "<TR>";
            echo "<TD>$nome </TD>";
            echo "<TD>$dataEntrada </TD>";
            echo "<TD>$lote </TD>";
            echo "<TD>$qtdLote </TD>";
            echo "<TD>$dataValidade </TD>";
            echo "<TD>$modalidade </TD>";
        ?>

            <TD><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal" data-whatever="<?php echo $tbl['lote_saude']; ?>">Retirada</button></TD>

            <TD>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $tbl['lote_saude']; ?>">
                    Excluir
                </button>
            </TD>
        <?php
            ";
            </TR>";
        }

        echo "
            </tbody>
        </table>
        ";
        ?>
    </div>


    <!-- Modal para Retirada -->
    <form method="POST" action="retiradaSaude.php">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModal">Retirada de Estoque</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <center>
                        <div class="modal-body">
                            Você deseja fazer a retirada desse produto?
                        </div>
                        <div class="form-row">
                            <input id="lote_sau" type="hidden" name="lote_sau">
                        </div>
                    </center>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                        <button type="submit" class="btn btn-danger">Sim</button>
                    </div>


                </div>
            </div>
        </div>
    </form>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script type="text/javascript">
        $('#myModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('#lote_sau').val(recipient)
        })
    </script>

    <!-- Modal Exclusao-->
    <form method="POST" action="_conexao/excluirSaude.php">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Exclusão</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <center>
                        <div class="modal-body">
                            Você deseja excluir permanentemente esses dados?
                        </div>
                        <div class="form-row">
                            <input id="lote_saude" type="hidden" name="lote_saude">
                        </div>
                    </center>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                        <button type="submit" class="btn btn-danger">Sim</button>
                    </div>


                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('#lote_saude').val(recipient)
        })
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>