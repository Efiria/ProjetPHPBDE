<?php 

$bdd = new PDO('mysql:host=localhost;dbname=projet_test_bdd;charset=utf8', 'root', '');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$identifiant = $_POST['identifiant'];
$email = $_POST['email'];
$numero = $_POST['numero'];
$ID= $_SESSION['ID'];



$requete = $bdd->prepare("SELECT nom FROM inscrits WHERE nom = :nom");
$requete->bindValue(':nom', $nom, PDO::PARAM_STR);
$requete->execute();

 if ($res = $requete->fetch())
{

     echo 'Vous êtes déjà inscrit à cette évènement';
}

else {

	$req = "INSERT INTO inscrits (nom, prenom, identifiant,email, numero) VALUES ( :nom, :prenom, :identifiant, :email, :numero)";
	$inscription_insert = $bdd ->prepare($req);
	$inscription_insert->bindValue(':nom', $nom, PDO::PARAM_STR);
	$inscription_insert->bindValue(':prenom', $prenom, PDO::PARAM_STR);
	$inscription_insert->bindValue(':identifiant', $identifiant, PDO::PARAM_STR);
	$inscription_insert->bindValue(':email',  $email, PDO::PARAM_STR);
	$inscription_insert->bindValue(':numero',  $numero, PDO::PARAM_INT);
	$inscription_insert->execute() or die ('pb insert');
}


?>