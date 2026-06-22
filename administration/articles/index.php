<?php
require_once('../../ressources/includes/connexion-bdd.php');


// cette fonction permet de vérifier si l'utilisateur est connecté en tant qu'administrateur avant d'accéder à la page. Comme sa il ne pourra pas passer par l'url direct "http://saedev203.alwaysdata.net/administration/articles/index.php" .
session_start();
if (!isset($_SESSION['admin_connecte']) || $_SESSION['admin_connecte'] !== true) {
    header("Location: ../index.php");
    exit;
}

// Mon compteur pour le nombre total d'articles
$requete_compteur = "SELECT COUNT(*) AS total FROM article"; // requête SQL pour compter le nombre total d'articles
$resultat_compteur = mysqli_query($mysqli_link, $requete_compteur); // exécution de la requête SQL
$compteur = mysqli_fetch_assoc($resultat_compteur); // récupération du résultat de la requête SQL en tableau
$nombre_total = $compteur['total']; // il recupere le nombre total d'articles


$requete_brute = '
    SELECT
        ar.id,
        ar.titre AS titre_article,
        ar.titre AS chapo_article,
        ar.contenu AS contenu_article,
        ar.image AS image_article,
        ar.lien_yt AS lien_yt_article,
        ar.date_creation AS date_creation_article,
        ar.auteur_id AS article_auteur_id,
        CONCAT(auteur.nom, " ", auteur.prenom) AS auteur
    FROM article AS ar
    LEFT JOIN auteur
    ON ar.auteur_id = auteur.id;
';
$resultat_brut = mysqli_query($mysqli_link, $requete_brute);

$page_courante = "articles";
// On définit la racine de manière simple pour éviter les répétitions
$URL_creation = "/administration/articles/creation.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require_once("../ressources/includes/head.php"); ?>
    <title>Liste articles - Administration</title>
</head>

<body>
    <?php require_once('../ressources/includes/menu-principal.php'); ?>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-3 px-4 justify-between flex">
            <div>
                <p class="text-3xl font-bold text-gray-900">Liste d'articles</p>
                <p class="text-gray-500 mt-1">Nombre d'articles : <?php echo $nombre_total; ?></p>
             </div>
        <a href="<?php echo $URL_creation ?>" class="self-start block rounded-md py-2 px-4 text-base font-medium text-white shadow-sm bg-slate-700 hover:bg-slate-900 focus-within:bg-slate-900">Ajouter un nouvel article</a>
    </div>
</header>
         
    <main>
        <div class="mx-auto max-w-7xl py-6 px-4">


            <div class="py-6">
                <table class="w-full bg-white rounded-lg overflow-hidden border-collapse shadow">
                    <thead class="bg-gray-100">
                        <tr>
                            
                            <th class="font-bold pl-8 py-5 text-left">Titre</th>
                            <th class="font-bold pl-8 py-5 text-left">Chapô</th>
                            <th class="font-bold pl-8 py-5 text-left">Date de creation</th>
                            <th class="font-bold pl-8 py-5 text-left">Auteur</th>
                            <th class="font-bold pl-8 py-5 text-left">Actions</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($element = mysqli_fetch_array($resultat_brut, MYSQLI_ASSOC)) {
                                $lien_edition = "/administration/articles/edition.php?id={$element['id']}";
                                $lien_suppression = "/administration/articles/suppression.php?id={$element['id']}";
                                $date_creation = new DateTime($element["date_creation_article"]);
                                $auteur_article = $element["auteur"];
                                if (is_null($auteur_article)) {
                                    $auteur_article = "/";
                                }
                        ?>
                                <tr style="view-transition-name: article-<?php echo $element['id']; ?>" class="odd:bg-neutral-50  border-b-2 border-b-gray-100 last:border-b-0 first:border-t-2 first:border-t-gray-200">
                                    <td class="pl-8 p-4" data-label="Titre"><?php echo $element["titre_article"]; ?></td>
                                    <td class="pl-8 p-4" data-label="Chapô"><?php echo $element["chapo_article"]; ?></td>
                                    <td class="pl-8 p-4" data-label="Date">
                                        <time datetime="<?php echo $date_creation->format('d/m/Y H:i:s'); ?>">
                                            <?php echo $date_creation->format('d/m/Y H:i:s'); ?>
                                        </time>
                                    </td>
                                    <td class="pl-8 p-4" data-label="Auteur">
                                        <?php echo $auteur_article; ?>
                                    </td>
                                    <td class="pl-8 p-4" data-label="Actions">
                                        <div class="flex items-center gap-4">
                                            <a href='<?php echo $lien_edition; ?>' class='font-bold text-blue-600 hover:text-blue-900 focus:text-blue-900 mr-4'>Éditer</a>
                                            <a href='<?php echo $lien_suppression; ?>' class='font-bold text-red-600 hover:text-red-900 mr-4' onclick="return confirm('Es-tu vraiment sûr de vouloir supprimer cet article ?');">Supprimer</a>
                                        </div>
</td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>

</html>
