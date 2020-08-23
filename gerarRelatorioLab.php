<?php
require_once 'vendor/autoload.php';
//referenciando o namespace da dompdf
use Dompdf\Dompdf;

$pdo = new PDO('mysql:host=localhost; dbname=upa;', 'root', '');

$data_inicial = $_POST['data_inicial'];
$data_fim = $_POST['data_fim'];

$sql = $pdo->query("SELECT * FROM `cadastrar_itens_laboratoriais` WHERE vencimentol = 0 AND data_entradal BETWEEN '$data_inicial' AND '$data_fim'");

$html = '<center><h1>Relatorio de Itens Laboratoriais</h1></center>';
$html .= '<table border rules="rows" cellspacing="0" cellpadding="5" width="100%">';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th bgcolor="#98FB98"><font face="arial" size="2">Lote Medicamento</font></th>';
$html .= '<th bgcolor="#98FB98"><font face="arial" size="2">Nome</font></th>';
$html .= '<th bgcolor="#98FB98" width="80px"><font face="arial" size="2">Data de Entrada</font></th>';
$html .= '<th bgcolor="#98FB98"><font face="arial" size="2">Quantidade em Lote</font></th>';
$html .= '<th bgcolor="#98FB98" width="80px"><font face="arial" size="2">Data de Validade</font></th>';
$html .= '<th bgcolor="#98FB98"><font face="arial" size="2">Forma</font></th>';
$html .= '<th bgcolor="#98FB98"><font face="arial" size="2">Total Retirado</font></th>';
$html .= '</tr>';
$html .= '</thead>';

while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
    $html .= '<tbody>';
    $html .= '<tr><td><font face="arial" size="2">' . $linha['lote_laboratorio'] . '</font></td>';
    $html .= '<td><font face="arial" size="2">' . $linha['nome_iteml'] . '</font></td>';
    $html .= '<td><font face="arial" size="2">' . $linha['data_entradal'] . '</font></td>';
    $html .= '<td><font face="arial" size="2">' . $linha['qtd_lotel'] . '</font></td>';
    $html .= '<td><font face="arial" size="2">' . $linha['data_validadel'] . '</font></td>';
    $html .= '<td><font face="arial" size="2">' . $linha['forma'] . '</font></td>';
    $html .= '<td><font face="arial" size="2">' . $linha['total_retirada_lab'] . '</font></td>';
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
