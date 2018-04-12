<!DOCTYPE html>
	<html>
		<head>
			<?php include "includes/header.php"; ?>
		</head>
	<body>
		<div class="animate form">
			<form  method="post" action="scriptIdeabox.php" autocomplete="on">
                <p><label for="add_categorie" class="your_categorie">Categorie :</label></p>
				<p>
					<input id="add_categorie" name="categorie" required="required" type="radio" value="Manifestation"/>Manifestation<br>
					<input id="add_categorie" name="categorie" required="required" type="radio" value="Idee"/>Idee<br>
				</p>

				<p><label for="add_eventdate" class="your_eventdate">Date :</label></p>
				<p><input id="add_eventdate" name="eventdate" required="required" type="text" placeholder="Date"/></p>

				<p><label for="add_description" class="your_description">Description :</label></p>
				<p><textarea id="add_description" name="description" required="required" cols="100" rows="20" placeholder="Decrivez votre proposition..."></textarea></p>
                <p class="submit button"> 
                    <input type="submit" value="Envoyer"/> 
                </p>
            </form>
		</div>
	</body>

<footer class="copyright-wrapper">
    <?php include("footer.php"); ?>
</footer>
</html>