<?php
	//////////////////////////////////////////////////////////////////////////////
	// Logout

		// Ouverture session
		session_start();

		// Destruction variables de session
		session_unset();

	// Display index

$html = "
	<body>
		<section>
			<button class='Logo'><img src='../medias/cacl.jpg'/></button>
			<h4 class='Instruction'>Cliquez sur le logo pour donner votre avis</h4>
			<div class='Form'>
				<h1>Sondage</h1>
				<h2>Bienvenue sur l'inteface permettant de recupérer vos avis sur nos services</h2>
				<article>
					<li><input type='text' name='lastName' placeholder='Nom' required></li>
					<li><input type='text' name='firstName' placeholder='Prénom' required></li>
					<li><button class='doLog'>Donner son avis</button></li>
				</article>
			</div>
		</section>
  	</body>";

	////////// Ajax to client //////////
	// Build JSON
	$jsonResponse = array("target"=>"body", "html"=>"$html");

	// Merge JSON
	$json = array();
	$json[] = $jsonResponse;

	// Send to client
	echo json_encode($json);
?>
