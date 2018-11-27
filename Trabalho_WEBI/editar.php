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

<input type = "submit" nome = "submit" value=inserir><br><br>
</form>

<?php 
$conn=pg_connect("host=127.0.0.1 port=5432 dbname='users' user='postgres' password='postgres'");
		if(!$conn){
			print("Connection Failed!");
			exit();	
		}

		$query = "UPDATE cliente set nome ='".$_POST["nome"]."' where codigo = ".$_POST["codigoh"].";";
		$myresult = pg_query($conn, $query);
		for($it = 0; $it < pg_num_rows($myresult); $it++){
		$nome = pg_result($myresult, $it, 0); }
		

		$query = "UPDATE cliente set idade ='".$_POST["idade"]."' where codigo = ".$_POST["codigoh"].";";
		$myresult = pg_query($conn, $query);
		for($it = 0; $it < pg_num_rows($myresult); $it++){
		$idade = pg_result($myresult, $it, 1); }

		$query = "UPDATE cliente set sexo ='".$_POST["sexo"]."' where codigo = ".$_POST["codigoh"].";";
		$myresult = pg_query($conn, $query);
		for($it = 0; $it < pg_num_rows($myresult); $it++){
		$sexo = pg_result($myresult, $it, 2); }


		$query = "SELECT * FROM Cliente ;";
	$myresult = pg_query($conn, $query);
	echo "<table border='1'> " ;
	print( "<tr><td> id </td><td> nome </td><td> idade </td><td> sexo </td> <td> Cliente </td></tr>");
	for($it = 0; $it < pg_num_rows($myresult); $it++){
		
		$codigo = pg_result($myresult, $it, 3);
		$nome = pg_result($myresult, $it, 0);
		$idade = pg_result($myresult, $it, 1);
		$sexo = pg_result($myresult, $it, 2);

		print( "<tr> <td>$codigo </td>");
		print( "<td> $nome </td>");
		print( "<td> $idade </td>");
		print( "<td> $sexo </td>");

		print ("<form action='alterar.php' method='post'>");
		print( "<input type = 'hidden' name = 'codigoh' value = $codigo>");
		print( "<td><input type = 'submit' value = 'alterar'></form>");

		print ("<form action='Delete.php' method='post'>");
		print( "<input type = 'hidden' name = 'codigoh' value = $codigo>");
		print( "<input type = 'submit' value = 'excluir'></td>");

		
		
	}
	?>
</body>
</html>