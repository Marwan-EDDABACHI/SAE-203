<?php
$couleur_bulle_classe = "rose";
$page_active = "index";

require_once('./ressources/includes/connexion-bdd.php');

// il recupere lid de l'article 
$id = $_GET['id'];
$requete_brute = "
    SELECT * FROM article
    WHERE article.id = $id
";
$resultat_brut = mysqli_query($mysqli_link, $requete_brute);
$entite = mysqli_fetch_array($resultat_brut);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo $_ENV['CHEMIN_BASE']; ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article - SAÉ 203</title>

    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/fonts.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/header.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/accueil.css">
    <link rel="stylesheet" href="./ressources/css/accueil.css">
    <link rel="stylesheet" href="./ressources/css/article.css">
    <link rel="icon" type="image/png" href="./ressources/images/favicon.png">

   
</head>

<body>
    <?php require_once('./ressources/includes/top-navigation.php'); ?>
    <?php
        // A supprimer si vous n'en avez pas besoin.
        // Mettre une couleur dédiée pour cette bulle, si vous gardez la bulle
        require_once('./ressources/includes/bulle.php');
    ?>

    <!-- Vous allez principalement écrire votre code HTML ci-dessous -->
    <main class="conteneur-principal conteneur-1280">
    <h1 class="titre"><?php echo html_entity_decode($entite["titre"]); ?></h1>

    <div class="article-contenu">
        <?php echo html_entity_decode($entite["contenu"]); ?>
    </div>

    <div class="zone-medias">
        
        <?php 
        // La vidéo YouTube s'affiche uniquement si le lien existe dans la BDD
        if (!empty($entite['lien_yt'])) : 
            $url_yt = str_replace(["watch?v=", "youtu.be/"], ["embed/", "www.youtube.com/embed/"], $entite['lien_yt']);
            $url_propre = explode('?', $url_yt)[0];
        ?>
            <div class="video-article">
                <iframe src="<?php echo $url_propre; ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        <?php endif; ?>

        <?php 
        // L'image s'affiche uniquement si elle existe dans la BDD
        if (!empty($entite['image'])) : 
        ?>
            <div class="image-article">
                <img src="<?php echo $entite['image']; ?>" alt="Illustration">
            </div>
        <?php endif; ?>

    </div>

    <hr style="margin: 30px 0; border: 0; border-top: 1px solid #eee;">
    <p>Par <strong><?php echo html_entity_decode($entite["auteur"]); ?></strong> le <?php echo date('d/m/Y', strtotime($entite["date_creation"])); ?></p>
</main>
    <?php require_once('./ressources/includes/footer.php'); ?>
</body>

</html>
