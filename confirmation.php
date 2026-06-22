<?php
$couleur_bulle_classe = "jaune";
$page_active = "contact";

require_once('./ressources/includes/connexion-bdd.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <base href="/<?php echo $_ENV['CHEMIN_BASE']; ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande envoyée - SAÉ 203</title>

    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/fonts.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/header.css">
    
    <link rel="stylesheet" href="./ressources/css/confirmation.css">
</head>

<body>
    <?php require_once('./ressources/includes/top-navigation.php'); ?>
    
    <main class="conteneur-principal conteneur-1280">
        
        <section class="banniere-succes">
            <p class="paragraphe">
                <span class="texte-merci">Merci !</span> Votre requête a bien été prise en compte. Nous vous recontacterons dans les plus brefs délais.
            </p>
        </section>

        <div class="actions-confirmation">
            <a href="index.php" class="btn-envoi texte-gras">
                RETOURNER À L'ACCUEIL
            </a>
        </div>

    </main>

    <?php require_once('./ressources/includes/footer.php'); ?>
</body>
</html>