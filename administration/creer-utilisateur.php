<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Création d'un compte</title>
</head>

<body>
    <?php
    include "en-tete.php";
    ?>

    <h2>Création d'un compte</h2>

    <form action="creer-utilisateur-traitement.php" method="post">
        <div>
            <label for="courriel">Courriel :</label>
            <input type="text" name="courriel" id="courriel" />
        </div>
        <div>
            <label for="mot_passe">Mot de passe :</label>
            <input type="password" name="mot_passe" id="mot_passe" />
        </div>
        <input type="submit" value="Créer le compte">
    </form>
    <?php
    include "pied-page.php";
    ?>

</body>

</html>