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
                                    <img src="img/thumbs-0.png" onClick=changelike(this) alt="Like" >
                                </div>
                                <div class="col-md-1">
                                    <img src="img/report.png" alt="Like">
                                </div>
                                <div class="col-md-1">
                                    <img src="img/download-arrow.png" onClick=changeimg(this) alt="Like" >
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

  <script type="text/javascript">


function changeimg(myImage) {
 
            var ancimage = myImage.src;
 
            if( ancimage.substring(ancimage.lastIndexOf("/"), ancimage.length) == "/thumbs-0.png"){
                myImage.src= ancimage.substring(0,ancimage.lastIndexOf("/"), ancimage.length)+"/thumbs-1.png";
 
             } 
             else{
                myImage.src= ancimage.substring(0,ancimage.lastIndexOf("/"), ancimage.length)+"/thumbs-0.png";
 
 
             }
        }
</script>

</html>



 
	