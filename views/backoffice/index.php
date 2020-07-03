<?php

	require_once(ROOT.'/models/includes/Autoloader.php');
	Autoloader::register();
	$form = new Form ($_POST);
?>
<!DOCTYPE html>

<html>
	<!-- En tête -->
	<head>
		<!-- Fichiers CSS -->
		<link rel='stylesheet' type='text/css' href='./css/web.css' media='screen' />
		<!-- <link rel='stylesheet' type='text/css' href='./css/00_reset.css' media='screen' /> -->
		<!-- <link rel='stylesheet' type='text/css' href='./css/01_mobile.css' media='screen' /> -->
		<!-- <link rel='stylesheet' type='text/css' href='./css/02_fonts.css' media='screen' /> -->


		<!-- Fichiers Javascripts -->
		<script type='text/javascript' src='./js/jquery-3.4.1.min.js'></script>
		<script type='text/javascript' src='./js/web.js'></script>
		<script type='text/javascript' src='./js/ajax.js'></script>

		<!-- Encodage UTF8 pour les accents -->
		<meta charset='UTF-8'>

		<!-- Icône de l'onglet -->
		<link rel='icon' type='image/png' href='./images/favicon.png' />

		<!-- Titre de l'onglet -->
		<title></title>
	</head>

	<!-- Corps du document -->
	<body>
		<!-- Wrapper -->
		<div class='wrapper'>
		  <div class='section'>
		    <img src="./medias/cacl.jpg"/>
		    <h1>Connexion</h1>
		    <h2>Bienvenue sur l'inteface administrateur des avis clients</h2>
		    <article>
			<form action="./backoffice/management" method="post">
				<li><?php echo $form->input('login', "Nom d'utilisateur"); ?></li>
				<li><?php echo $form->pass('pwd'); ?></li>
				<li><?php echo $form->submit('Connexion'); ?></li>
			</form>
		    </article>
		  </div>
		</div>
  	</body>
</html>