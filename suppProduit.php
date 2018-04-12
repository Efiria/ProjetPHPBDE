<?php
    $bdd = new PDO('mysql:host=localhost;dbname=projet_test_bdd;charset=utf8', 'root', '');

    $nomProd = $_POST['nomProd'];

    $requete = $bdd->prepare("DELETE FROM produits WHERE nom = '$nomProd' ");
    $requete->execute();
    
    header("Location: shop.php");

?>