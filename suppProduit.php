<?php
    $bdd = new PDO('mysql:host=localhost;dbname=projet_test_bdd;charset=utf8', 'root', '');

    $nomProd = $_POST['nomProds'];
    $requete = $bdd->query("DELETE FROM produits WHERE $nomProd = nom");
    
    header("Location: shop.php");

?>