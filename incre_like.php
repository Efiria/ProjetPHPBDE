<!DOCTYPE html>

<html>

     <head>
        <?php include("includes/header.php"); ?>

        <?php 
        	$id_event = $_GET['id'];
        	$likes = '1';
        	$bdd = new PDO('mysql:host=localhost;dbname=projet_test_bdd;charset=utf8', 'root', '');

        	$requete = $bdd->prepare("SELECT FK_Event, FK_Utilisateur FROM publications WHERE FK_Utilisateur = :id_user AND FK_Event = :id_event");
			$requete->bindValue(':id_event', $id_event, PDO::PARAM_INT);
			$requete->bindValue(':id_user', $_SESSION['ID'], PDO::PARAM_INT);
			$requete->execute();

        ?>
    </head>

	<body>
	    <div>
	        <?php

	        	if (!isset($_SESSION['ID'])) {
	        		header("Location: event.php");
	        	}elseif ($inscription = $requete->fetch()) {
	        		$req = "DELETE FROM publications WHERE FK_Utilisateur = :id_user AND FK_Event = :id_event";
	        		$inscription_delete = $bdd ->prepare($req);
	        		$inscription_delete->bindValue(':id_event', $id_event, PDO::PARAM_INT);
					$inscription_delete->bindValue(':id_user', $_SESSION['ID'], PDO::PARAM_INT);	
	        		$inscription_delete->execute() or die ('pb insert');	
	        		header("Location: event.php");
	        	}else{
			        $req = "INSERT INTO publications ( likes,FK_Event, FK_Utilisateur) VALUES ( :likes,:idevent, :id)";
					$inscription_insert = $bdd ->prepare($req);
					$inscription_insert->bindValue(':likes', $likes, PDO::PARAM_STR);
					$inscription_insert->bindValue(':idevent',  $id_event, PDO::PARAM_INT);
					$inscription_insert->bindValue(':id',  $_SESSION['ID'], PDO::PARAM_INT);
					$inscription_insert->execute() or die ('pb insert');	
	        	}

				header("Location: event.php");
	        ?>
	    </div>

	    <footer class="copyright-wrapper">
        	<?php include("footer.php"); ?>
    	</footer>
	</body>
</body>