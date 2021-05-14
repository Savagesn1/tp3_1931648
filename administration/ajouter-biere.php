<?php
// Condition pour éviter le problème
if (!isset($_SESSION)) {
    session_start();
}
?>


<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Ajouter une Biere</title>
</head>

<body>
    <?php
    include "en-tete.php";
    ?>

    <section>
        <h2>Ajouter une biere</h2>
        <form action="ajouter-biere-traitement.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" />
            </div>
            <div>
                <label for="nom_brasserie">La brasserie</label>
                <textarea name="brasserie" id="nom_brasserie"></textarea>
            </div>
            <div>
                <label for="type">type de biere</label>
                <textarea name="type" id="type"></textarea>
            </div>
            <div>
                <label for="taux">Taux d'Alcool</label>
                <input type="text" name="taux" id="taux" />
            </div>
            <div>
                <label for="image">Choisir une image :</label>
                <input type="file" name="image" />
            </div>
            <input type="submit" value="Ajouter Biere">
            <a href="../index.php"><input type="cancel" value="Annuler"></a>
        </form>
    </section>

    <?php

    include "pied-page.php";
    ?>
</body>

</html>