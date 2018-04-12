<?php

include 'include/header.php';

//A changer en fonction
$bdd = new PDO('mysql:host=localhost;dbname=projet_test_bdd;charset=utf8', 'root', '');

$categorie = $_POST['categorie'];
$eventdate = $_POST['eventdate'];
$description = $_POST['description'];

$event_insert = $bdd->prepare("INSERT INTO bai (categorie, eventdate, description) VALUES ( :categorie, :eventdate, :description)");
$event_insert->bindValue(':categorie', $categorie, PDO::PARAM_STR);
$event_insert->bindValue(':eventdate', $eventdate, PDO::PARAM_STR);
$event_insert->bindValue(':description', $description, PDO::PARAM_STR);
$event_insert->execute() or die('pb insert');

echo "test reussi";

?>