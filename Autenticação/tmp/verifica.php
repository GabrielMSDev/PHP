<?php
include ("verifica2.php");


$log = $_POST['usuario'];
$sen = $_POST['senha'];

conectaBD($conn);

$query = "SELECT * FROM login where usuario = '".$log."' and senha = '".$sen."' ;";
$result = pg_query($conn, $query);

if(pg_num_rows ($result) > 0 ) {
	$_SESSION['usuario'] = $log;
	$_SESSION['senha'] = $sen;
	header('location:../pgs/Login.php'); 	
}else{
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	header('location:../pgs/Login.php'); 
}

?>