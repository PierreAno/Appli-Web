<?php
	require_once(ROOT.'/models/includes/Autoloader.php');
	Autoloader::register();
	$form = new Form ($_POST);
?>
<!-- Wrapper -->
<div class='wrapper'>
  <div class='section'>
    <img src="../medias/cacl.jpg"/>
    <h1>Connexion</h1>
    <h2>Bienvenue sur l'inteface administrateur des avis clients</h2>
    <article>
	<form action="./management" method="post">
		<li><?php echo $form->input('login', "Nom d'utilisateur"); ?></li>
		<li><?php echo $form->pass('pwd'); ?></li>
		<li><?php echo $form->submit('Connexion'); ?></li>
	</form>
    </article>
  </div>
</div>