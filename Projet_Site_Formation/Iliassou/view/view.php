<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="./Style/view.css?ts=<?=time()?>" />
<script  src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/fichierAjout.js"></script>
<title></title>
</head>

<body>
<header> 
    <?php
        require_once './view/Entete.php';
    ?>
</header>

<section>

 <div  class="A"> 
            <div class="zone1">
              <h3 class="zoneTete"> Cours : <a class="black"> <?= $mescours['nom'] ; ?> </a></h3>
                 <p><ul><li><?= $mescours['descript'] ; ?> </li></ul>  </p>
                   <p class="imageText"> 
                    <a href="#basPage" class="lienCol">      
                      <img class="PhotoForum" src="./Image/ForumImage.png"  >
                      Accès rapide au Forum                
                     </a>
                    
                </p>
            </div>

        <?php if(isset($test)):  ?>
          <div  class="zone2">
                <h1 class="zoneTete1">Liste des Chapitres </h1>
               <div > 
                   <?php foreach($test as $affic ): ?>
                        <?php $x= AfficherListeContenu($affic['idChapitre']) ?>
                        <div class="">
                                <p> <h3><?= $affic['nomChapitre'] ?></h3></p>
                                <?php while($essai = $x->fetch()) : ?>
                                    <ul>
                                        <li>
                                            <p class="pdfText">
                                                <a href="./Image/<?= $essai['fichier'] ?>"> 
                                                    <img class="PhotoPdf" src="./Image/pdfImage.png" alt="">      
                                                    <?= $essai['fichier'] ?> 
                                                </a>
                                            </p>
                                            <ul>
                                            <li > <p class="specifier"><?=$essai['typeFichier']?></p> </li></ul>
                                        </li>
                                    </ul>
                                <?php endwhile ?>
                             <!-- la partie pour masquer les boutons de modification pour la vue d'un Etudiant-->   
                            <?php /* if(isset($_SESSION['Enseignant']): */ ?>
                                    <div class="alignement">      
                                        <a href="index.php?id=AjoutContenu&idChapitre=<?=$affic['idChapitre']?>&idCours=<?=$mescours['idCours']?>"><input class="btn" type="button" value="Ajouter du Contenu" ></a>
                                        <a href="index.php?id=modifNomChapitre&idChapitre=<?=$affic['idChapitre']?>&idCours=<?=$mescours['idCours']?>"><input class="btn" type="button" value="Modifier" ></a>
                                        <a href="index.php?id=Suppression&idChapitre=<?=$affic['idChapitre']?>&idCours=<?=$mescours['idCours']?>"> <input class="btn" type="button" value="Supprimer" > </a>
                                    </div>  
                            <?php /* endif; */ ?> 
                    <hr>    
                </div>

                <?php endforeach ;?>
            </div>            
          </div>
        <?php endif;  ?>

  

        <div  class="zone3" id="basPage">
                <h3 class="zoneTete">Forum du cours </h3>        
                <?php foreach($monForum as $forum): ?>
                    <p class="supForum"> 
                      

                    </p>
                    <hr>
                <?php endforeach ;?>
        </div>
    </div>  
    
    <?php if(isset($test)):  ?>
        <div class="zoneDroite">
      
           <fieldset>
           <legend class="zoneTete2"> Boite à outils </legend> 
            <!-- la partie pour masquer les boutons de modification pour la vue d'un Etudiant-->
            <?php /* if(isset($_SESSION['connected'] and $_SESSION['idEnseignant']): */ ?> 
           <div class="bottom"> 
              <a href="index.php?id=AjouterChapitre&idCours=<?=$mescours['idCours']?>"><input class="btn" type="button" value="Ajouter un Chapitre"></a></h4>
              <a href="index.php?id=AjouterForum&idCours=<?=$mescours['idCours']?>"><input class="btn" type="button" value="Ajouter un Forum"></a></h4>
            </div>
            </fieldset>
       
        <?php /* endif; */ ?> 
        </div>
    <?php endif ;?>
    

     

</section>


<footer >

<?php   echo '<center> MET LE LIEN DU PIED DU COUR  DANS CETTE ZONE  </center>' ;

    for ($i=0; $i <2; $i++) { 
        echo " <br>" ;
    }
?>

     
</footer>




</body>
</html>