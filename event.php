<!DOCTYPE html>
	<html>

		<head>
			<?php include "includes/header.php"; ?>
		</head>
	<body>
		       <div class="containers">
                    <div id="AddEvent">
                    	<h2>Evènements</h2>
                    	 <p class="addButton"> 
     					</p>
                         <div class="row">
                            <?php

                            $bdd = new PDO('mysql:host=localhost; dbname=projet_test_bdd; charset=utf8', 'root','');

                            $events = $bdd->prepare('SELECT * FROM bai WHERE etat != "attente"');
                            $events -> execute();

                            while ($answer = $events->fetch()){
 
                                echo "<div class='col-xs-4 col-md-4'>"; ?>
                                <img src= <?php echo $answer['urlImage'] ?> , class='prodpic' height='100' lenght='100'/>
                                <div class='descri'>
                                    <label>Nom de l'évènement:</label> <?php echo $answer['nom_event']; ?>
                                </div>

                                <div class='descri'> 
                                    <label>Date:</label> <?php echo $answer['date_event']; ?> 
                                </div>

                                <div class='descri'> 
                                    <label>Description:</label> 
                                    <?php 
                                    $longueur = $answer['description'];

                                    if(strlen($longueur)>10){
                                       $longueur_0= substr($longueur,0,10).'...';

                                    }
                                    else{
                                        $longueur_0 = $longueur;
                                    }
                                    echo $longueur_0; 
                                    ?>      
                                </div>

                                <div class="col-md-1">
                                 <?php 

                                $requete = $bdd->prepare("SELECT FK_Event, FK_Utilisateur FROM publications WHERE FK_Utilisateur = :id_user AND FK_Event = :id_event");
                                $requete->bindValue(':id_event', $answer['ID'], PDO::PARAM_INT);
                                $requete->bindValue(':id_user', $_SESSION['ID'], PDO::PARAM_INT);
                                $requete->execute(); 

                                $requete_0 = $bdd->prepare("SELECT SUM(likes) AS NBCHECK FROM publications WHERE FK_Event = :id_event");
                                $requete_0->bindValue(':id_event', $answer['ID'], PDO::PARAM_INT);
                                $requete_0->execute() or die('pb insert'); 

                                $nbr_check = $requete_0->fetch(PDO::FETCH_ASSOC);
                                echo $nbr_check['NBCHECK'];
                                if ($liker = $requete->fetch()) { ?>
                                    <a href="incre_like.php?id= <?php echo $answer['ID'];?>"> <img src="img/thumbs-1.png" alt="Like"> </a>
                                <?php  } else { ?>
                                   <a href="incre_like.php?id= <?php echo $answer['ID'];?>"> <img src="img/thumbs-0.png" alt="Like"> </a>
                                <?php } ?>
                                </div>
                               
                                <?php if (isset($_SESSION['ID'])) { ?>
                                <div class="col-md-1">
                                    <a href="page_inscris.php?id= <?php echo $answer['ID'];?>"> <img src="img/report.png" alt="Boutton Inscription"> </a>
                                </div>
                                <?php } ?>
                                <div class="col-md-1">
                                    <img src="img/download-arrow.png" alt="Like">
                                </div>
                                <div class="col-md-1">
                                    <img src="img/settings.png" alt="Like">
                                </div>
                                </div> 
                                <?php
                            };?>
                        </div>
                    </div>
            </div>
	</body>

	<footer class="copyright-wrapper">
    <?php include("footer.php"); ?>
	</footer>


</html>



 
	