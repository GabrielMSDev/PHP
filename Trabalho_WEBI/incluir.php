<!doctype html>
<html lang = "pt-br"> 
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<form action="incluir.php" method="post">



</form>

<?php 
	
$conn = pg_connect("host=127.0.0.1 port=5432 dbname='users' user='postgres' password='postgres'");
	if(!$conn){
		echo "connection failed";
		exit();
	}

	$query = "INSERT INTO dependente (id_cliente, id_dependente, nome) VALUES (".$_POST["codigoh"].",default,'".$_POST["nomed"]."');";
	pg_query($conn, $query); 

	for($it = 0; $it < pg_num_rows($myresult); $it++){
			$id_cliente = pg_result($myresult, $it, 0);
			$id_dependente = pg_result($myresult, $it, 1);
			$nomed = pg_result($myresult, $it, 2);
		}

	$query = "SELECT * FROM dependente ;";
		$myresult = pg_query($conn, $query);
		echo "<table border='1'> " ;
		print( "<tr><td> id_cliente </td><td> id_Dependente </td><td> nome </td></tr>");
		for($it = 0; $it < pg_num_rows($myresult); $it++){
		
		$id_cliente = pg_result($myresult, $it, 0);
		$id_dependente = pg_result($myresult, $it, 1);
		$nomed = pg_result($myresult, $it, 2);
	

		print( "<tr> <td>$id_cliente </td>");
		print( "<td> $id_dependente </td>");
		print( "<td> $nomed </td>");
	}
		
?>
</body>
</html> 