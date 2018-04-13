<?php
    //connexion a la bdd
    $bdd = new PDO('mysql:host=localhost;dbname=projet_test_bdd;charset=utf8', 'root', '');

    //recuperation du nom avec POST
    $nomProd = $_POST['nomProd'];

    //Creation de la requete a executer pour supprimer
    $requete = $bdd->prepare("DELETE FROM produits WHERE nom = '$nomProd' ");
    $requete->execute();
    
    //redirection sur le shop
    header("Location: shop.php");

?>