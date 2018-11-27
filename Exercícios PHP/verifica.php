<?php
include ("verifica2.php");

$log = $_POST['usuario'];
$sen = $_POST['senha'];

valido($log, $sen);

?>