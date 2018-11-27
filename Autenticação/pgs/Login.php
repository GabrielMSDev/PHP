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
			<section><form action="../tmp/verifica.php" method="post">
						Usuário: <input type = text name = "usuario"> <br><br>
						Senha: <input type = password name = "senha"> <br><br>
						<input type = "submit" nome = "submit" value=Entrar><br><br></form>
			</section>
		</div>
		<footer><?php include("../tmp/rodape.php"); ?></footer>
	</div>
</body>
</html>
