<?php

include 'includes/header.php';

$bdd = new PDO('mysql:host=localhost;dbname=projet_test_bdd;charset=utf8', 'root', '');

$nom_event = $_POST['nom_event'];
$date_event = $_POST['date_event'];
$description = $_POST['description'];
$dossier = 'img/events/';
$fichier = $dossier . basename($_FILES["imgEvent"]["name"]);
$imageFileType = strtolower(pathinfo($fichier,PATHINFO_EXTENSION));

if(isset($_SESSION['status'])){
$event_insert = $bdd->prepare("INSERT INTO bai (nom_event, date_event, description, status, urlImage, FK_Utilisateur) VALUES ( :nom_event, :date_event, :description, :status, :lien, :id)");
$event_insert->bindValue(':nom_event', $nom_event, PDO::PARAM_STR);
$event_insert->bindValue(':date_event', $date_event, PDO::PARAM_STR);
$event_insert->bindValue(':description', $description, PDO::PARAM_STR);
$event_insert->bindValue(':status', $_SESSION['status'], PDO::PARAM_STR);
$event_insert->bindValue(':lien',$fichier, PDO::PARAM_STR);
$event_insert->bindValue(':id',  $_SESSION['ID'], PDO::PARAM_INT);
$event_insert->execute() or die('pb insert');
header("Location: ideabox.php");
}

else{
	echo "Veuillez vous connecter !";
}

?>