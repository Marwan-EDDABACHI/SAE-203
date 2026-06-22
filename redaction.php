<?php
$couleur_bulle_classe = "rose";
$page_active = "redaction";

require_once('./ressources/includes/connexion-bdd.php');

// Vos requêtes SQL
$requete = "SELECT * FROM auteur";
$resultat = mysqli_query($mysqli_link, $requete);
$listeAuteurs = mysqli_fetch_all($resultat, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo $_ENV['CHEMIN_BASE']; ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Équipe de rédaction - SAÉ 203</title>

    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/fonts.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/header.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/accueil.css">
</head>

<body>
    <?php require_once('./ressources/includes/top-navigation.php'); ?>
    <?php
    // facultatif
    // require_once('./ressources/includes/bulle.php');
    ?>

    <main class="conteneur-principal conteneur-1280">
        <h1 class="titre-page">Notre équipe de rédaction</h1>
        <section class="grille-equipe">
            <?php foreach ($listeAuteurs as $auteur) { ?>
                <article class="carte-auteur">
                    <p><?php echo $auteur['prenom'] . " " . $auteur['nom']; ?></p>
                </article>
            <?php } ?>
        </section>
    </main>
    <?php require_once('./ressources/includes/footer.php'); ?>
</body>

</html>
