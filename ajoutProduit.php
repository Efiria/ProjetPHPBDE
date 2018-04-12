<?php

    $bdd = new PDO('mysql:host=localhost;dbname=projet_test_bdd;charset=utf8', 'root', '');

    $nomProd = $_POST['nomProd'];
    $descProd = $_POST['descProd'];
    $cateProd = $_POST['cateProd'];
    $prixProd = $_POST['prixProd'];
    
    $requete = $bdd->prepare("SELECT nom FROM produits WHERE nom = :nom ");
    $requete->bindValue(':nom', $nomProd);
    $reponse = $requete->execute();

    if($r_nomProd = $requete->fetch())
    {
        echo "<script type='text/javascript'>alert('Ce produit est deja en boutique')</script>";
        
    }else{
        $req = "INSERT INTO produits (nom, prix, description, categorie) VALUES ( :nom, :prix, :description, :categorie)";
        $ajoutProd_insert = $bdd ->prepare($req);
        $ajoutProd_insert->bindValue(':nom', $nomProd, PDO::PARAM_STR);
        $ajoutProd_insert->bindValue(':description', $descProd, PDO::PARAM_STR);
        $ajoutProd_insert->bindValue(':categorie', $cateProd, PDO::PARAM_STR);
        $ajoutProd_insert->bindValue(':prix',  $prixProd, PDO::PARAM_INT);
        $ajoutProd_insert->execute() or die ('pb insert');
    }

   header("Location: shop.php");	
    
?>