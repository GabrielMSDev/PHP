<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" type="text/css" href="../css/site.css">
</head>
<body>
	<div class="tudo">
		<header>
			<?php include("../tmp/header.php");?>	
		</header>
		<div class="meio">
			<nav>
				<?php include("../tmp/menu.php"); ?>
			</nav>
			<section><?php
				include("../tmp/verifica2.php");
				conectaBD($conn);
				testaLogin($conectado);

				if($conectado){
					$query = "SELECT * FROM login ;";
					$myresult = pg_query($conn, $query);
					echo "<table border='1'> " ;
					print( "<tr><td> Login </td><td> Senha </td></tr>");
					for($it = 0; $it < pg_num_rows($myresult); $it++){

						$usuario = pg_result($myresult, $it, 0);
						$senha = pg_result($myresult, $it, 1);

						print( "<tr> <td>$usuario </td>");
						print( "<td> $senha </td></tr>");
					}
					echo "</table>";
				}

				?>
			</section>
		</div>
		<footer><?php include("../tmp/rodape.php"); ?></footer>
	</div>
</body>
</html>
