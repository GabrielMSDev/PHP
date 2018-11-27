<?php
session_start(); 

function conectaBD (&$conn){
$conn=pg_connect("host=127.0.0.1 port=5432 dbname='php' user='postgres' password='gabriel'");
		if(!$conn){
			print("Connection Failed!");
			exit();	
		}


}

function testaLogin(&$conectado){

if((isset ($_SESSION['usuario'])) and (isset ($_SESSION['senha']))) {
	$conectado = true;
}else{
	echo "Sem Permissão!!";
}}

?>