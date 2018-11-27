<!doctype html>
<html lang = "pt-br"> 
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<form action="Insert.php" method="post">

Nome: <input type = text name = "nome"> <br><br>

Idade: <input type = text name = "idade"> <br><br>

Sexo: <input type = text name = "sexo"> <br><br>

Cidade: <select name="acidade">
<?php
$conn = pg_connect("host=127.0.0.1 port=5432 dbname='users' user='postgres' password='postgres'");
	if(!$conn){
		echo "connection failed";
		exit();
	}

	$query = "SELECT * FROM cidade ;";
	$myresult = pg_query($conn, $query);
	for($it = 0; $it < pg_num_rows($myresult); $it++){
		
		$codigo_cidade = pg_result($myresult, $it, 0);
		$nome_cidade = pg_result($myresult, $it, 1);

		print("<option value = $codigo_cidade>$nome_cidade</option>");

		
}
		?>
	</select>

<input type = "submit" nome = "submit" value=inserir><br><br>

</form>

<?php
$selecionado = $_POST["acidade"];

$query = "DELETE FROM cliente where codigo= ".$_POST["codigoh"].";";
$myresult = pg_query($conn, $query);

for($it = 0; $it < pg_num_rows($myresult); $it++){
		$codigo = pg_result($myresult, $it, 3);
		$nome = pg_result($myresult, $it, 0);
		$idade = pg_result($myresult, $it, 1);
		$sexo = pg_result($myresult, $it, 2);
		//$codigo_cidade = pg_result($myresult, $it, 4);

	}

	$query = "SELECT * FROM Cliente ;";
	$myresult = pg_query($conn, $query);
	echo "<table border='1'> " ;
	print( "<tr><td> id </td><td> nome </td><td> idade </td><td> sexo </td> <td> Cidade</td> <td> Cliente </td></tr>");
	for($it = 0; $it < pg_num_rows($myresult); $it++){
		
		$codigo = pg_result($myresult, $it, 3);
		$nome = pg_result($myresult, $it, 0);
		$idade = pg_result($myresult, $it, 1);
		$sexo = pg_result($myresult, $it, 2);
		//$codigo_cidade = pg_result($myresult, $it, 4);

		print( "<tr> <td>$codigo </td>");
		print( "<td> $nome </td>");
		print( "<td> $idade </td>");
		print( "<td> $sexo </td>");
		$query2 = "SELECT nome_cidade FROM cidade natural JOIN cliente where codigo_cidade = ".$codigo_cidade.";";
		$myresult2 = pg_query($conn, $query2);
		for($it2 = 0; $it2 < pg_num_rows($myresult2); $it2++){
		
		$selecionado = pg_result($myresult2, $it2, 0);}
		print( "<td> $nome_cidade </td>");

		print ("<form action='alterar.php' method='post'>");
		print( "<input type = 'hidden' name = 'codigoh' value = $codigo>");
		print( "<td><input type = 'submit' value = 'alterar'></form>");

		print ("<form action='Delete.php' method='post'>");
		print( "<input type = 'hidden' name = 'codigoh' value = $codigo>");
		print( "<input type = 'submit' value = 'excluir'></td></form>");
		
		
	}
	
?>
</body>
</html>