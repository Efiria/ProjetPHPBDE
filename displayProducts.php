
<h2 class=""> <a href="panier.php"> Panier</a></h2>

<?php

//Get product from bdd

$bdd = new PDO('mysql:host=localhost; dbname=projet_test_bdd; charset=utf8', 'root','');

$panier_count = 0;


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
    ?><a href="shop.php">enlever filtre <?php echo $search ?> </a></br> <?php
}


//Create panier

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



//Display Product 

while ($answer = $products->fetch()){
	echo "<div class='displayprod'>"; ?>
	<img src= <?php echo $answer['urlImage'] ?> , class='prodpic' height='100' lenght='100'/>
    <div class='nomProd'> <?php echo $answer['nom'] ?></div>
	<div class='price'> <?php echo $answer['prix']; ?> € </div>
	<div class='description'> <?php echo $answer['description']; ?> </div>
	<div class='stock'> stock :  <?php echo $answer['stock']; ?></div>
    <?php if(isset($_SESSION['status']) && $_SESSION['status'] >= 0 ){ ?>
	<a href="shop.php?addProduct=<?php echo $answer['nom']?>">Ajouter au panier</a>
    <div> catégorie : <?php echo $answer['categorie']; ?></div>
	</div> 

	<?php }
};

$products -> closeCursor();


if (isset($_SESSION['status']) && $_SESSION['status'] >= 1 ){
    
    ?>

    <!-- Ajouter -->

    <div id="ajouter">
        <form method="post" action="ajoutProduit.php" autocomplete="on" enctype="multipart/form-data">
            <h1>Ajouter un Produit</h1> 
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

    <!-- Supprimer -->

    <div id="supprimer">
        <form method="post" action="suppProduit.php" autocomplete="on">                         
            <h1>Supprimer un Produit</h1> 
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