<?php
session_start();

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodedados = "upa";

$mysqli = new mysqli($servidor, $usuario, $senha, $bancodedados);

$campo = "%{$_POST['campo']}%";

$sql = ("SELECT * FROM cadastrar_medicamento WHERE vencimento = 0 AND nome_item like '$campo%' ORDER BY data_validade");
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

    <TD><button type="button" role="button" class="btn btn-secondary"><svg width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-calendar2-event-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14 2H2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zM2 1a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z" />
                <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5zm9 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5z" />
                <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
                <rect width="2" height="2" x="11" y="7" rx=".5" />
            </svg></button></TD>

    <TD><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $tbl['lote_medicamento']; ?>"><svg width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
            </svg></button>

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