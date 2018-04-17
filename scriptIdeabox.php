<?php

include 'includes/header.php';

$bdd = new PDO('mysql:host=localhost;dbname=projet_test_bdd;charset=utf8', 'root', '');

$nom_event = $_POST['nom_event'];
$date_event = $_POST['date_event'];
$description = $_POST['description'];
$status = $_SESSION['status'];

if($status=true){
$event_insert = $bdd->prepare("INSERT INTO bai (nom_event, date_event, description, status) VALUES ( :nom_event, :date_event, :description, :status)");
$event_insert->bindValue(':nom_event', $nom_event, PDO::PARAM_STR);
$event_insert->bindValue(':date_event', $date_event, PDO::PARAM_STR);
$event_insert->bindValue(':description', $description, PDO::PARAM_STR);
$event_insert->bindValue(':status', $_SESSION['status'], PDO::PARAM_STR);

$event_insert->execute() or die('pb insert');
}

else{
	echo "Veuillez vous connecter !";
}

?>