
<!DOCTYPE html>
<html>
<head>
	<?php include 'includes/header.php'	?>
    
	<?php
	if (isset($_GET["vider"]))
	{
  		$_SESSION['panier'] = null;
	}
    
    if (isset($_GET["valider"])){
        echo $_SESSION['identifiant'] . "</br>";
    }
    
	?>
</head>
<body>
    <a href="panier.php?vider=1">Vider le panier</a> </br>

 
	<?php
		//affichage
		if (isset($_SESSION["panier"]))
		{
			foreach ($_SESSION["panier"] as $value){
		    	echo $value . "</br>";
		  	}
		}
    
        if (isset($value) && $value ){
            ?> <a href="panier.php?valider=1">Valider le panier</a> </br> <?php
        }
        
	?>

</body>
</html>