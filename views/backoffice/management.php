<?php
	require_once(ROOT.'/models/includes/Autoloader.php');
	Autoloader::register();
	$form = new Form ($_POST);
?>
		<header>
		<nav>
			<a href="management"><img src="../images/logo.png"/></a>
			<h1>Gestion des catégories et démarches</h1>
			<a class="disconnect" href="../">Déconnexion</a>
		</nav>
		<article>
			<?php
			$ViewCategories = new ViewCategories;
			$ViewCategories->showAllCategories();
			?>
		</article>
		<article>
			<?php
			$ViewSteps = new ViewSteps;
			$ViewSteps->showAllSteps();
			?>
		</article>
		</header>
		<aside>
			<button class='selectCategory'><h3>Catégorie</h3></button>
			<button class='selectStep'><h3>Démarche</h3></button>
			<a class="disconnect" href="viewReview"><h3>Voir les avis</h3></a>
		</aside>
			<div class="category">
			<ul>
				<li><img src="../medias/ajouter.png"/></li>
				<li><h2>Création</h2></li>
				<form action="./doCreate" method="POST">
					<li><?php echo $form->input('category', "Nom de la catégorie"); ?></li>
					<li><?php echo $form->submit('Créer la catégorie'); ?></li>
				</form>
			</ul>

			<ul>
				<li><img src="../medias/modifier.png"/></li>
				<li><h2>Modification</h2></li>
				<form action="./doModify" method="POST">
					<li><?php echo $form->input('idcat', "Indiquer l'ID de la catégorie"); ?></li>
					<li><?php echo $form->input('category', "Nom de la catégorie"); ?></li>
					<li><?php echo $form->submit('Modifier la catégorie'); ?></li>
				</form>
			</ul>

			<ul>
				<li><img src="../medias/supprimer.png"/></li>
				<li><h2>Supprimer</h2></li>
				<form action="./doDelete" method="POST">
					<li><?php echo $form->input('idcat', "Indiquer l'ID de la catégorie"); ?></li>
					<li><?php echo $form->input('category', "Nom de la catégorie"); ?></li>
					<li><?php echo $form->submit('Supprimer la catégorie'); ?></li>
				</form>
			</ul>
		</div>

		<div class="step">
			<ul>
				<li><img src="../medias/ajouter.png"/></li>
				<li><h2>Création</h2></li>
				<form action="./doCreate" method="POST">
					<li><?php echo $form->input('step', "Nom de la démarche"); ?></li>
					<li><?php echo $form->input('idcat', "Indiquer l'ID de la catégorie"); ?></li>
					<li><?php echo $form->submit('Créer la démarche'); ?></li>
				</form>
			</ul>

			<ul>
				<li><img src="../medias/modifier.png"/></li>
				<li><h2>Modification</h2></li>
				<form action="./doModify" method="POST">
					<li><?php echo $form->input('idstep', "Indiquer l'ID de la démarche"); ?></li>
					<li><?php echo $form->input('step', "Nom de la démarche"); ?></li>
					<li><?php echo $form->submit('Modifier la démarche'); ?></li>
				</form>
			</ul>

			<ul>
				<li><img src="../medias/supprimer.png"/></li>
				<li><h2>Supprimer</h2></li>
				<form action="./doDelete" method="POST">
					<li><?php echo $form->input('idstep', "Indiquer l'ID de la démarche"); ?></li>
					<li><?php echo $form->input('step', "Nom de la démarche"); ?></li>
					<li><?php echo $form->submit('Supprimer la démarche'); ?></li>
				</form>
			</ul>
		</div>