<?php
include("../tmp/verifica2.php");
testaLogin($conectado);
include("../tmp/fcrud.php");


if($conectado){
$func = $_GET['func'];

if ($func == "select") {
    cidade_select();
} else if ($func == "delete") {
    $codigo = $_GET['codigo'];
    cidade_delete($codigo);
    cidade_select();
} else if ($func == "updateform") {
    $codigo = $_GET['codigo'];
    cidade_selectone($codigo);
    echo'<table>';
    echo'<input type = hidden id="codigo" value= ' . $codigo . '';
    echo'<tr><td>Informe o nome da cidade: <input type="text" id="nome"></td></tr>';
    echo'<td><button onclick="cidade_update()">Enviar</td>';
    echo'</table >';
} else if ($func == "update") {
    $codigo = (int) $_GET['codigo'];
    $nome = $_GET['nome'];
    cidade_alterar($codigo, $nome);
    cidade_select();
} else if ($func == "cidadeform") {
    cidade_select();
    echo'<table>';
    echo'<tr><td>Informe o nome da cidade: <input type="text" id="nome"></td></tr>';
    echo'<td><button onclick="cidade_insert()">Enviar</td>';
    echo'</table >';
} else if ($func == "insert") {
    $nome = $_GET['nome'];
    cidade_insert($nome);
    cidade_select();
}}
?>