<!doctype html>
<html lang = "pt-br"> 
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>



<form action='editar.php' method='post'>

<?php 
$conn=pg_connect("host=127.0.0.1 port=5432 dbname='users' user='postgres' password='postgres'");
		if(!$conn){
			print("Connection Failed!");
			exit();	
		}
		

		$query = "SELECT * FROM cliente where codigo= ".$_POST["codigoh"].";";
	$myresult = pg_query($conn, $query);
	
	for($it = 0; $it < pg_num_rows($myresult); $it++){
		$codigo = pg_result($myresult, $it, 3);
		$nome = pg_result($myresult, $it, 0);
		$idade = pg_result($myresult, $it, 1);
		$sexo = pg_result($myresult, $it, 2);

		
		
		print( "Nome: <input type = text name = 'nome' value = ".$nome."><br><br>");
		print( "Idade: <input type = text name ='idade' value = ".$idade." ><br><br>");
		print( "Sexo: <input type = text name = 'sexo' value = ".$sexo." ><br><br>");
		print ("<input type = 'submit' value = 'editar'> <br><br><br></form>");

		print ("<form action='incluir.php' method='post'>");
		print ("Nome: <input type = text name = 'nomed' value = ".$nomed.">");
		print( "<input type = 'hidden' name = 'codigoh' value = ".$_POST["codigoh"]."><br><br>");
		print( "<input type = 'submit' value = 'Incluir Dependente'></form><br><br>");

		print ("<form action='excluir.php' method='post'>");
		print( "<input type = 'hidden' name = 'codigoe' value = $id_dependente>");
		print( "<input type = 'hidden' name = 'codigoh' value = ".$_POST["codigoh"].">");
		print( "<input type = 'submit' value = 'Selecionar Dependentes'></form><br>");

	


	}
	?>

</body>
</html>