<?php session_start(); ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<title>Site BDE</title>

<header>
	<div class="containers">
		<div id="logo" class=" row">
			<div class=" col-xs-4 col-md-3">
				<img src="img/logocesi.png" alt="logo Cesi">
			</div>
			<div id="titre" class="col-xs-4 col-md-6">
				<h1>Bureau des etudiants</h1>
			</div>
			<div id="logo" class="col-xs-4 col-md-3">
				<img src="img/logocesi.png" alt="logo Cesi">
			</div>
		</div>
			<nav id="select"> 
				<a href="index.php">Accueil</a>
				<a href="ideabox.php">Boite a idees</a>
				<a href="shop.php">Boutique</a>
				<?php if(!isset($_SESSION['connecte'])){ ?>
					<a href="page_connexion.php" title="Se connecter">Connexion</a>
				<?php }else{ ?>
					<a href="page_deconnexion.php" title="Se deconnecter">Deconnexion</a>
				<?php } ?>
			</nav>
	</div>
</header>