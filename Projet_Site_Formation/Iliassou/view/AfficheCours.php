<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="./Style/cours.css?ts=<?=time()?>" />

</head>

<body>
<header> 
    <?php
        require_once './view/Entete.php';
    ?>
</header>



<span> 
     <a href="index.php?id=AjouterCours"><input class="dim" type="button" value="Ajouter un cours" /></a>
</span>


<h1> Liste cours </h1>

<section>
    <?php  foreach($affichageListe as $env) :?>

    <div id="disposition"> 
        <p>
          <a id="link" href="index.php?id=Cours&idCours=<?=$env['idCours'] ?>">
            <img class="imCours" src="./Image/<?= $env['img']?>" >
            <?=$env['nom'] ?>
          </a>
        </p>
        <div>
          <a id="link1" href="index.php?id=SuppressionCours&idCours=<?=$env['idCours'] ?>">
            <input class="dim" type="button" value="Supprimer"/>
          </a>
          
        </div>
    </div>

    <?php endforeach ; ?>

 </section>

<footer>
 <?php   echo '<center> MET LE LIEN DU PIED DU COUR  DANS CETTE ZONE  </center>' ;

for ($i=0; $i <2; $i++) { 
    echo " <br>" ;
}
?>
</footer>

 </body>
</html>