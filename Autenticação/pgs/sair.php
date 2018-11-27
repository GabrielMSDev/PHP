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
			<section>
				<?php

				session_start();

				echo ("Voce Saiu com Sucesso!!");
				session_destroy();



				?>
			</section>
		</div>
		<footer><?php include("../tmp/rodape.php"); ?></footer>
	</div>
</body>
</html>