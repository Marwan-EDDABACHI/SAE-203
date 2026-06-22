<?php
// cette fonction permet de vérifier si l'utilisateur est connecté en tant qu'administrateur avant d'accéder à la page. Comme sa il ne pourra pas passer par l'url direct.
session_start(); 
if (!isset($_SESSION['admin_connecte']) || $_SESSION['admin_connecte'] !== true) {
    header("Location: ../index.php");
    exit;
}

// Connexion à la base de données
require_once('../../ressources/includes/connexion-bdd.php');

// on verifie si on a bien reçu un ID 
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    
    // On sécurise l'ID récupéré
    $id_article = (int) $_GET['id'];

    // requête SQL pour la suppression
    $requete_suppression = "DELETE FROM article WHERE id = $id_article";
    
    // On exécute la requête de suppression
    mysqli_query($mysqli_link, $requete_suppression);
}

// Redirige vers la page index.php après la suppression
header("Location: index.php");
exit;
?>