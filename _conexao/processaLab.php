<?php
session_start();

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodedados = "upa";

$mysqli = new mysqli($servidor, $usuario, $senha, $bancodedados);

$campo = "%{$_POST['campo']}%";

$sql = ("SELECT * FROM cadastrar_itens_laboratoriais WHERE nome_iteml like '$campo%'");
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
                    <td>Forma</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>

            <tbody>
                ";

while ($tbl = mysqli_fetch_array($result)) {

    $nome = $tbl["nome_iteml"];
    $dataEntrada = $tbl["data_entradal"];
    $lote = $tbl["lote_laboratorio"];
    $qtdLote = $tbl["qtd_lotel"];
    $dataValidade = $tbl["data_validadel"];
    $forma = $tbl["forma"];
    echo "<TR>";
    echo "<TD>$nome </TD>";
    echo "<TD>$dataEntrada </TD>";
    echo "<TD>$lote </TD>";
    echo "<TD>$qtdLote </TD>";
    echo "<TD>$dataValidade </TD>";
    echo "<TD>$forma </TD>";
?>
    <TD><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal" data-whatever="<?php echo $tbl['lote_laboratorio']; ?>">Retirada</button></TD>

    <TD><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $tbl['lote_laboratorio']; ?>">Excluir</button></TD>
<?php
    ";
            </TR>";
}

echo "
            </tbody>
        </table>
        ";
?>