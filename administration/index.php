<?php
// Démarrage de la session. Indispensable pour pouvoir stocker l'état de connexion de l'administrateur
session_start();

// Inclusion de la base de données 
require_once("../ressources/includes/connexion-bdd.php");

// On récupère les identifiants depuis le fichier .env configure au debut de la sae
$admin_attendu = $_ENV['UTILISATEUR_BDD'] ?? "saedev203";
$mdp_attendu = $_ENV['ADMIN_PASSWORD'] ?? "sae203@butmmi"; //il définit une valeur par défaut ("saedev203") si la variable d'environnement n'est pas trouvée
// On initialise une variable d'erreur vide par défaut
$erreur = "";
// On vérifie si la page a été chargée suite à la soumission du formulaire (méthode POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // On vérifie les champs "login" et "password"
    if ($_POST['login'] === $admin_attendu && $_POST['password'] === $mdp_attendu) {
        // Les identifiants sont bons, on crée une variable de session pour autoriser l'accès au back-office
        $_SESSION['admin_connecte'] = true;
        
        // Redirection directe vers la liste des articles après la connexion
        // C'est la page principale de notre back-office
        header("Location: articles/index.php");
        exit();// On n'oublie pas d'arrêter le script ici après la redirection
    } else {
        // Si les identifiants sont faux, on prépare le message d'erreur
        $erreur = "Identifiants incorrects, l'accès est refusé.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Administration</title>
    <link rel="icon" type="image/png" href="../ressources/images/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#EAEAEA] min-h-screen flex flex-col font-sans text-gray-800">

    <header class="bg-white py-4 shadow-sm w-full">
        <h1 class="text-2xl font-bold text-center">Accès Administration</h1>
    </header>

    <main class="flex-grow flex items-center justify-center p-4">
        <div class="bg-white p-8 rounded shadow-sm w-full max-w-sm border border-gray-200">
            
            <?php if (!empty($erreur)) : ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-6 text-sm text-center">
                    <?php echo $erreur; ?>
                </div>
            <?php endif; ?>

            <form action="index.php" method="POST">
                <div class="mb-4">
                    <label for="login" class="block text-xs font-bold mb-2">Identifiant</label>
                    <input type="text" id="login" name="login" required 
                           class="border border-gray-400 rounded w-full py-2 px-3 text-sm focus:outline-none focus:border-gray-700">
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-xs font-bold mb-2">Mot de passe</label>
                    <input type="password" id="password" name="password" required 
                           class="border border-gray-400 rounded w-full py-2 px-3 text-sm focus:outline-none focus:border-gray-700">
                </div>

                <div>
                    <button type="submit" 
                            class="bg-[#101828] hover:bg-black text-white font-bold py-2.5 px-4 rounded w-full transition duration-300 text-sm">
                        Se connecter
                    </button>
                </div>
            </form>
        </div>
    </main>

    <footer class="border-t border-gray-300 py-6 text-center text-xs text-black w-full mt-auto">
        <p class="font-bold mb-1">SAÉ 203 – Concevoir un site web avec une source de données</p>
        <p class="font-bold mb-1">MMI 2025–2028</p>
        <p class="mb-1">Projet réalisé par :</p>
        <p>EDDABACHI Marwan ; FAIDIDE Maëlane ; JANANA Rayan ; ISLI Ayyoub ; GUILLOT Florent</p>
    </footer>

</body>
</html>