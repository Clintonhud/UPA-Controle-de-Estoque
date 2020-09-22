
<?php
function conexaoBanco()
{
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'upa';
    $mysqli = new mysqli($servidor, $usuario, $senha, $banco);
    return $mysqli;
}
?>