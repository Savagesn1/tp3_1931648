<?php
// Condition pour éviter le problème
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>S'authentifier</title>
</head>

<body>
    <?php

    /*
        Dans le cas où l'utilisateur est déjà authentifié, redirigez 
        celui-ci vers la page sécurisée.
    */
    if (!empty($_SESSION['utilisateur'])) {
    }

    include "en-tete.php";
    ?>
    <section class="creer-compte">
        <h2>Authentification</h2>
        <form action="authentification-traitement.php" method="post">
            <div>
                <label for="courriel">Courriel :</label>
                <input type="text" name="courriel" id="courriel" />
            </div>
            <div>
                <label for="mot_passe">Mot de passe :</label>
                <input type="password" name="mot_passe" id="mot_passe" />
            </div>
            <input class="botton" type="submit" value="Connexion">
        </form>
    </section>

    <?php
    include "../pied-page.php";
    ?>
</body>

</html>