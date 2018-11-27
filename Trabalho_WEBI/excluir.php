<!doctype html>
<html lang = "pt-br"> 
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>



<form action='excluir.php' method='post'></form>

<?php 
$conn=pg_connect("host=127.0.0.1 port=5432 dbname='users' user='postgres' password='postgres'");
		if(!$conn){
			print("Connection Failed!");
			exit();	
		}
		

		$query = "DELETE FROM dependente WHERE id_cliente = ".$_POST["codigoh"]." and id_dependente = ".$_POST["codigoe"].";";
		$myresult = pg_query($conn, $query);
	
	for($it = 0; $it < pg_num_rows($myresult); $it++){
		$id_cliente = pg_result($myresult, $it, 0);
		$id_dependente = pg_result($myresult, $it, 1);
		$nomed = pg_result($myresult, $it, 2);
		}

		$query = "SELECT * FROM dependente ;";
		$myresult = pg_query($conn, $query);
		echo "<table border='1'> " ;
		print( "<tr><td> id_cliente </td><td> id_dependente </td><td> nome </td> <td> Excluir </td></tr>");
		
		for($it = 0; $it < pg_num_rows($myresult); $it++){
		
		$id_cliente = pg_result($myresult, $it, 0);
		$id_dependente = pg_result($myresult, $it, 1);
		$nomed = pg_result($myresult, $it, 2);
	

		print( "<tr> <td>$id_cliente </td>");
		print( "<td> $id_dependente </td>");
		print( "<td> $nomed </td>");
		
		print ("<form action='excluir.php' method='post'>");
		print( "<input type = 'hidden' name = 'codigoe' value = $id_dependente>");
		print( "<input type = 'hidden' name = 'codigoh' value = ".$_POST["codigoh"].">");
		print( "<td><input type = 'submit' value = 'Excluir Dependente'></form>");

	}
?>
</body>
</html>