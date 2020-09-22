<?php
include('conexao.php'); //CHAMA O ARQUIVO QUE POSSUE  A FUNCAO DE CONEXAO COM O BANCO DE DADOS

/*
function verificaEstadoMedicamentos()
{  //FUNCAO QUE PARA VERIFICAR O ESTADO DE CADA MEDICAMENTO, SE ESTA PERTO DE VENCER OU VENCIDO OU AINDA NAO ESTA PERTO DE VENCER
    $mysqli = conexaoBanco(); //ADICIONA A CONEXAO A UMA VARIAVEL
    date_default_timezone_set('America/Manaus'); //PADRAO PARA PEGAR AS HORAS DE ACORDO COM O HORARIO DE MANAUS
    $sql = ("SELECT nome_item, data_validade FROM cadastrar_medicamento WHERE vencimento = 0 ORDER BY data_validade"); //CONSULTA SQL QUE BUSCA OS DADOS DA TABELA cadatro_medicamentos
    $result = mysqli_query($mysqli, $sql);
    $data_atual = date("Y-m-d"); // PEGA A DATA ATUAL
    // $data_atual = '2020-09-16'; // data atual EXCLUIR DEPOIS

    while ($tbl = mysqli_fetch_array($result)) {
        $data_validade = date_create($tbl["data_validade"]); //FORMATA A data_validade  REGISTRADO NO BANCO PARA FORMATO DE DATA
        date_sub($data_validade, date_interval_create_from_date_string('20 days')); //SUBTRAÇÃO DE 20 (PODE MUDAR) DIAS A PARTIR DA DATA DE VALIDADO DO PRODUTO
        $data_verifica = date_format($data_validade, 'Y-m-d'); //RESULTADO DA SUBTRAÇÃO ACIMA
        echo $data_atual . "<br>";
        if ((strtotime($data_atual) >= strtotime($data_verifica)) && (strtotime($data_atual) < strtotime($tbl["data_validade"]))) {
            echo $tbl["nome_item"] . ': perto de vencer<br>';
            echo $data_verifica . ': data com menos 20 dias subtraindo da validade<br>';
            echo $tbl["data_validade"] . ': Vencimento<br><br>';
        } else {
            if (strtotime($data_atual) >= strtotime($tbl["data_validade"])) {
                echo $tbl["nome_item"] . ': VENCIDO<br>';
                echo $data_verifica . ': data com menos 20 dias subtraindo da validade<br>';
                echo $tbl["data_validade"] . ': Vencimento<br><br>';
            } else {
                echo $tbl["nome_item"] . ': ainda nao esta perto de vencer<br>';
                echo $data_verifica . ': data com menos 20 dias subtraindo da validade<br>';
                echo $tbl["data_validade"] . ': Vencimento<br><br>';
            }
        }
    }
}
*/
//verificaEstadoMedicamentos(); // PARA TESTAR É SO DESCOMENTAR PARA CHAMAR A FUNCAO E VERIFICAR ELA RODANDO AQUI NESSA PAGINA

function verificaMedicamentos($data_validade, $tabela, $vencido)
{  //FUNCAO QUE É CHAMADA NA PAGINA PRINCIPAL PARA DISPARAR O ALERTA
    $mysqli = conexaoBanco(); //ADICIONA A CONEXAO A UMA VARIAVEL
    date_default_timezone_set('America/Manaus'); //PADRAO PARA PEGAR AS HORAS DE ACORDO COM O HORARIO DE MANAUS
    $sql = ("SELECT $data_validade FROM $tabela WHERE $vencido = 0 ORDER BY $data_validade"); //CONSULTA SQL QUE BUSCA OS DADOS DA TABELA cadatro_medicamentos
    $result = mysqli_query($mysqli, $sql);
    $data_atual = date("Y-m-d"); // PEGA A DATA ATUAL    
    $resposta = false; //VARIAVEL QUE VAI SER O RETORNO DA FUNCAO
    while ($tbl = mysqli_fetch_array($result)) {
        $datas_validade = date_create($tbl[$data_validade]); //FORMATA A data_validade  REGISTRADO NO BANCO PARA FORMATO DE DATA
        date_sub($datas_validade, date_interval_create_from_date_string('90 days')); //SUBTRAÇÃO DE 20 (PODE MUDAR) DIAS A PARTIR DA DATA DE VALIDADO DO PRODUTO
        $data_verifica = date_format($datas_validade, 'Y-m-d'); //RESULTADO DA SUBTRAÇÃO ACIMA        
        if (strtotime($data_atual) >= strtotime($data_verifica)) {
            $resposta = true; // CASO EXISTA ALGUM MEDICAMENTO VENCIDO OU PERTO DE VENCER A FUNCAO VAI RETORTAR TRUE
            break; // O LACO WHILE É INTERROMPIDO, NÃO É MAIS NECESSARIO VERIFICAR MAIS MEDICAMENTOS POIS JÁ ENCOTROU UM PERTO DE VENCER OU VENCIDO
        }
    }
    return $resposta; //RESPOSTA DA FUNCAO, SE NÃO ENCONTRAR NENNHUM MEDICAMENTO PERTO DE VENCER OU VENCIDO ELA VAI RETORNAR A PRIMEIRO VALOR QUE VARIAVEL RECEBEU, O FALSE
}
