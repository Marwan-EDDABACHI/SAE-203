<?php
require_once "../../ressources/includes/connexion-bdd.php";
// cette fonction permet de vérifier si l'utilisateur est connecté en tant qu'administrateur avant d'accéder à la page. Comme sa il ne pourra pas passer par l'url direct
session_start();
// Sécurité de notre back-office : on vérifie que la variable de session 'admin_connecte' existe ET qu'elle vaut bien 'true'
if (!isset($_SESSION['admin_connecte']) || $_SESSION['admin_connecte'] !== true) {
    // Si ce n'est pas le cas, on le redirige directement vers la page de connexion
    header("Location: ../index.php");
    exit;// On arrête l'exécution du script ici pour vraiment bloquer l'accès au reste du code
}
// On définit la page courante. Ça nous sert pour la gestion de l'état actif dans notre menu de navigation.
$page_courante = "auteurs";
// On vérifie si notre tableau $_POST n'est pas vide (ce qui veut dire que l'utilisateur a cliqué sur le bouton d'envoi du formulaire)
$formulaire_soumis = !empty($_POST);

if ($formulaire_soumis) {
    // On s'assure que TOUS les champs nécessaires existent et ont bien été envoyés par notre formulaire
    if ( 
        isset(
            $_POST["prenom"],
            $_POST["nom"],
            $_POST["lien_avatar"],
            $_POST["lien_twitter"]
        )
    ) {
        // Traitement et sécurisation des données avec htmlentities()
        // C'est vital pour éviter les failles XSS (pour pas qu'on puisse injecter du code HTML ou JS malveillant dans notre BDD)
        $nom = htmlentities($_POST["nom"]);
        $prenom = htmlentities($_POST["prenom"]);
        $lien_avatar = htmlentities($_POST["lien_avatar"]);
        $lien_twitter = htmlentities($_POST["lien_twitter"]);
        // On prépare notre requête SQL d'insertion (INSERT INTO)
        // On injecte nos variables PHP sécurisées directement dans la requête
       $requete_brute = "
            INSERT INTO auteur(nom, prenom, lien_avatar, lien_twitter)
            VALUES ('$nom', '$prenom', '$lien_avatar', '$lien_twitter')
        ";
        // On exécute la requête sur notre base de données
        $resultat_brut = mysqli_query($mysqli_link, $requete_brute);
        // On vérifie si l'insertion s'est bien déroulée
        if ($resultat_brut === true) {
            // Tout s'est bien passé
        } else {
            // Il y a eu un problème
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require_once('../ressources/includes/head.php'); ?>

    <title>Creation auteur - Administration</title>
</head>

<body>
    <?php require_once('../ressources/includes/menu-principal.php'); ?>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-3 px-4">
            <p class="text-3xl font-bold text-gray-900">Créer</p>
        </div>
    </header>

    <main>
        <div class="mx-auto max-w-7xl py-6 px-4">
            <div class="py-6">
                <form method="POST" action="" class="rounded-lg bg-white p-4 shadow border-gray-300 border-1">
                    <section class="grid gap-6">
                        <div class="col-span-12">
                            <label for="nom" class="block text-lg font-medium text-gray-700">Nom</label>
                            <input type="text" name="nom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="nom">
                        </div>
                        <div class="col-span-12">
                            <label for="prenom" class="block text-lg font-medium text-gray-700">Prénom</label>
                            <input type="text" name="prenom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus-within:border-indigo-500 focus-within:ring-indigo-500" id="prenom">
                        </div>
                        <div class="col-span-12">
                            <label for="avatar" class="block text-lg font-medium text-gray-700">Lien avatar</label>
                            <input type="url" name="lien_avatar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus-within:border-indigo-500 focus-within:ring-indigo-500" id="avatar">
                            <p class="text-sm text-gray-500">
                                Mettre l'URL de l'avatar (chemin absolu)
                            </p>
                        </div>
                        <div class="col-span-12">
                            <label for="lien_twitter" class="block text-lg font-medium text-gray-700">Lien twitter</label>
                            <input type="url" name="lien_twitter" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus-within:border-indigo-500 focus-within:ring-indigo-500" id="lien_twitter">
                        </div>
                        <div class="mb-3 col-md-6">
                            <button type="submit" class="font-medium rounded-md bg-indigo-600 py-2 px-4 text-lg text-white shadow-sm hover:bg-indigo-700 focus-within:bg-indigo-700">Créer</button>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>
</html>
