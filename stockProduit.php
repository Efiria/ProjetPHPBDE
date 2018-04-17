<?php

    $bdd = new PDO('mysql:host=localhost;dbname=projet_test_bdd;charset=utf8', 'root', '');

    $nomProd = $_POST['nomProd'];
    $stockProd = $_POST['stockProd'];
    
    $requete = $bdd->prepare("SELECT nom FROM produits WHERE nom = :nom ");
    $requete->bindValue(':nom', $nomProd);
    $requete->execute();


    if($r_nomProd = $requete->fetch())
    {
        echo "<script type='text/javascript'>alert('Ce produit n\'existe pas')</script>";
        
    }else{
        $req = "UPDATE produits SET stock = :stockProd WHERE nom = '$nomProd' ";
        $ajoutProd_insert = $bdd ->prepare($req);
        $ajoutProd_insert->bindValue(':stockProd',  $stockProd, PDO::PARAM_INT);
        $ajoutProd_insert->execute() or die ('pb insert');
    }

    //header("Location: shop.php");	
    
?>