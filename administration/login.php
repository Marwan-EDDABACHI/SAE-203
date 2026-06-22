<?php
// On démarre la session obligatoirement tout en haut. 
// C'est ce qui va nous permettre de mémoriser que l'administrateur est bien connecté.
session_start();


$identifiant_secret = "saedev203";
$mot_de_passe = "sae203@butmmi"; 
// On initialise une variable d'erreur vide par défaut
$erreur = "";

// Traitement du formulaire
// On vérifie si la page a été appelée par la soumission du formulaire (méthode POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // On vérifie maintenant l'identifiant ET le mot de passe
    // L'opérateur === vérifie que la valeur ET le type correspondent exactement
    if ($_POST['identifiant'] === $identifiant_secret && $_POST['mot_de_passe'] === $mot_de_passe) {
        // Si tout est bon, on crée notre variable de session qui sert de "pass d'entrée"
        $_SESSION['connecte'] = true;
        header("Location: index.php"); // On redirige vers la page d'administration
        exit;// On n'oublie pas le exit pour stopper la lecture du reste du code
    } else {
        // Si la saisie est fausse, on remplit notre variable d'erreur
        $erreur = "Identifiant ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accès Administration</title>
    <link rel="stylesheet" href="../ressources/css/style.css"> 
    <link rel="icon" type="image/png" href="../ressources/images/favicon.png">
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

            <form action="login.php" method="POST">
                <div class="mb-4">
                    <label for="identifiant" class="block text-xs font-bold mb-2">Identifiant</label>
                    <input type="text" id="identifiant" name="identifiant" required 
                           class="border border-gray-400 rounded w-full py-2 px-3 text-sm focus:outline-none focus:border-gray-700">
                </div>

                <div class="mb-6">
                    <label for="mot_de_passe" class="block text-xs font-bold mb-2">Mot de passe</label>
                    <input type="password" id="mot_de_passe" name="mot_de_passe" required 
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
        <p>EDDABACHI Marwan;FAIDIDE Maëlane;JANANA Rayan;ISLI Ayyoub;GUILLOT Florent</p>
    </footer>

</body>
</html>