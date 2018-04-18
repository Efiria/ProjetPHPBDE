<!DOCTYPE html>
	<html>

		<head>
			<?php include "includes/header.php"; ?>
            <script type="text/javascript" src="js_valider.js"></script>
            <script type="text/javascript" src="jquery-3.3.1.js"></script>
		</head>
	<body>
		       <div class="containers">
                    <div id="AddEvent">
                    	<h2>Evènements à venir</h2>
                         <div class="row">
                            <?php

                            $bdd = new PDO('mysql:host=localhost; dbname=projet_test_bdd; charset=utf8', 'root','');
                            
                            $date = date('Y-m-d');
                            $events = $bdd->prepare("SELECT * FROM bai WHERE etat != 'attente' AND date_event > '$date'");
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
                               <div class="features">
                                    <span>
                                     <?php 

                                        $requete = $bdd->prepare("SELECT FK_Event, FK_Utilisateur FROM publications WHERE FK_Utilisateur = :id_user AND FK_Event = :id_event");
                                        $requete->bindValue(':id_event', $answer['ID'], PDO::PARAM_INT);
                                        $requete->bindValue(':id_user', $_SESSION['ID'], PDO::PARAM_INT);
                                        $requete->execute(); 

                                        $requete_0 = $bdd->prepare("SELECT SUM(likes) AS NBCHECK FROM publications WHERE FK_Event = :id_event");
                                        $requete_0->bindValue(':id_event', $answer['ID'], PDO::PARAM_INT);
                                        $requete_0->execute() or die('pb insert'); 
                                        $nbr_check = $requete_0->fetch(PDO::FETCH_ASSOC); ?>

                                       <span class="nbr_like"> <?php echo $nbr_check['NBCHECK']; ?> likes</span>
                                       <?php if ($liker = $requete->fetch()) { ?>
                                            <a href="incre_like.php?id= <?php echo $answer['ID'];?>"> <img src="img/thumbs-1.png" alt="Like"> </a>
                                        <?php  } else { ?>
                                           <a href="incre_like.php?id= <?php echo $answer['ID'];?>"> <img src="img/thumbs-0.png" alt="Like"> </a>
                                        <?php } ?>
                                    </span>

                                  <?php if (isset($_SESSION['ID'])) { ?>
                                    <span>
                                        <?php   

                                        $requete = $bdd->prepare("SELECT FK_Event, FK_Utilisateur FROM inscrits WHERE FK_Utilisateur = :id_user AND FK_Event = :id_event");
                                        $requete->bindValue(':id_event', $answer['ID'], PDO::PARAM_INT);
                                        $requete->bindValue(':id_user', $_SESSION['ID'], PDO::PARAM_INT);
                                        $requete->execute(); 

                                         if ($inscri = $requete->fetch()) { ?>
                                            <a href="page_inscris.php?id= <?php echo $answer['ID'];?>"> <img src="img/report(1).png" alt="Like"> </a>
                                        <?php  } else { ?>
                                           <a href="page_inscris.php?id= <?php echo $answer['ID'];?>"> <img src="img/report.png" alt="Like"> </a>
                                        <?php } ?>
                                    </span>
                                    <?php } ?>
                                    <span>
                                        <img src="img/download-arrow.png" alt="Like" >
                                    </span>
                                    <span>
                                        <img src="img/settings.png" alt="Like">
                                    </span>
                                </div>
                                </div> 
                                <?php
                                    $compare = $answer['date_event'];
                            };?>
                        </div>
                    </div>

                    <div class="containers">
                    <div id="AddEvent">
                        <h2>Evènements passées</h2>
                         <div class="row">
                            <?php

                            $bdd = new PDO('mysql:host=localhost; dbname=projet_test_bdd; charset=utf8', 'root','');

                            $events = $bdd->prepare("SELECT * FROM bai WHERE etat != 'attente' AND date_event < '$date'");
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
                                <div class="features">
                                <span>
                                 <?php 

                                    $requete = $bdd->prepare("SELECT FK_Event, FK_Utilisateur FROM publications WHERE FK_Utilisateur = :id_user AND FK_Event = :id_event");
                                    $requete->bindValue(':id_event', $answer['ID'], PDO::PARAM_INT);
                                    $requete->bindValue(':id_user', $_SESSION['ID'], PDO::PARAM_INT);
                                    $requete->execute(); 

                                    $requete_0 = $bdd->prepare("SELECT SUM(likes) AS NBCHECK FROM publications WHERE FK_Event = :id_event");
                                    $requete_0->bindValue(':id_event', $answer['ID'], PDO::PARAM_INT);
                                    $requete_0->execute() or die('pb insert'); 

                                    $nbr_check = $requete_0->fetch(PDO::FETCH_ASSOC);?>
                                   <span class="nbr_like"> <?php echo $nbr_check['NBCHECK']; ?> likes</span>
                                   <?php if ($liker = $requete->fetch()) { ?>
                                        <a href="incre_like.php?id= <?php echo $answer['ID'];?>"> <img src="img/thumbs-1.png" alt="Like"> </a>
                                    <?php  } else { ?>
                                       <a href="incre_like.php?id= <?php echo $answer['ID'];?>"> <img src="img/thumbs-0.png" alt="Like"> </a>
                                    <?php } ?>
                                </span>
                               
                                <?php if (isset($_SESSION['ID'])) { ?>
                                <span>
                                    <?php   
                                        $requete = $bdd->prepare("SELECT FK_Event, FK_Utilisateur FROM inscrits WHERE FK_Utilisateur = :id_user AND FK_Event = :id_event");
                                        $requete->bindValue(':id_event', $answer['ID'], PDO::PARAM_INT);
                                        $requete->bindValue(':id_user', $_SESSION['ID'], PDO::PARAM_INT);
                                        $requete->execute(); 

                                         if ($inscri = $requete->fetch()) { ?>
                                            <a href="page_inscris.php?id= <?php echo $answer['ID'];?>"> <img src="img/report(1).png" alt="Like"> </a>
                                        <?php  } else { ?>
                                           <a href="page_inscris.php?id= <?php echo $answer['ID'];?>"> <img src="img/report.png" alt="Like"> </a>
                                        <?php } ?>
                                </span>
                                <?php } ?>
                                <span>
                                    <img src="img/download-arrow.png" alt="Like" >
                                </span>
                                <span>
                                    <img src="img/settings.png" alt="Like">
                                </span>
                                </div>
                                </div> 
                                <?php
                            };?>
                        </div>
                 </div>
	</body>

	<footer class="copyright-wrapper">
    <?php include("footer.php"); ?>
	</footer>


</html>



 
	