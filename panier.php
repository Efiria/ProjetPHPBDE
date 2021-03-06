
<!DOCTYPE html>
<html>
<head>
		<script src="https://www.paypalobjects.com/api/checkout.js"> </script>
	<?php include 'includes/header.php'	?>
		
		<?php

		$bdd = new PDO('mysql:host=localhost; dbname=projet_test_bdd; charset=utf8', 'root','');

		$id_user = $_SESSION["ID"];
		
		if (isset($_GET['vider']))
		{
				$delete_p = $bdd->prepare("DELETE FROM commandes WHERE FK_Utilisateur = '$id_user' ");
				$delete_p -> execute();
				$_SESSION['panier'] = false;
		}
		
		if (isset($_GET["valider"])){
				//Envoi du mail
				$head = 'Commande de ';
				$message = "Bonjour veuillez contacter l'utilisateur pour finir sa commande";
				
				$user = $_SESSION['identifiant'];
				$requete_mail = $bdd->prepare('SELECT email FROM utilisateurs WHERE status = 1 ');
				$requete_mail -> execute();
				
				while($answer = $requete_mail->fetch()){
						mail($answer['email'], $head . $_SESSION['identifiant'], $message);
				}
			$delete_p = $bdd->prepare("DELETE FROM commandes WHERE FK_Utilisateur = '$id_user' ");
			$delete_p -> execute();
			$_SESSION['panier'] = false;		
		}
		
	?>
</head>
<body>
 
	<?php

		$products = $bdd->prepare("SELECT * FROM commandes WHERE '$id_user' = commandes.FK_Utilisateur ");
		$products -> execute();
								
		while($answer = $products->fetch()){
			echo $answer['NomProd'];
			?> </br> <?php
		}
		
		if($_SESSION['panier']){ ?> 

		<a href="panier.php?vider=1">Vider le panier</a> </br></br> 
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
				} ?>
	</body>
</html>