<?php

	require_once(ROOT.'/models/includes/Autoloader.php');
	Autoloader::register();

	$conn = new PDO('mysql:dbname=projetstage;host=localhost', 'root', '');
	$pdoquery = $conn->prepare('SELECT * FROM tblavis');
	$pdoquery->execute();
	$nb_row = $pdoquery->rowCount();
?>
		<section>
			<nav>
				<a href="./management"><img src="../images/logo.png"/></a>
				<a href="../backoffice/">Déconnexion</a>
			</nav>
			<div class="review">
	<?php
	for ($i=$nb_row-1; $nb_row > $i; $i++) {
	  foreach (App::getDb()->query('SELECT * FROM tblavis')as $post):
	    $idcust = $post->idclient;
	    $idcat = $post->idCategorie;
	    $idstep = $post->idDemarche;
	    $img = $post->status;
	      ?>
					<article>
						<aside>
	      <?php
	      echo "Son avis : ".'<br>';
				?>
				<?php
	      $image='../medias/avis'.$img.'.png';
	      echo '<img src="'.$image.'">'.'<br>';
	      ?>
			</aside>
	        <p>
	<?php
	      foreach (App::getDb()->query('SELECT nom, prenom FROM tblclients WHERE id='.$idcust)as $post):
	        echo "Mr,Mme : ". $post->nom." ".$post->prenom.'<br>';
	      endforeach;
	      echo "La catégorie du service sélectionné : ";
	      foreach (App::getDb()->query('SELECT nom FROM tblcategories WHERE id='.$idcat)as $post):
	        echo $post->nom.'<br>';
	      endforeach;
	      echo "La démarche sélectionné : ";
	      foreach (App::getDb()->query('SELECT nom FROM tbldemarches WHERE id='.$idstep)as $post):
	        echo $post->nom.'<br>';
	      endforeach;
	?>
	        	</p>
					</article>
	      <?php
	  endforeach;
	}
	?>
			</div>
		</section>
