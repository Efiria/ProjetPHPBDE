<!DOCTYPE html>

<?php $count = 0; ?>

<html>

    <head>
        <?php include "includes/header.php"; ?>
        <script type="text/javascript" src="js_valider.js"></script>
        <script type="text/javascript" src="jquery-3.3.1.js"></script>
    </head>

    <body class="index">
            </nav>
            <div class= "containers"> 
                     <div class="row">
                        <div class= " col-xs-6 col-md-9">
                            <div id="presentation">
                                <h2> Présentation</h2>
                                    <p> 
                                        Les étudiants de l’exia.CESI exposent leurs talents personnels au travers de la vie associative de leur école. C’est l’occasion pour eux de développer des compétences de gestion de projet, de leadership en dehors du cadre des études.
                                    </p> 
                                    <p>
                                        Les étudiants de l’exia.CESI gèrent eux-mêmes leurs associations ou clubs. Pour l’école d’ingénieurs, expérience associative est un véritable terrain d’apprentissage et de développement des compétences applicables à la vie professionnelle. Initiative, responsabilité, négociation, créativité, innovation : au travers de leurs propres centres d’intérêts et de leurs propres projets, les étudiants expérimentent réellement ces aptitudes.
                                    </p>
                                    <p>
                                        Exia Sports : propose des après-midis « sport et découverte » aux différents étudiants du campus. Durant l’année, sont pratiqués des sports comme le rugby, le foot en salle, la natation, la plongée, le badminton, le tennis, les art-martiaux…
                                    </p>
                                    <p>
                                       Exia Jeux : pour tous les adeptes des jeux de société, vous pouvez maintenant faire marcher vos méninges le jeudi après-midi. Préparez-vous à trouver un mot en 15 lettres avec un x, z et triple e… ou encore le meurtrier du manoir Tudor…
                                    </p>
                                    <p>
                                       Association Exia Casino : tous les coups et tous les jeux sont permis (jeux de cartes, belote, black jack, tarot, tournois de Poker…).
                                    </p>
                                    <p>
                                     Exia Culture : musée, ciné et culture à volonté !
                                    </p>
                                    <p>
                                     Exia Musique : répéter ses gammes avec l’association Exia Musique pour ensuite jouer lors des différents événements de l’école.
                                    </p>
                            </div>
                     </div>
                          <div class="col-xs-6 col-md-3">
                             <div id="image">
                                 <h2> Image </h2>
                                 <img src="img/photo-gagnante.jpg" alt="Etudiant du CESI">
                            </div>      
                    </div>
                </div>             
            </div>

            <div class="containers">
                    <div id="events">
                        <h2>Evènements</h2>
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
                                         if (isset($_SESSION['ID'])) {
                                            $requete = $bdd->prepare("SELECT FK_Event, FK_Utilisateur FROM publications WHERE FK_Utilisateur = :id_user AND FK_Event = :id_event");
                                            $requete->bindValue(':id_event', $answer['ID'], PDO::PARAM_INT);
                                            $requete->bindValue(':id_user', $_SESSION['ID'], PDO::PARAM_INT);
                                            $requete->execute(); 
                                        }
                                            $requete_0 = $bdd->prepare("SELECT SUM(likes) AS NBCHECK FROM publications WHERE FK_Event = :id_event");
                                            $requete_0->bindValue(':id_event', $answer['ID'], PDO::PARAM_INT);
                                            $requete_0->execute() or die('pb insert'); 
                                            $nbr_check = $requete_0->fetch(PDO::FETCH_ASSOC); ?>

                                           <span class="nbr_like"> <?php echo $nbr_check['NBCHECK']; ?> likes</span>
                                        <?php if (isset($_SESSION['ID'])) {
                                            if ($liker = $requete->fetch()) { ?>
                                                <a href="incre_like.php?id= <?php echo $answer['ID'];?>"> <img src="img/thumbs-1.png" alt="Like"> </a>
                                            <?php  } else { ?>
                                               <a href="incre_like.php?id= <?php echo $answer['ID'];?>"> <img src="img/thumbs-0.png" alt="Like"> </a>
                                            <?php } 
                                            }else{
                                              ?> <img src="img/thumbs-0.png" alt="Like" title="Connectez vous pour aimer cet évènement"> <?php
                                            } ?>
                                        </span>

                                      <?php if (isset($_SESSION['ID'])) { ?>
                                        <span>
                                            <?php   
                                            $requete = $bdd->prepare("SELECT FK_Event, FK_Utilisateur FROM inscrits WHERE FK_Utilisateur = :id_user AND FK_Event = :id_event");
                                            $requete->bindValue(':id_event', $answer['ID'], PDO::PARAM_INT);
                                            $requete->bindValue(':id_user', $_SESSION['ID'], PDO::PARAM_INT);
                                            $requete->execute(); 

                                             if ($inscri = $requete->fetch()) { ?>
                                                <a href="page_inscris.php?id= <?php echo $answer['ID'];?>"> <img src="img/report(1).png" alt="Like" title="Se désinscrire"> </a>
                                            <?php  } else { ?>
                                               <a href="page_inscris.php?id= <?php echo $answer['ID'];?>"> <img src="img/report.png" alt="Like" title="S'inscrire"> </a>
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
                                    $count += 1; 

                                    if ($count == 3) {
                                        break;
                                    }
                            };?>
                            <p class="seemore">
                                <a href="event.php"> <button>Voir Plus</button></a> 
                            </p>

                    <?php $count=0; ?>
                    <div id="article">
                        <h2>Articles recommandées</h2>
                         <div class="row">
                                <?php
                                    $bdd = new PDO('mysql:host=localhost; dbname=projet_test_bdd; charset=utf8', 'root','');
                                    $products = $bdd->prepare('SELECT * FROM produits ORDER BY achat DESC');
                                    $products -> execute();
                                        while ($answer = $products->fetch()){
                                        ?>
                                        <div class='col-xs-4 col-md-4'>
                                            <img src= <?php echo $answer['urlImage'] ?> , class='prodpic' height='100' lenght='100'/>
                                            <div class='prix'>
                                                <label>Prix:</label> <?php echo $answer['prix']; ?> €
                                            </div>
                                            <div class='descri'> 
                                                <label>Description:</label> <?php echo $answer['description']; ?> 
                                            </div>
                                            <div class='stock'> 
                                                <label>Stock:</label>  <?php echo $answer['stock']; ?>      
                                            </div> 
                                            </div>                      
                                        <?php
                                        $count += 1; 
                                        if ($count == 3) {
                                            $count =0;
                                                break;
                                        }
                                };?> 
                        </div>
                        <p class="seemore">
                             <a href="shop.php"> <button>Commander</button></a> 
                        </p>
                    </div>
            </div>
    </body>

    <footer class="copyright-wrapper">
        <?php include("footer.php"); ?>
    </footer>
</html>