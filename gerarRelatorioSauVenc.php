<?php
require_once 'vendor/autoload.php';
//referenciando o namespace da dompdf
use Dompdf\Dompdf;

$pdo = new PDO('mysql:host=localhost; dbname=upa;', 'root', '');

$data_inicial = $_POST['data_inicial'];
$data_fim = $_POST['data_fim'];

$sql = $pdo->query("SELECT * FROM `cadastrar_produto_saude` WHERE vencimentos = 1 AND data_entradas BETWEEN '$data_inicial' AND '$data_fim'");

$html = '<h1> Relatorio de Produtos para Saúde Vencidos</h1>';
$html .= '<table border=1 width=100%>';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<td>Lote Medicamento</td>';
$html .= '<td>Nome</td>';
$html .= '<td>Data de Entrada</td>';
$html .= '<td>Quantidade em Lote</td>';
$html .= '<td>Data de Validade</td>';
$html .= '<td>Modalidade</td>';
$html .= '<td>Total Retirado</td>';
$html .= '</tr>';
$html .= '</thead>';

while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
    $html .= '<tbody>';
    $html .= '<tr><td>' . $linha['lote_saude'] . '</td>';
    $html .= '<td>' . $linha['nome_items'] . '</td>';
    $html .= '<td>' . $linha['data_entradas'] . '</td>';
    $html .= '<td>' . $linha['qtd_lotes'] . '</td>';
    $html .= '<td>' . $linha['data_validades'] . '</td>';
    $html .= '<td>' . $linha['modalidade'] . '</td>';
    $html .= '<td>' . $linha['total_retirada_saude'] . '</td>';
    $html .= '</tbody>';
}
$html .= '</table>';

//instancia da dompdf
$dompdf = new Dompdf;

//converter o html
$dompdf->loadHtml($html);

//definir tamanho e orientação
$dompdf->setPaper('A4', 'portrait');

//renderizar o html
$dompdf->render();

//enviar para o bowser

$dompdf->stream('relatorio_Produtos_Saude.pdf', array('Attachment' => false));
