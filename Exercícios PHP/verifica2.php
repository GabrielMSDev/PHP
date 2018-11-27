<?php
session_start(); 

function valido ($log, $sen){
$conn=pg_connect("host=127.0.0.1 port=5432 dbname='seguranca' user='postgres' password='gabriel'");
		if(!$conn){
			print("Connection Failed!");
			exit();	
		}

$query = "SELECT * FROM login where usuario = '".$log."' and senha = '".$sen."' ;";
$result = pg_query($conn, $query);

if(pg_num_rows ($result) > 0 ) {
	$_SESSION['usuario'] = $log;
	$_SESSION['senha'] = $sen;
	header('location:site.php'); 
}else{
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	header('location:index.php'); 
}
}


?>