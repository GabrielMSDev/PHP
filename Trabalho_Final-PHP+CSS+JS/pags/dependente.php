<?php
include("../tmp/verifica2.php");
testaLogin($conectado);
include("../tmp/fcrud.php");

if($conectado){

$func = $_GET['func'];

if ($func == "select") {
    filho_select();
} else if ($func == "delete") {
    $codigo = $_GET['codigo'];
    filho_delete($codigo);
    filho_select();
} else if ($func == "insertform") {
    filho_select();
    cliente_select();
    echo'<table>';
    echo'<tr><td>Informe o codigo do cliente: <input type="text" id="id_cliente"></td></tr>';
    echo'<tr><td>Informe o nome do filho: <input type="text" id="nome"></td></tr>';
    echo'<td><button onclick="filho_insert()">Enviar</td>';
    echo'</table >';
} else if ($func == "insert") {
    filho_insert($_GET['nome'], $_GET['id_cliente']);
    filho_select();
}}
?>

