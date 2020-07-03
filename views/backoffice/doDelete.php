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
// delete a category

	if ($step == '') {
		$pdoquery = App::getDb()->query('SELECT COUNT(*) AS cat FROM tblcategories WHERE id ='."'$idcat'".' AND nom ='."'$category'");

		 if(isset($category)){
			 if(!($pdoquery == 0)){
				 $Deletecategory =	new Category;
				 $Deletecategory->deleteCategory($idcat, $category);
				 // Redirection
				 header("Location: ../backoffice/management");
			 }else{
				 echo "Cette catégorie n'existe pas !";
				 // Redirection
				 header("Location: ../backoffice/management");
			 }
		 }
		}else{
		////////////////////////////////////////////////////////////////////////////////////////
		// delete a step

		$pdoquery = App::getDb()->query('SELECT COUNT(*) AS cat FROM tbldemarches WHERE nom ='."'$step'");

		 if(isset($step)){
			 if(!($pdoquery == 0)){
				 $deleteStep =	new Step;
				 $deleteStep->deleteStep($idstep, $step);
				 // Redirection
				 header("Location: ../backoffice/management");
			 }else{
				 echo "Cette démarche n'existe pas !";
				 // Redirection
				 header("Location: ../backoffice/management");
			}
		}
	}
?>
