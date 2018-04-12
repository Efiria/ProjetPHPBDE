<!DOCTYPE html>
	<html>
		<head>
			<?php include "includes/header.php"; ?>
		</head>
	<body>
		<div id="corps">
	        <div class="container">   
		        <section>  
					<div id="container" >
						<div id="wrapper">
							<div class="animate form">
								<form  method="post" action="scriptIdeabox.php" autocomplete="on">
									
					                <p><label for="add_categorie" class="your_event">Nom de l'évènement :</label></p>
									<p>
										<input id="add_categorie" name="nom_event" required="required" type="text"/> 
									</p>
									

									<p><label for="add_eventdate" class="your_date_event">Date :</label></p>
									<p><input id="add_eventdate" name="date_event" required="required" type="text" placeholder="YYYY-MM-DD"/></p>

									<p><label for="add_description" class="your_description">Description :</label></p>
									<p><textarea id="add_description" name="description" required="required" cols="100" rows="20"></textarea></p>

										<div class="animate form">
		              					 	 <p id="test">
												<input type="submit" value="Poster" onclick="myFunction()"/>
		               					 	 </p>
										</div>
					            </form>
							</div>
						</div>
					</div>
				</section>
	        </div>
    	</div>
	</body>

<footer class="copyright-wrapper">
    <?php include("footer.php"); ?>
</footer>

<script>
function myFunction() {
	var session='<?PHP echo $_SESSION['status'];?>';
	if(session=true)
	{
		var answer = "<?php require('scriptIdeabox.php')?>";
		alert(answer);
   
	}
}

</script>

</html>