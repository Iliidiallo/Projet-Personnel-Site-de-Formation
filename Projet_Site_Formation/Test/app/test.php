<?php
try {
// Dans Docker, le conteneur s'appelle "db" dans le même réseau
$db = new PDO('mysql:host=db;dbname=Connection;charset=utf8', 'root', 'Iliassou');
    echo "Connexion réussie !";
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}
?>

