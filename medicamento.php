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

    <title>Medicamentos</title>
    <script type="text/javascript" src="_javascript/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="_javascript/javascript.js"></script>
</head>

<script>
    function Nova() {
        location.href = "cadastroMedicamento.php";
    }
</script>

<body>
    <header id="cabecalho">
        <h1>Controle de Estoque > Medicamentos</h1>
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

        $sql = ("SELECT * FROM cadastrar_medicamento WHERE vencimento = 0 ORDER BY data_validade");
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
                    <td>Forma Farmaceutica</td>
                    <td>Concentracao</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>

            <tbody>
                ";

        while ($tbl = mysqli_fetch_array($result)) {

            $nome = $tbl["nome_item"];
            $dataEntrada = $tbl["data_entrada"];
            $lote = $tbl["lote_medicamento"];
            $qtdLote = $tbl["qtd_lote"];
            $dataValidade = $tbl["data_validade"];
            $forma = $tbl["forma_farmaceutica"];
            $concentracao = $tbl["concentracao"];
            echo "<TR>";
            echo "<TD>$nome </TD>";
            echo "<TD>$dataEntrada </TD>";
            echo "<TD>$lote </TD>";
            echo "<TD>$qtdLote </TD>";
            echo "<TD>$dataValidade </TD>";
            echo "<TD>$forma </TD>";
            echo "<TD>$concentracao </TD>";
        ?>

            <TD><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal" data-whatever="<?php echo $tbl['lote_medicamento']; ?>"><svg width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-file-minus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4z" />
                        <path fill-rule="evenodd" d="M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z" />
                    </svg></button></TD>

            <TD><button type="button" role="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModalvencidos" data-whatever="<?php echo $tbl['lote_medicamento']; ?>"><svg width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-calendar2-event-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14 2H2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zM2 1a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z" />
                        <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5zm9 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5z" />
                        <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
                        <rect width="2" height="2" x="11" y="7" rx=".5" />
                    </svg></button></TD>

            <TD><button type="button" role="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $tbl['lote_medicamento']; ?>"><svg width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg></button></TD>
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
    <form method="POST" action="retiradaMedicamento.php">
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
                            Você deseja retirar itens desse Medicamento?
                        </div>
                        <div class="form-row">
                            <input id="lote_med" type="hidden" name="lote_med">
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
            modal.find('#lote_med').val(recipient)
        })
    </script>

    <!-- Modal de Vencimento -->
    <form method="POST" action="_conexao/med_vencido.php">
        <div class="modal fade" id="myModalvencidos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModal">Vencimento de Produto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <center>
                        <div class="modal-body">
                            Este medicamento já está vencido?
                        </div>
                        <div class="form-row">
                            <input id="lote_med_venc" type="hidden" name="lote_med_venc">
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
        $('#myModalvencidos').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('#lote_med_venc').val(recipient)
        })
    </script>



    <!-- Modal de Exclusão-->
    <form method="POST" action="_conexao/excluirMedicamento.php">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input id="lote_medicamento" type="hidden" name="lote_medicamento">
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
            modal.find('#lote_medicamento').val(recipient)
        })
    </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>