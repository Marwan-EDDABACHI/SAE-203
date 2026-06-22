<?php
$couleur_bulle_classe = "rose";
$page_active = "";
// On dit au menu que nous sommes sur la page équipe
$page_active = "equipe";

require_once('./ressources/includes/connexion-bdd.php');

// Vos requêtes SQL
// Ici, je fais une jointure (LEFT JOIN) entre la table auteur et la table article.
// Ça me permet de récupérer les infos de l'auteur ET de compter combien d'articles il a écrit (COUNT)
$requete = "SELECT auteur.*, COUNT(article.id) AS nb_articles FROM auteur LEFT JOIN article ON auteur.id = article.auteur_id GROUP BY auteur.id";
$resultat = mysqli_query($mysqli_link, $requete);
// Je crée un tableau vide pour stocker mes auteurs
$listeAuteurs = [];
// Je parcours les résultats de ma requête et je les range dans mon tableau
// fetch_assoc permet de récupérer les données sous forme de tableau associatif
while ($row = mysqli_fetch_assoc($resultat)) {
    $listeAuteurs[] = $row;
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo $_ENV['CHEMIN_BASE']; ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipe de redaction- SAÉ 203</title>

    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/fonts.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/header.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/accueil.css">
    <link rel="stylesheet" href="./ressources/css/equipe.css">
    <link rel="icon" type="image/png" href="./ressources/images/favicon.png">
</head>

<body>
    <?php require_once('./ressources/includes/top-navigation.php'); ?>
    <?php require_once('./ressources/includes/bulle.php'); ?>

<main class="conteneur-principal conteneur-1280">
    <h1 class="text-3xl font-bold text-gray-800 mt-10 mb-10">Équipe de rédaction</h1>
        <script src="https://cdn.tailwindcss.com"></script>
            <script>
                tailwind.config = {
                    corePlugins: {
                    preflight: false, // On désactive le preflight pour ne pas casser le CSS de base du projet
                }
            },  
                
        </script>

    <section class="grille-equipe grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-10 mb-10">
         <?php foreach ($listeAuteurs as $auteur) { ?>
        
            <article class="fiche-auteur flex flex-col items-center bg-white p-6 rounded-2xl shadow-md border border-gray-200 hover:shadow-xl transition-shadow duration-300">
            
                <div class="photo-auteur mb-4">
                    <img class="w-32 h-32 rounded-full object-cover border-4 border-gray-100 shadow-sm" 
                     src="<?php echo $auteur['lien_avatar']; ?>" 
                     alt="Photo de <?php echo html_entity_decode($auteur['prenom']); ?>">
                </div>
            
                <div class="infos-auteur text-center">
                    <h2 class="text-xl font-bold text-gray-800 mb-3">
                    <?php echo html_entity_decode($auteur['prenom']) . " " . html_entity_decode($auteur['nom']); ?>
                    </h2>

                    <p class="text-gray-500 text-sm mb-3 font-medium">
                        <?php echo $auteur['nb_articles']; ?> article(s) publié(s)
                    </p>
                    // Condition : on affiche le bouton Twitter SEULEMENT si l'auteur a renseigné un lien
                    <?php if (!empty($auteur['lien_twitter'])) { ?>
                        <a href="<?php echo $auteur['lien_twitter']; ?>" class="lien-twitter inline-block bg-blue-100 text-blue-600 px-5 py-2 rounded-full font-semibold text-sm hover:bg-blue-200 transition-colors" target="_blank">
                        Twitter
                        </a>
                    <?php } ?>
                </div>
            
            </article>

        <?php } ?>
    </section>
</main>
<?php require_once('./ressources/includes/footer.php'); ?>
</body>

</html>
