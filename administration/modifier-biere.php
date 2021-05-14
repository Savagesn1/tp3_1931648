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
    <link rel="stylesheet" href="../styles/style.css">
    <title>Modifier une biere</title>
</head>

<body>
    <?php
    include "en-tete.php";
    ?>
    <section class="content">

        <div class="content2">
            <h2>Modifier la biere</h2>
            <form action="modifier-biere-traitement.php" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" />
                </div>
                <div>
                    <label for="nom_brasserie">Brasserie</label>
                    <textarea name="nom_brasserie" id="nom_brasserie"></textarea>
                </div>
                <div>
                    <label for="type">Type de biere</label>
                    <textarea name="type" id="type"></textarea>
                </div>
                <div>
                    <label for="taux">Taux d'Alcool</label>
                    <input type="text" name="taux" id="taux" />
                </div>
                <div>
                    <label for="image">Nom du fichier de l'image</label>
                    <input type="file" name="image" id="image" />
                </div>
                <input type="submit" value="Modifier la biere">
                <a href="gere-bieres.php"><input type="submit" value="Annuler"></a>
                <input type="hidden" name="id_biere" value="<?= $_GET['id_biere'] ?>" />
            </form>
        </div>
    </section>
    <?php
    include "../pied-page.php";
    ?>
</body>

</html>