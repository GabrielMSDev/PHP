<?php

include("verifica2.php");

if((isset ($_SESSION['usuario'])) and (isset ($_SESSION['senha']))) {
	echo ("Seja Bem vindo, ".$_SESSION['usuario']." á Primeira Página!!"); 

	echo ("<form action='site2.php' method='post'>");
	echo ("<input type = 'submit' value = 'Alterar Página'></form>");

	echo ("<form action='sair.php' method='post'>");
	echo ("<input type = 'submit' value = 'Sair'></form>");

}else{
echo "Sem Permissão!!";
}

?>