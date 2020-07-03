<?php

	//////////////////////////////////////////////////////////////////////////////////////
  // Datas from Admin

  $db_host = NULL;
  if (isset($_POST['db_host']) && $_POST['db_host'] != '') {
  $db_host = $_POST['db_host'];
  }

	$db_login = NULL;
	if (isset($_POST['db_login']) && $_POST['db_login'] != '') {
		$db_login = $_POST['db_login'];
	}

	$db_pass = NULL;
	if (isset($_POST['db_pass']) && $_POST['db_pass'] != '') {
		$db_pass = $_POST['db_pass'];
	}

  $db_name = NULL;
  if (isset($_POST['db_name']) && $_POST['db_name'] != '') {
    $db_name = $_POST['db_name'];
  }

//////////////////////////////////////////////////////////////////////////////////////
// Connect to server
  try {
    $dbco = new PDO("mysql:host=$db_host", $db_login, $db_pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE DATABASE IF NOT EXISTS ".$db_name." DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
    $dbco->prepare($sql)->execute();

    echo '<p>Base de données a bien été créée !</p>'.'<br>';
  }

  catch(PDOException $e){
    echo '<p>Erreur : ' . $e->getMessage().'</p>'.'<br>';
  }

  try{
    $dbco = new PDO("mysql:host=$db_host;dbname=$db_name", $db_login, $db_pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE tblusers(
            id INT(11) AUTO_INCREMENT PRIMARY KEY, INDEX (`id`),
            nom VARCHAR(30) NOT NULL,
            password VARCHAR(20) NOT NULL
            )";

    $dbco->exec($sql);
    echo '<p>La Table users a bien été créée !</p>'.'<br>';

    $sql = "CREATE TABLE tbldemarches(
            id INT(11) AUTO_INCREMENT PRIMARY KEY, INDEX (`id`),
            nom VARCHAR(200) NOT NULL,
            idCategorie INT(11) NOT NULL, INDEX (`idCategorie`)
            )";

    $dbco->exec($sql);
    echo '<p>La Table démarches a bien été créée !</p>'.'<br>';

    $sql = "CREATE TABLE tblcategories(
            id INT(11) AUTO_INCREMENT PRIMARY KEY, INDEX (`id`),
            nom VARCHAR(40) NOT NULL
            )";

    $dbco->exec($sql);
    echo '<p>La Table catégories a bien été créée !</p>'.'<br>';

    $sql = "CREATE TABLE tblclients(
            id INT(11) AUTO_INCREMENT PRIMARY KEY, INDEX (`id`),
            nom VARCHAR(30) NOT NULL,
            prenom VARCHAR(100) NOT NULL
            )";

    $dbco->exec($sql);
    echo '<p>La Table clients a bien été créée !</p>'.'<br>';

    $sql = "CREATE TABLE tblavis(
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            idclient INT(11) NOT NULL, INDEX (`idclient`),
            idCategorie INT(11) NOT NULL, INDEX (`idCategorie`),
            idDemarche INT(11) NOT NULL, INDEX (`idDemarche`),
            status INT(11) NOT NULL COMMENT '1:Unsatisfied 2:Not very satisfied 3:Suitable 4:Satisfied 5:Really satisfied'
            )";

    $dbco->exec($sql);
    echo '<p>La Table avis a bien été créée !</p>'.'<br>';
  }

  catch(PDOException $e){
  echo "<p>Erreur : " . $e->getMessage()."</p>".'<br>';
  }

?>

<!DOCTYPE html>

<html>
	<!-- En tête -->
	<head>
    <link rel='stylesheet' type='text/css' href='./css/web.css' media='screen' />

		<!-- Encodage UTF8 pour les accents -->
		<meta charset='UTF-8'>

		<!-- Icône de l'onglet -->
		<link rel='icon' type='image/png' href='./images/logo.png' />

		<!-- Titre de l'onglet -->
		<title>Install</title>
	</head>

	<!-- Corps du document -->
	 <body>
     <div class="wrapper">
	    <article>
      <h1>Créer la base de données et ses tables</h1>
			 <form action="Installer.php" method="post">
        <input type="text" name="db_host" placeholder="Adresse du serveur" required>
        <input type="text" name="db_login" placeholder="Identifiant" required>
        <input type="password" name="db_pass" placeholder="Mot de passe">
        <input type="text" name="db_name" placeholder="Nom de la base de données" required>
        <input type="submit" value="Créer">
			</form>
		  </article>
    </div>
	</body>
</html>
