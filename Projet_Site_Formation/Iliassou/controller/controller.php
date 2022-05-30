<?php
require_once  './model/model.php'; 


//la fonction qui permet de verifier et gerer les rentrées de mes insertions ds le formulaire
function verif($donnee)
	{
		$donnee=trim($donnee);
		$donnee=stripslashes($donnee);
		$donnee=htmlspecialchars($donnee);

		return $donnee;
	}

//la fonction qui nous permet d'ajouter un cours 


function AjouterCours()
{
    $nomCours=$description=$profil=$profil2="";

    if ($_SERVER["REQUEST_METHOD"]=="POST") 
    {
        if(empty($_POST['nom']))
         { 
             echo " ecrire  le nom pour un cours " ;
        }
        else
         {  
            $nomCours=verif($_POST['nom']) ; 
         }

         if(empty($_POST['descript']))
         { 
             echo " ecrire  le nom pour un cours " ;
            }
         else
         {  
             $description=verif($_POST['descript']) ;
         }


        //if(empty($_POST['img']))

        if(!(isset($_FILES['img']) AND $_FILES['img']['error'] == 0))

         {
               $profil2="CourDefaut.png" ;
               creerCours($nomCours,$description,$profil2);
              // echo "echec" ;
         }
         else
          {  
 
             $fromm=$_FILES['img']['tmp_name'] ;
             $toooo="./Image/".$_FILES['img']['name'] ;
             $emplac=$_FILES['img']['name'];
             move_uploaded_file($fromm,$toooo);  
             $profil=$emplac;
             creerCours($nomCours,$description,$profil);   

          }
                
         header("Location: index.php?");

    }

    require_once './view/AjouterUnCour.php';



}

//la Fonction qui nous permet d'ajouter un chapitre .
function AjouterChapitre($idCours)
{
   
    if ($_SERVER["REQUEST_METHOD"]=="POST") 
    {
        $nomInsert="";


            if(empty($_POST['nomChapitre']))
            {
                echo " ecrire  le nom d'un chapitre";

            }
            else
            {
                $nomInsert=verif($_POST['nomChapitre']) ;
                creeChapitre($idCours,$nomInsert);   
                header("Location: index.php?id=Cours&idCours=$idCours");

            }
        }  
        require_once './view/formulaireAjoutChapitre.php';


}

function AjouterForum($idCours)
{

    if ($_SERVER["REQUEST_METHOD"]=="POST") 
    {
        $nomInsert="";


            if(empty($_POST['Titre']))
            {
                echo " ecrire  le nom du forum";

            }
            else
            {
                $nomInsert=verif($_POST['Titre']) ;
                CreeForum($idCours,$nomInsert) ;  
                
                header("Location: index.php?id=Cours&idCours=$idCours");

            }
     }  
        require_once './view/formulaireAjouterForum.php';



}

        



//La fonction qui nous permet d'ajouter un contenu
function AjoutContenu($idChapitre, $idCours)
{
       
    $idInsersion=$typeFile="";

    if ($_SERVER["REQUEST_METHOD"]=="POST") 
    {

        if(empty(isset($_FILES)))

        {
                
            echo "il faut parcourir le fichier" ;
        }
        else
         {  

            $fromm=$_FILES['fichier']['tmp_name'] ;

            $toooo="./Image/".$_FILES['fichier']['name'] ;

            $emplac=$_FILES['fichier']['name'];
            move_uploaded_file($fromm,$toooo); 
            
            
            $contenuChapitre=$emplac;
        }


        if(empty($_POST['typeFichier']))    
        {
            echo "Inserer un commentaire " ;

        }
        else 
        {
           $typeFile=verif($_POST['typeFichier']) ; 
           creerContenu($idChapitre,$contenuChapitre,$typeFile);
           header("Location: index.php?id=Cours&idCours=$idCours");
                  
        }
        
    }
   require_once './view/formulaireAjoutContenu.php';
}


//la fonction pour les afficher les cours sous forme de liste .
function PageGenerale($page)
{
   
    $test=AfficherPageCours($page);
    $mescours=AfficherListeCours($page); 
    $monForum=AfficheForum($page) ;
 
    require_once './view/view.php';

}

function AffichageAccueilCours()
{
    $affichageListe=Cours();
   
   require_once './view/AfficheCours.php';
}  




//la fonction où je fais appel à la  fonction modifier nom d'un chapitre dans le model

function modifNomChapitre($idCha,$idCours)
{
   if ($_SERVER["REQUEST_METHOD"]=="POST") 
    {
        $nom="" ;

        if(empty($_POST['nomChapitre']))
        {
            echo "le champ  du nouveau chapitre est vide ";

        }
        else
        {
            $nom=verif($_POST['nomChapitre']);  
            $effecModif= ModifierNomChap($nom,$idCha);
            header("Location: index.php?id=Cours&idCours=$idCours");    
        }  
    }
    require './view/ModifierNomChapitre.php';

}


//la fonction où je fais appel à la  fonction supprimer dans le model
function SuppressionChap($idChap,$idCours)
{   
    supprimerChapitre($idChap) ;
    header("Location: index.php?id=Cours&idCours=$idCours");
}



function SuppressionCours($idCours)
{
    SupprimerCours($idCours);
    header("Location: index.php?");

}

?>





<?php








/*

function AffChap()
{
    $chap=AfficherListeChapitre();
   require_once './view/view.php';


} 


function AffContenu($idChapitre)
{
   $content=AfficherListeContenu($idChapitre);   
   //AfficherListeContenu($idChap)
   require_once './view/view.php';

} 




function AffichageBoiteOutils($idCours,$idChapitre)
{
    $envoiA=AjoutAffichage($idCours,$idChapitre);

    require_once './view/view.php';

}

*/


/*
function affiche()
 {  
   
    if ($_SERVER["REQUEST_METHOD"]=="POST") 
    {

    

            if(empty($_POST['titre']))
            {
                echo "le champ  du titre est vide ";

            }
            else
            {
                $titre=verif($_POST['titre']) ;
            
            }

            if(empty($_POST['tagListe']))
            {
                echo "le champ du tag est vide ";

            }
            else
            {
                $tag=verif($_POST['tagListe']) ;
            
            }
            
            
            if(empty($_POST['document']))
            {
                echo "le du cocument est vide ";

            }
            else
            {
                $document=verif($_POST['document']) ;
            }

            if(empty(isset($_FILES)))

            {
                    
                echo "il faut ajouter quelque chose" ;
            }
            else
             {  
                echo "<pre>"; 

                $from=$_FILES['descript']['tmp_name'] ;

                $to="../Image/".$_FILES['descript']['name'] ;

                $emplacement=$_FILES['descript']['name'];
                echo $emplacement ;
                move_uploaded_file($from,$to); 
                
                $descript=$emplacement;

                echo "</pre>";

            }


            if(empty($_POST['img']))
            { echo "le champ de l'image est vide ";  }
            else
            {  $img =verif($_POST['img']) ;  
            }

            

            $essai=Insert($titre,$tag,$document,$descript,$img); 
           
            //print_r($essai);
    } 
    
}   
*/

/*
function reaffichage()
{
  
   
    $titre=verif($_POST['titre']);
    $tag=verif($_POST['tagListe']) ;
    $document=verif($_POST['document']) ;
    $descript =verif($_POST['descript']) ;
    $img =verif($_POST['img']) ;
    
    $cours=AfficherCours($titre,$tag,$document,$descript,$img); 
    //compact('cours');
   //extract($cours);
   var_dump($cours);

   require_once '../view/view.php';

} */
/*

function Reverifions()
{
    $verification=AfficherBD();
    print_r($verification);
    require_once '../view/view.php';

}
*/
/*
function testCreationCours()
{
    $descript=$imgC=$courscree=$emplacements="";

    if ($_SERVER["REQUEST_METHOD"]=="POST") 
    {

    
    

            if(empty($_POST['nom']))
            {
                echo "le champ  du nomCours est vide ";

            }
            else
            {
                $courscree=verif($_POST['nom']) ;
            
            }
            if(empty($_POST['descript']))
            {
                echo "le champ  de la descript est vide ";

            }
            else
            {
                $descript=verif($_POST['descript']) ;
            
            }

            if(empty(isset($_FILES)))

            {
                    
                echo "il faut parcourir le fichier" ;
            }
            else
             {  
        
                $debut=$_FILES['img']['tmp_name'] ;
        
                $arrive="./Image/".$_FILES['img']['name'] ;
        
                $emplacements=$_FILES['img']['name'];
                //echo $emplacements ;
                move_uploaded_file($debut,$arrive); 
                
                $imgC=$emplacements;
    
             }   



        CreerCour($courscree, $descript,$imgC) ;
        require_once './view/view.php';     
    

    }       

}

*/
?>

