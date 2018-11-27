<!doctype html>
<html lang = "pt-br"> 
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<form action="incluir_cidade.php" method="post">

Nome da Cidade: <input type = text name = "nome"> <br><br>

<input type = "submit" nome = "submit" value=inserir><br><br>

</form>

<?php
$conn=pg_connect("host=127.0.0.1 port=5432 dbname='users' user='postgres' password='postgres'");
		if(!$conn){
			print("Connection Failed!");
			exit();	
		}

$query = "DELETE FROM cidade where codigo_cidade= ".$_POST["codigoh"].";";
$myresult = pg_query($conn, $query);

for($it = 0; $it < pg_num_rows($myresult); $it++){
		$codigo_cidade = pg_result($myresult, $it, 0);
		$nome_cidade = pg_result($myresult, $it, 1);
	}

	$query = "SELECT * FROM cidade ;";
	$myresult = pg_query($conn, $query);
	echo "<table border='1'> " ;
	print( "<tr><td> codigo </td><td> nome </td> <td> Excluir </td></tr>");
	for($it = 0; $it < pg_num_rows($myresult); $it++){
		
		$codigo_cidade = pg_result($myresult, $it, 0);
		$nome_cidade = pg_result($myresult, $it, 1);

		print( "<tr> <td>$codigo_cidade </td>");
		print( "<td> $nome_cidade </td>");

		print ("<form action='deletar_cidade.php' method='post'>");
		print( "<input type = 'hidden' name = 'codigoh' value = $codigo_cidade>");
		print( "<td><input type = 'submit' value = 'excluir'></td></form>");
		
		
	}
	
?>
</body>
</html>