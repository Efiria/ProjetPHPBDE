
<h2 class=""> <a href="panier.php"> Panier</a></h2>

<?php

//Get product from bdd

$bdd = new PDO('mysql:host=localhost; dbname=projet_test_bdd; charset=utf8', 'root','');

//Search zone

?>

<form action="shop.php" method="POST">
    <input type="text" name="query" placeholder="<?php $search ?>"/>
    <input type="submit" value="Search" />
</form>
</br>

<?php
if(isset($_POST['query'])){
    $search = $_POST['query'];
    
    $products = $bdd->prepare("SELECT * FROM produits WHERE categorie = '$search' ");
    $products -> execute();
    
}else {
    $products = $bdd->prepare('SELECT * FROM produits');
    $products -> execute();
}
           
if(isset($search)){
    ?><a href="shop.php">enlever filtre <?php echo $search ?> </a> </br> <?php
}

//Display Product 
?>

<div id="article">
    <h2>Articles recommandées</h2>
                         <div class="row">
                                <?php
                                    $products -> execute();
                                        while ($answer = $products->fetch()){
                                        ?>
                                        <div class='col-xs-4 col-md-4'>
                                            <img src= <?php echo $answer['urlImage'] ?> , class='prodpic' height='100' lenght='100'/>
                                            <div class='nom'>
                                                <label>Nom:</label> <?php echo $answer['nom']; ?>
                                            </div>
                                            <div class='prix'>
                                                <label>Prix:</label> <?php echo $answer['prix']; ?> €
                                            </div>
                                            <div class='descri'> 
                                                <label>Description:</label> <?php echo $answer['description']; ?> 
                                            </div>
                                            <div class='cate'> 
                                                <label>Catégorie:</label> <?php echo $answer['categorie']; ?> 
                                            </div>
                                            <div class='stock'> 
                                                <label>Stock:</label>  <?php echo $answer['stock']; ?>      
                                            </div> 
                                            <div class="ajout">
                                                 <a href="shop.php?addProduct=<?php echo $answer['nom']?>">Ajouter au panier</a>
                                            </div>
                                            </div>                      
   
                               <?php };?> 
                        </div>
                    </div>
<?php

//ajout panier

if (isset($_GET["addProduct"]))
{
    $nomProd = $_GET["addProduct"];

    //Ajout dans le panier
    $pushPanier = $bdd->prepare("INSERT INTO commandes (NomProd, FK_Utilisateur) VALUES ( :idprod, :iduser)");
    $pushPanier->bindValue(':idprod', $_GET['addProduct'], PDO::PARAM_STR);
    $pushPanier->bindValue(':iduser', $_SESSION['ID'], PDO::PARAM_INT);
    $pushPanier -> execute() or die('error');

    //stock -1
    $selecStock = $bdd->prepare("SELECT stock, achat FROM produits WHERE nom = '$nomProd' ");
    $selecStock ->execute();

    while($answer_prod = $selecStock->fetch()){
        $stockPanier = $bdd->prepare("UPDATE produits SET stock = :stockProd WHERE nom = '$nomProd' ");
        if ($answer_prod['stock'] <= 0) {
            ?> <script> alert('Ajout impossible')</script><?php
        } else {
            $stockprod = $answer_prod['stock'] -1;
            echo $stockprod;
            $stockPanier->bindValue(':stockProd', $stockprod, PDO::PARAM_INT);
            $stockPanier ->execute();

            //achat +1
            $achatPanier = $bdd->prepare("UPDATE produits SET achat = :achatProd WHERE nom = '$nomProd' ");
            $achatProd = $answer_prod['achat'] + 1;
            echo $achatProd;
            $achatPanier->bindValue(':achatProd', $achatProd, PDO::PARAM_INT);
            $achatPanier ->execute();
        }
        
    }

}


$products -> closeCursor();


if (isset($_SESSION['status']) && $_SESSION['status'] >= 1 ){
    
    ?>

    <!-- Ajouter -->

    <div id="ajouter">
        <form method="post" action="ajoutProduit.php" autocomplete="on" enctype="multipart/form-data">
            <h2>Ajouter un Produit</h2> 
            <p> 
             <label for="nomProduit" class="nomProduct" data-icon="u" >Nom du produit : </label>
             <input id="nomProduit" name="nomProd" required="required" type="text" placeholder=" Nom "/>
            </p>

            <p> 
             <label for="prixProd" class="prixProd" data-icon="u" >Prix du produit : </label>
             <input id="prixProd" name="prixProd" required="required" type="text" placeholder=" Prix "/>
            </p>

            <p> 
            <label for="descProd" class="descProd" data-icon="p">Description produit : </label> </br>
            <textarea id="descProd" name="descProd" required="required" cols="50" rows="10"></textarea>
            </p>

            <p> 
            <label for="cateProd" class="cateProd" data-icon="p">Catégorie du produit : </label>
            <input id="cateProd" name="cateProd" required="required" type="text" placeholder=" catégorie " /> 
            </p>

            <p>
            <label for="imgProd" class="imgProd" data-icon="p">Image du produit : </label>
            <input type="file" name="imgProd" />
            </p>

            <p class="ajouter button"> 
            <input type="submit" value="Ajouter" /> 
            </p>
        </form>
    </div>

<!-- Ajouter -->

    <div id="stock">
        <form method="post" action="stockProduit.php" autocomplete="on">                         
            <h2>Stock d'un Produit</h2> 
            <p> 
            <label for="nomProds" class="nomProds" data-icon="u" >Nom du Produit: </label>
            <input id="nomProd" name="nomProd" required="required" type="text" placeholder="nom"/>
            </p>
            
             <p> 
            <label for="stockProds" class="stockProds" data-icon="u" >Stock du Produit: </label>
            <input id="stockProds" name="stockProds" required="required" type="text" placeholder="stock"/>
            </p>

            <p class="stock button"> 
            <input type="submit" value="Ajouter Stock" /> 
            </p>

        </form>
    </div>

    <!-- Supprimer -->

    <div id="supprimer">
        <form method="post" action="suppProduit.php" autocomplete="on">                         
            <h2>Supprimer un Produit</h2> 
            <p> 
            <label for="nomProds" class="nomProds" data-icon="u" >Nom du Produit: </label>
            <input id="nomProd" name="nomProd" required="required" type="text" placeholder="nom"/>
            </p>

            <p class="supprimer button"> 
            <input type="submit" value="Supprimer" /> 
            </p>

        </form>
    </div>

<?php } ?>