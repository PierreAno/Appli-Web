<?php

	//////////////////////////////////////////////////////////////////////////////////////
	// Récupère dans la session

		// Ouvre session
		session_start();

		// Récupère dans session
		$id = NULL;
		if (isset($_SESSION['id'])) {
			$id = $_SESSION['id'];
		}

	require_once(ROOT.'/models/includes/Autoloader.php');
	Autoloader::register();

//////////////////////////////////////////////////////////////////////////////////////
// Customer's datas
	$category = $_POST['category'];
	$step = $_POST['step'];
	$idcat = $_POST['idcat'];
	$idstep = $_POST['idstep'];

////////////////////////////////////////////////////////////////////////////////////////
// Create a category

	if ($step == '') {

		$pdoquery = App::getDb()->query('SELECT COUNT(*) AS cat FROM tblcategories WHERE nom ='."'$category'");

		 if(isset($category)){
			 if(!($pdoquery == 0)){
				 echo "Cette catégorie existe déjà !";
				 // Redirection
				 header("Location: management");
			 }else{
				 $Createcategory =	new Category;
				 $Createcategory->createCategory($category);
				 // Redirection
				 header("Location: management");
			 }
		 }
		////////////////////////////////////////////////////////////////////////////////////////
		// Create a step

		}else{
		//////////////////////////////////////////////////////////////////////////////////////
		// Query : Insert

		$pdoquery = App::getDb()->query('SELECT COUNT(*) AS cat FROM tblcategories WHERE nom ='."'$step'");

		 if(isset($step)){
			 if(!($pdoquery == 0)){
				 echo "Cette démarche existe déjà !";
				 // Redirection
				 header("Location: management");
			 }else{
				$Createstep =	new Step;
				$Createstep->createStep($step, $idcat);
				// Redirection
				header("Location: management");
			}
		}
	}
?>
