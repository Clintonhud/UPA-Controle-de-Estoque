<?php
require_once 'vendor/autoload.php';
//referenciando o namespace da dompdf
use Dompdf\Dompdf;

$pdo = new PDO('mysql:host=localhost; dbname=upa;', 'root', '');

$data_inicial = $_POST['data_inicial'];
$data_fim = $_POST['data_fim'];

$sql = $pdo->query("SELECT * FROM `cadastrar_itens_laboratoriais` WHERE vencimentol = 0 AND data_entradal BETWEEN '$data_inicial' AND '$data_fim'");

$html = '<h1> Relatorio de Itens Laboratoriais</h1>';
$html .= '<table border=1 width=100%>';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<td>Lote Medicamento</td>';
$html .= '<td>Nome</td>';
$html .= '<td>Data de Entrada</td>';
$html .= '<td>Quantidade em Lote</td>';
$html .= '<td>Data de Validade</td>';
$html .= '<td>Forma</td>';
$html .= '<td>Total Retirado</td>';
$html .= '</tr>';
$html .= '</thead>';

while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
    $html .= '<tbody>';
    $html .= '<tr><td>' . $linha['lote_laboratorio'] . '</td>';
    $html .= '<td>' . $linha['nome_iteml'] . '</td>';
    $html .= '<td>' . $linha['data_entradal'] . '</td>';
    $html .= '<td>' . $linha['qtd_lotel'] . '</td>';
    $html .= '<td>' . $linha['data_validadel'] . '</td>';
    $html .= '<td>' . $linha['forma'] . '</td>';
    $html .= '<td>' . $linha['total_retirada_lab'] . '</td>';
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

$dompdf->stream('relatorio_Itens_laboratoriais.pdf', array('Attachment' => false));
