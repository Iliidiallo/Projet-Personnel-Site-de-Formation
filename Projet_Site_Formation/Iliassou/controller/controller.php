<?php
ob_start(); // Active le buffering pour éviter les erreurs d'en-tête

require_once './model/model.php';

// Fonction pour nettoyer les données
function verif($donnee)
{
    return htmlspecialchars(stripslashes(trim($donnee)));
}

// Fonction pour ajouter un cours
function AjouterCours()
{
    $nomCours = $description = "";
    $profil = "CourDefaut.png"; // Valeur par défaut
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (empty($_POST['nom'])) {
            $errors[] = "Veuillez renseigner le nom du cours.";
        } else {
            $nomCours = verif($_POST['nom']);
        }

        if (empty($_POST['descript'])) {
            $errors[] = "Veuillez ajouter une description.";
        } else {
            $description = verif($_POST['descript']);
        }

        if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
            $uploadDir = './Image/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = basename($_FILES['img']['name']);
            $uploadPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadPath)) {
                $profil = $fileName;
            } else {
                $errors[] = "Échec de l’upload du fichier.";
            }
        }

        if (empty($errors)) {
            creerCours($nomCours, $description, $profil);
            header("Location: index.php");
            exit;
        }
    }

    require_once './view/AjouterUnCour.php';
}

// Ajouter un chapitre
function AjouterChapitre($idCours)
{
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (empty($_POST['nomChapitre'])) {
            $errors[] = "Veuillez écrire le nom du chapitre.";
        } else {
            $nomInsert = verif($_POST['nomChapitre']);
            creeChapitre($idCours, $nomInsert);
            header("Location: index.php?id=Cours&idCours=$idCours");
            exit;
        }
    }

    require_once './view/formulaireAjoutChapitre.php';
}

// Ajouter un forum
function AjouterForum($idCours)
{
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (empty($_POST['Titre'])) {
            $errors[] = "Veuillez écrire le titre du forum.";
        } else {
            $nomInsert = verif($_POST['Titre']);
            CreeForum($idCours, $nomInsert);
            header("Location: index.php?id=Cours&idCours=$idCours");
            exit;
        }
    }

    require_once './view/formulaireAjouterForum.php';
}

// Ajouter un contenu
function AjoutContenu($idChapitre, $idCours)
{
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!isset($_FILES['fichier']) || $_FILES['fichier']['error'] !== 0) {
            $errors[] = "Veuillez sélectionner un fichier.";
        } else {
            $uploadDir = './Image/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = basename($_FILES['fichier']['name']);
            $uploadPath = $uploadDir . $fileName;

            if (!move_uploaded_file($_FILES['fichier']['tmp_name'], $uploadPath)) {
                $errors[] = "Échec de l’upload du fichier.";
            }
        }

        if (empty($_POST['typeFichier'])) {
            $errors[] = "Veuillez renseigner le type de fichier.";
        } else {
            $typeFile = verif($_POST['typeFichier']);
        }

        if (empty($errors)) {
            creerContenu($idChapitre, $fileName, $typeFile);
            header("Location: index.php?id=Cours&idCours=$idCours");
            exit;
        }
    }

    require_once './view/formulaireAjoutContenu.php';
}

// Affichage général
function PageGenerale($page)
{
    $test = AfficherPageCours($page);
    $mescours = AfficherListeCours($page);
    $monForum = AfficheForum($page);

    require_once './view/view.php';
}

// Affichage page d'accueil
function AffichageAccueilCours()
{
    $affichageListe = Cours();
    require_once './view/AfficheCours.php';
}

// Modifier nom d’un chapitre
function modifNomChapitre($idCha, $idCours)
{
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (empty($_POST['nomChapitre'])) {
            $errors[] = "Le champ est vide.";
        } else {
            $nom = verif($_POST['nomChapitre']);
            ModifierNomChap($nom, $idCha);
            header("Location: index.php?id=Cours&idCours=$idCours");
            exit;
        }
    }

    require './view/ModifierNomChapitre.php';
}

// Supprimer un chapitre
function SuppressionChap($idChap, $idCours)
{
    supprimerChapitre($idChap);
    header("Location: index.php?id=Cours&idCours=$idCours");
    exit;
}

// Supprimer un cours
function SuppressionCours($idCours)
{
    SupprimerCours($idCours);
    header("Location: index.php");
    exit;
}

ob_end_flush(); // Termine le buffering proprement
?>
