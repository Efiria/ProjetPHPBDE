<?php 

$bdd = new PDO('mysql:host=localhost;dbname=projet_test_bdd;charset=utf8', 'root', '');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$identifiant = $_POST['identifiant'];
$mdp = $_POST['mdp'];
$email = $_POST['email'];
$numero = $_POST['numero'];

$requete = $bdd->prepare("SELECT nom FROM utilisateurs WHERE nom = :nom ");
$requete->bindValue(':nom', $nom);
$reponse = $requete->execute();

$requete_0 = $bdd->prepare("SELECT prenom FROM utilisateurs WHERE prenom = :prenom ");
$requete_0->bindValue(':prenom', $prenom);
$reponse_0 = $requete_0->execute();

$requete_1 = $bdd->prepare("SELECT email FROM utilisateurs WHERE email = :email ");
$requete_1->bindValue(':email', $email);
$reponse_1 = $requete_1->execute();

$requete_2 = $bdd->prepare("SELECT numero FROM utilisateurs WHERE numero = :numero ");
$requete_2->bindValue(':numero', $numero);
$reponse_2 = $requete_2->execute();

$requete_3 = $bdd->prepare("SELECT identifiant FROM utilisateurs WHERE identifiant = :identifiant ");
$requete_3->bindValue(':identifiant', $identifiant);
$reponse_3 = $requete_3->execute();


if ( ! preg_match("~^[\w]+$~", $mdp) ) {
	echo "<script type='text/javascript'>alert('Uniquement des lettres ou des chiffres sur le mot de passe')</script>";
	return;
}

elseif ( ! preg_match("~[A-Z]+~", $mdp) ) {
	 echo "<script type='text/javascript'>alert('Au moins une majuscule sur le mot de passe !')</script>";
	 return;
}

elseif ( ! preg_match("~[a-z]+~", $mdp) ) {
	 echo "<script type='text/javascript'>alert('Au moins une minuscule sur le mot de passe!')</script>";
	 return;
}

elseif ( ! preg_match("~[0-9]~", $mdp) ) {
    echo "<script type='text/javascript'>alert('Au moins un chiffre sur le mot de passe!')</script>";
	return;
} 


if($inscription_nom = $requete->fetch())
{
	echo "<script type='text/javascript'>alert('Nom déjà utilisé')</script>";
}

elseif($inscription_prenom = $requete_0->fetch())
{
	echo "<script type='text/javascript'>alert('Prenom déjà utilisé')</script>";
}

elseif($inscription_id_bde = $requete_3->fetch())
{
	echo "<script type='text/javascript'>alert('Identifiant déjà utilisé')</script>";
}

elseif($inscription_mail = $requete_1->fetch())
{
	echo "<script type='text/javascript'>alert('Email déjà utilisé')</script>";
}

elseif($inscription_numero = $requete_2->fetch())
{
	echo "<script type='text/javascript'>alert('Numéro déjà utilisé')</script>";
}

else 
{
	echo 'Votre inscription cest déroulée avec succès';
	$req = "INSERT INTO utilisateurs (nom, prenom, identifiant, mdp, email, numero) VALUES ( :nom, :prenom, :identifiant, :mdp, :email, :numero)";
	$inscription_insert = $bdd ->prepare($req);
	$inscription_insert->bindValue(':nom', $nom, PDO::PARAM_STR);
	$inscription_insert->bindValue(':prenom', $prenom, PDO::PARAM_STR);
	$inscription_insert->bindValue(':identifiant', $identifiant, PDO::PARAM_STR);
	$inscription_insert->bindValue(':mdp',  $mdp, PDO::PARAM_STR);
	$inscription_insert->bindValue(':email',  $email, PDO::PARAM_STR);
	$inscription_insert->bindValue(':numero',  $numero, PDO::PARAM_INT);
	$inscription_insert->execute() or die ('pb insert');
}

?>