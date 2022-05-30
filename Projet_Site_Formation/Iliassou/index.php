 
<?php 
require_once './controller/controller.php';




if(isset($_GET['id']))
    {
        switch($_GET['id'])
        {
         case $_GET['id'] == "AjouterCours":
            {
              AjouterCours();
                         
            }                         
          break;
          case $_GET['id'] == "SuppressionCours":
            if(isset($_GET['idCours']) &&  $_GET['idCours'] >0)
            {
              SuppressionCours($_GET['idCours']) ;
                         
            }                         
          break;
          case $_GET['id'] == "Cours":
            if(isset($_GET['idCours']) &&  $_GET['idCours'] >0)
            {
              PageGenerale($_GET['idCours']);

            }             
          break;
          
           case $_GET['id'] == "modifNomChapitre":
              if(isset($_GET['idChapitre']) && $_GET['idChapitre']>0 )
              {
               modifNomChapitre($_GET['idChapitre'],$_GET['idCours']);            
              }             
            break;
                      
            case $_GET['id'] == "Suppression":
              if(isset($_GET['idChapitre']) && ($_GET['idChapitre']) > 0 )
              {
                SuppressionChap($_GET['idChapitre'],$_GET['idCours']);         
              }             
            break;

            case $_GET['id'] == "AjouterChapitre":
              if(isset($_GET['idCours']) && ($_GET['idCours']) > 0  )
              {
                AjouterChapitre($_GET['idCours']);          
              }             
            break;
            
            case $_GET['id'] == "AjoutContenu":
              if(isset($_GET['idChapitre']) && ($_GET['idChapitre']) > 0  )
              {
                AjoutContenu($_GET['idChapitre'], $_GET['idCours']);   
                  
              } 

            break;

            case $_GET['id'] == "AjouterForum":
              if(isset($_GET['idCours']) && ($_GET['idCours']) > 0  )
              {
                AjouterForum($_GET['idCours']);   
                  
              } 

            break;

            default:
              echo "vide";
              
              break;
            

       }
    }


else
{

  AffichageAccueilCours();           
               
  
}

?>



