<?php
session_start();

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodedados = "upa";

$mysqli = new mysqli($servidor, $usuario, $senha, $bancodedados);

$campo = "%{$_POST['campo']}%";

$sql = ("SELECT * FROM cadastrar_produto_saude WHERE nome_items like '$campo%'");
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