
<h2 class=""> <a href="panier.php"> Panier</a></h2>

<?php

$bdd = new PDO('mysql:host=localhost; dbname=projet_test_bdd; charset=utf8', 'root','');

$products = $bdd->prepare('SELECT * FROM produits');
$products -> execute();

$panier_count = 0;

if (isset($_GET["addProduct"]))
{
	if (!isset($_SESSION["panier"]))
  	{
    	$_SESSION["panier"] = array();
  	}
  		array_push($_SESSION["panier"], $_GET["addProduct"]);
}

if (isset($_SESSION["panier"]))
{
	$panier_count = sizeof($_SESSION["panier"]);
}

while ($answer = $products->fetch()){
	echo "<ul class='displayprod'>"; ?>
	<img src= <?php echo $answer['urlImage'] ?> , class='prodpic' height='100' lenght='100'/>
	<div class='price'> <?php echo $answer['prix']; ?> € </div>
	<div class='description'> <?php echo $answer['description']; ?> </div>
	<div class='stock'> stock :  <?php echo $answer['stock']; ?></div>
    <?php if(isset($_SESSION['status']) && $_SESSION['status'] >= 0 ){ ?>
	<a href="shop.php?addProduct=<?php echo $answer['nom']?>">Ajouter produit</a>
	</ul> 

	<?php }
};

$products -> closeCursor();


if (isset($_SESSION['status']) && $_SESSION['status'] >= 1 ){
    
?>

<div id="ajouter">
    <form method="post" action="ajoutProduit.php" autocomplete="on">
        <h1>Ajouter un Produit</h1> 
        <p> 
	     <label for="nomProd" class="nomProd" data-icon="u" >Nom du produit : </label>
	     <input id="nomProd" name="nomProd" required="required" type="text" placeholder=" Nom "/>
        </p>

        <p> 
        <label for="descProd" class="descProd" data-icon="p">Description produit : </label>
        <input id="descProd" name="descProd" required="required" type="text" placeholder=" description " /> 
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

<div id="supprimer">
    <form method="post" action="supprimerProduc.php" autocomplete="on">                         <h1>Supprimer un Produit</h1> 
        <p> 
	    <label for="nomProd" class="nomProd" data-icon="u" >Nom du Produit: </label>
	    <input id="nomProd" name="nomProd" required="required" type="text" placeholder="nom"/>
        </p>

                            
        <p class="supprimer button"> 
        <input type="submit" value="Supprimer" /> 
        </p>

    </form>
</div>

<?php } ?>