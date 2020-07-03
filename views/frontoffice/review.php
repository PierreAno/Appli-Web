<?php

	////////// VARS //////////
	$html = "";

	require_once(ROOT.'/models/includes/Autoloader.php');
	Autoloader::register();
	$form = new Form ($_POST);

	// Ouvre session
	session_start();

	$idcust = NULL;
	if (isset($_SESSION['id'])) {
		$idcust = $_SESSION['id'];
	}


$html .= "
	<body>
	  <aside class='menu'>
	    <img src='../medias/logoCACL.png'/>
	    <div>
	      <h4>Liste des catégories</h4>
	      <select size='1' class='list1' name='list1'>
	        <option value='0'>Nom</option>";
					$result = App::getDb()->query1('SELECT * FROM tblcategories');
						while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
							$id = $row['id'];
							$name = $row['nom'];
							$html .= "<option value='$id'>$name</option>";
						}
	    	$html .= "</select>
			</div>

			<div>
				<h4>Liste des démarches</h4>
				<select size='1' class='list2' name='list2'>
					<option value='0'>Nom</option>";
					$result = App::getDb()->query1('SELECT * FROM tbldemarches');
						while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
							$id = $row['id'];
							$name = $row['nom'];
							$html .= "<option value='$id'>$name</option>";
						}
				$html .= "</select>
			</div>
		</aside>
		<article>
			<h4>Sélectionnez le smiley qui correspond le plus à votre avis</h4>";
			$inputimg5 = $form->img1('smiley5', '5', 'avis5.png', 'Unsatisfied');
			$inputimg4 = $form->img1('smiley4', '4', 'avis4.png', 'Not very satisfied');
			$inputimg3 = $form->img1('smiley3', '3', 'avis3.png', 'Suitable');
			$inputimg2 = $form->img1('smiley2', '2', 'avis2.png', 'Satisfied');
			$inputimg1 = $form->img1('smiley1', '1', 'avis1.png', 'Really satisfied');
			$html .= "$inputimg5";
			$html .= "$inputimg4";
			$html .= "$inputimg3";
			$html .= "$inputimg2";
			$html .= "$inputimg1";
		$html .= "</article>
	</body>
	";

	////////// Ajax to client //////////
	// Build JSON
	$jsonResponse = array("target"=>"body", "html"=>"$html");

	// Merge JSON
	$json = array();
	$json[] = $jsonResponse;

	// Send to client
	echo json_encode($json);

	?>
