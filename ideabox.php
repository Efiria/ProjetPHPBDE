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
                    		<a href="addEvent.php"> <button>Proposer</button></a> 
     					</p>
                         <div class="row">
                            <?php

                            $bdd = new PDO('mysql:host=localhost; dbname=projet_test_bdd; charset=utf8', 'root','');

                            $events = $bdd->prepare('SELECT * FROM bai');
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
                                    <label>Description:</label>  <?php echo $answer['description']; ?>      
                                </div>

                                <div class="col-md-2">
                                    <img src="img/thumb-up.png" onClick=changeimg(this) alt="Like" >
                                </div>
                                <div class="col-md-2">
                                    <img src="img/download.png" alt="Like">
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
 
            if( ancimage.substring(ancimage.lastIndexOf("/"), ancimage.length) == "/thumb-up.png"){
                myImage.src= ancimage.substring(0,ancimage.lastIndexOf("/"), ancimage.length)+"/like.png";
 
             } 
             else{
                myImage.src= ancimage.substring(0,ancimage.lastIndexOf("/"), ancimage.length)+"/thumb-up.png";
 
 
             }
        }

    /*
    $("#image").click(function(){
    if($(this).attr("src")) == "img/thumb-up.png")
    $(this).attr("src") = "img/thumb-up-button(1).png";
    else
    $(this).attr("src") = "img/thumb-up.png";
    });*/
</script>

</html>



 
	