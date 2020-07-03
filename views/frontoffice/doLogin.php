<?php
////////// Ajax from customer //////////
// Get from customer
$data = array();

if (isset($_POST['data'])) {
  $data = json_decode($_POST['data'], true);
}
$lastName = NULL;
if (isset($data['lastName'])) {
  $lastName = $data['lastName'];
}
$firstName = NULL;
if (isset($data['firstName'])) {
  $firstName = $data['firstName'];
}
extract($_POST);

	//////////////////////////////////////////////////////////////////////////////////////
	// Query : Select

	$conn = new PDO('mysql:dbname=projetstage;host=localhost', 'root', '');

	$pdoquery = $conn->prepare('SELECT id FROM tblclients WHERE nom = '."'$lastName'".' AND prenom = '."'$firstName'");

	$Select = $pdoquery->execute();

	$ids = $pdoquery->fetchAll();

	foreach ($ids as $id):
		$idcust = $id['id'];
	endforeach;

			// Open a session
			session_start();

			// Registre in the session
			$_SESSION['id'] = $idcust;

			echo $_SESSION['id'];

		if ($idcust = NULL){
	//////////////////////////////////////////////////////////////////////////////////////
	// Query : Insert

		// Query
		$pdoquery = $conn->prepare('INSERT INTO tblclients VALUES (NULL, :nom, :prenom)');

		// Link the marker to a value
		$pdoquery->bindValue(':nom', $lastName, PDO::PARAM_STR);
		$pdoquery->bindValue(':prenom', $firstName, PDO::PARAM_STR);

		$Create = $pdoquery->execute();

		if ($Create){

		//////////////////////////////////////////////////////////////////////////////////////
		// Query : Select

			// Query
			$pdoquery = $conn->prepare('SELECT id FROM tblclients WHERE nom = '."'$lastName'".' AND prenom = '."'$firstName'");

			$Select = $pdoquery->execute();

			$ids = $pdoquery->fetchAll();

			foreach ($ids as $id):
				$idcust = $id['id'];
			endforeach;

			// Open a session
			session_start();

			// Registre in the session
			$_SESSION['id'] = $idcust;

			// Redirection
			header("Location: ./review");
		}else{
			echo "ERROR";
		}
	}else{
		// Redirection
		header("Location: ./review");
	}
?>
