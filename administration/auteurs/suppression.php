<?php
// cette fonction permet de vérifier si l'utilisateur est connecté en tant qu'administrateur avant d'accéder à la page. Comme sa il ne pourra pas passer par l'url direct.
session_start();
if (!isset($_SESSION['admin_connecte']) || $_SESSION['admin_connecte'] !== true) {
    header("Location: ../index.php");
    exit;
}

require_once '../../ressources/includes/connexion-bdd.php';
// On vérifie que le formulaire a bien envoyé un identifiant id
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // On prépare la requête SQL de suppression (DELETE)
    // La clause WHERE id = $id est absolument vitale ici : elle garantit qu'on ne supprime QUE l'article sélectionné et pas toute la table
    $requete = "DELETE FROM auteur WHERE id = $id";
    mysqli_query($mysqli_link, $requete);
}
// On redirige immédiatement l'administrateur vers la liste des articles mise à jour (index.php)
// L'article supprimé n'apparaîtra plus dans le tableau
header("Location: index.php");
exit;
?>