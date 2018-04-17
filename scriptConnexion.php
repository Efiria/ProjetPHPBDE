<?php

session_start();



$bdd = new PDO('mysql:host=localhost;dbname=projet_test_bdd;charset=utf8', 'root', '');

$identifiant = $_POST['identifiant'];
$mdp = $_POST['mdp'];

$requete = $bdd->prepare("SELECT identifiant, mdp FROM utilisateurs WHERE identifiant = :identifiant AND mdp = :mdp");
$requete->bindValue(':identifiant', $identifiant, PDO::PARAM_STR);
$requete->bindValue(':mdp', $mdp, PDO::PARAM_STR);
$requete->execute();
	
if($inscription = $requete->fetch())
{
	$_SESSION['connecte'] = true;
	
	$status = $bdd->prepare("SELECT * FROM utilisateurs WHERE identifiant = '$identifiant' ");
	$status->execute();
	if ($answer = $status->fetch()){

		$_SESSION['status'] = $answer['status'];
		$_SESSION['identifiant'] = $identifiant;
	}

	header("Location: index.php");
} 

else 
{
	?> <script> alert ('Connexion échouée') </script> 
	<a href="index.php">retour</a>
	<?php
}

?>