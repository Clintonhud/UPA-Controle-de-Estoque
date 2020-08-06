<?php
session_start();

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodedados = "upa";

$mysqli = new mysqli($servidor, $usuario, $senha, $bancodedados);

$campo = "%{$_POST['campo']}%";

$sql = ("SELECT * FROM cadastrar_medicamento WHERE nome_item like '$campo%'");
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
    <TD><button>Retirar</button></TD>

    <TD>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $tbl['lote_medicamento']; ?>">
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