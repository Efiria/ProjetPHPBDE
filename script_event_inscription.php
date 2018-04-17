<?php

include 'includes/header.php';

$bdd = new PDO('mysql:host=localhost;dbname=projet_test_bdd;charset=utf8', 'root', '');
$etat = "valider";

if(isset($_SESSION['status']) && $_SESSION['status'] >= 1){
$event_insert = $bdd->prepare("UPDATE bai etat SET etat = :etat");
$event_insert->bindValue(':etat', $etat, PDO::PARAM_STR);
$event_insert->execute() or die('pb insert');
header('Location: ideabox.php');
}

else{
	return;
}

?>