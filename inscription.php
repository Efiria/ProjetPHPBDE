<!DOCTYPE html>


<html>

<body>
    <div id="corps">

    <div class="container">
            
            
            <section>               
                        <div id="register" class="animate form">
                            <form  method="post" action="scriptInscription.php" autocomplete="on"> 
                                <h2> Inscription </h2> 
                                
                                    <label for="usernamesignup" class="yourname" >Nom </label>
                                <p> 
                                    <input id="usernamesignup" name="nom" required="required" type="text"/>
                                </p>
 
                                    <label for="firstnamesignup" class="yourfirstname"  >Prenom </label>
                                <p>
                                    <input id="firstnamesignup" name="prenom" required="required" type="text"/>
                                </p>

                                    <label for="idsignup" class="yourid" >Identifiant </label>
                                <p>
                                    <input id="idsignup" name="identifiant" required="required" type="text"/>
                                </p>

                                    <label for="passwordsignup" class="yourpasswd"  >Mot de passe </label>
                                <p>
                                    <input id="passwordsignup" name="mdp" required="required" type="password"/>
                                </p>
 
                                    <label for="emailsignup" class="youremail"  >Adresse email </label>
                                <p>
                                    <input id="emailsignup" name="email" required="required" type="text"/>
                                </p>

                                    <label for="numerosignup" class="yournumero" >Numéro </label>
                                <p>
                                    <input id="numerosignup" name="numero" required="required" type="text"/>
                                </p>

                                <p class="signin button"> 
                                    <input type="submit" value="S'inscrire"/> 
                                </p>

                                <p class="change_link">  
                                    Déjà inscrit ?
                                    <a href="page_connexion.php"> Connexion </a>
                                </p>
                            </form>
                        </div>
                        
                    </div>
                </div>  
            </section>
        </div>

        
    </div>
</body>

</html>