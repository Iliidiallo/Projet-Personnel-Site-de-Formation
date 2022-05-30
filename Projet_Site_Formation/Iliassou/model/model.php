<?php
  
  function BDConnection()
  {
      try
      {
          $db= new PDO('mysql:host=localhost;dbname=Connection;charset=utf8', 'root','Iliassou2022@');

  
          return $db;
      }
      catch(Exception $e)
      {
          die("Erreur : ".$e->getMessage());
      }
  }

//Fonction pour créer un cours 

function creerCours($nom,$description,$imge)
{
  $db=BDConnection();
  $chap=$db->prepare("INSERT INTO Cours (nom,descript,img) VALUES (?,?,?)");
  $chap->execute([$nom,$description,$imge]);

}

//Fonction pour créer un chapitre
function creeChapitre($id_cours,$titre_Chapitre)
{
  $db=BDConnection();
  $chap=$db->prepare("INSERT INTO Chapitre (idCours,nomChapitre ) VALUES (?,?)");
  $chap->execute([$id_cours,$titre_Chapitre]);


}
//Fonction pour créer un forum
function CreeForum($idChap,$nom)
{
  $db=BDConnection();
  $chap=$db->prepare("INSERT INTO Forum (idCours,titre,DateCreationForum) VALUES (?,?,NOW())");
  $chap->execute([$idChap,$nom]);

}


//la fonction qui crée du contenu pour un chapitre donné 
function creerContenu($idchapitre,$fichiers,$typeF)
{  
  $db=BDConnection();
  $contenu=$db->prepare("INSERT INTO Contenu (idChapitre,fichier,typeFichier) VALUES (?,?,?)" );
  $contenu->execute([$idchapitre,$fichiers,$typeF]);

}


//la fonction qui permet d'afficher un cour bien determiné .

function AfficherPageCours($idcours)
{
    $db=BDConnection() ;
    $pageC=$db->prepare("SELECT * FROM Chapitre WHERE idCours=?" ) ;
    
    $pageC->execute([$idcours]);

    return $pageC ;

  }



 //Fonction afficher la liste des  cours en connaissant son id
function AfficherListeCours($identif)
{
 
  $db=BDConnection() ;
  $res=$db->prepare("SELECT *  FROM Cours where idCours=? ");
  $res->execute([$identif]);
  $trouve=$res->fetch() ;

  return $trouve ;
}



//Fonction pour afficher la liste de tous les  cours  
function Cours()
{

  $db=BDConnection() ;
  $res=$db->prepare("SELECT *  FROM Cours ");
  $res->execute();
  $trouve=$res->fetchAll() ;
   return $trouve ;
}


function SupprimerCours($idC)
{
  $db=BDConnection();
  $contenu=$db->prepare("DELETE FROM Cours WHERE idCours= ? ");
  $contenu->execute([$idC ]);
  
}


  //Fonction afficher la liste des Contenu en inserant l'identifiant du chapitre .

function AfficherListeContenu($idChap)
{
  $db=BDConnection() ;
  $res=$db->prepare("SELECT * FROM Contenu WHERE idChapitre=?");
  $res->execute([$idChap]);
  return $res ;
}

//Fonction qui permet d'afficher le forum d'un cours 
function AfficheForum($idCours)
{
  $db=BDConnection() ;
  $pageC=$db->prepare("SELECT * FROM Forum WHERE idCours=?" ) ;
  $pageC->execute([$idCours]);

  return $pageC ;
}

//fonction qui modifie le nom d'un chapitre
function ModifierNomChap($Newnom,$idChap)
{
  $db=BDConnection() ;

  $res=$db->prepare("UPDATE Chapitre SET nomChapitre =? WHERE Chapitre.idChapitre= ? ");
  $res->execute([$Newnom,$idChap]);
  $trouve=$res->fetchAll() ;
  return $trouve ;
}

//Fonction qui supprime un chapitre .

function supprimerChapitre($idChap)
{
  $db=BDConnection();
  $contenu=$db->prepare("DELETE FROM Chapitre WHERE idChapitre= ? ");
  $contenu->execute([$idChap ]);

}

/*
function supprimerForum($idCour)
{
  $db=BDConnection();
  $contenu=$db->prepare("DELETE FROM Forum WHERE idCours= ? ");
  $contenu->execute([$idCour]);


}
*/



?>
