
<!DOCTYPE html>
<html>
<head>
    <script src="https://www.paypalobjects.com/api/checkout.js"> </script>
	<?php include 'includes/header.php'	?>
    
    <?php
    $bdd = new PDO('mysql:host=localhost; dbname=projet_test_bdd; charset=utf8', 'root','');
    
    
    
	if (isset($_GET["vider"]))
	{
  		$_SESSION['panier'] = null;
	}
    
    if (isset($_GET["valider"])){
        $head = 'Commande de ';
        $message = "Bonjour veuillez contacter l'utilisateur pour finir sa commande";
        
        $user = $_SESSION['identifiant'];
        $requete_mail = $bdd->prepare('SELECT email FROM utilisateurs WHERE status = 1 ');
        $requete_mail -> execute();
        
        while($answer = $requete_mail->fetch()){
            mail($answer['email'], $head . $_SESSION['identifiant'], $message);
        }
        
        $_SESSION['panier'] = null;
    }
    
	?>
</head>
<body>
 
	<?php
		//affichage
    
		if (isset($_SESSION["panier"]))
		{
			foreach ($_SESSION["panier"] as $value){
		    	echo $value . "</br>";
                
                $produits = $value;
    
                $products = $bdd->prepare("SELECT * FROM produits WHERE id = '$produits' ");
                $products -> execute();
                
                while($answer = $products->fetch()){
                    echo $answer['prix'];
                }
                
		  	}
		}
    
        if (isset($value) && $value ){
            ?> 
            <a href="panier.php?vider=1">Vider le panier</a></br> </br> 
            <a href="panier.php?valider=1">Valider le panier</a> </br> 

    
    <!-- Mise en place de PAYPAL -->
</br>
    <div id="paypal-button"></div>

      <script>
        paypal.Button.render({
          env: 'production', // Or 'sandbox',

          commit: true, // Show a 'Pay Now' button

          style: {
            color: 'gold',
            size: 'small'
          },

          payment: function(data, actions) {
            /* 
             * Set up the payment here 
             */
          },

          onAuthorize: function(data, actions) {
            /* 
             * Execute the payment here 
             */
          },

          onCancel: function(data, actions) {
            /* 
             * Buyer cancelled the payment 
             */
          },

          onError: function(err) {
            /* 
             * An error occurred during the transaction 
             */
          }
        }, '#paypal-button');
      </script>

<?php   
        }else{
            
            echo "Votre panier est vide";
            ?>
            </br>
           <?php
        }
        
?>

</body>
</html>