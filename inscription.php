<!DOCTYPE html>


<html>

<body>
    <div id="corps">

    <div class="container">
            
            
            <section>               
                        <div id="register" class="animate form">
                            <form  method="post" action="scriptInscription.php" autocomplete="on"> 
                                <h1> Inscription </h1> 
                                <p> 
                                    <label for="usernamesignup" class="yourname" data-icon="u" >Nom : </label>
                                    <input id="usernamesignup" name="nom" required="required" type="text" placeholder="nom" />
                                </p>

                                <p> 
                                    <label for="passwordsignup" class="yourpasswd" data-icon="p" >Mot de passe : </label>
                                    <input id="passwordsignup" name="mdp" required="required" type="password" placeholder="mot de passe"/>
                                </p>

                                 <!--<p> 
                                    <label for="emailsignup" class="youremail" data-icon="p" >Adresse email : </label>
                                    <input id="emailsignup" name="email" required="required" type="text" placeholder="adresse email"/>
                                </p>

                                <p> 
                                    <label for="numerosignup" class="yournumero" data-icon="p" >Numéro de téléphone : </label>
                                    <input id="numerosignup" name="numero" required="required" type="text" placeholder="numéro de téléphone"/>
                                </p> -->
                                
                                <p class="signin button"> 
                                    <input type="submit" value="S'inscrire"/> 
                                </p>
                                <p class="change_link">  
                                    Déjà inscrit ?
                                    <a href="#tologin" class="to_register"> Connexion </a>
                                </p>
                            </form>
                        </div>
                        
                    </div>
                </div>  
            </section>
        </div>

        
    </div>
</body>

<footer>
    <?php include("footer.php"); ?>
</footer>

</html>