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
    <title> Bière</title>
</head>


<body>
    <?php
    include "en-tete.php";
    try {
        include "../connexion.php";
        $sth = $dbh->prepare("SELECT `id_biere`, `nom`, `image` from `bieres`;");
        $sth->execute();
        $biere = $sth->fetchAll();

        foreach ($biere as $biere) {
    ?>
            <section class="centrer centrer-texte">
                <div class="content">
                    <a href="effacer-biere-traitement.php?<?= $biere['id_biere'] ?>" title="">Supprimer la biere</a> |
                    <a href="modifier-biere.php?<?= $biere['id_biere'] ?>" title="">Modifier la biere</a> |
                </div>


                <div class="content">
                    <h4 class="detail"><?= $biere['nom'] ?></h4>
                    <img class="image" src="../image/<?= $biere['image'] ?>">
                </div>
            </section>
    <?php
        }
    } catch (\Throwable $e) {
        echo ("Erreur lors de la récupération.");
        echo ($e->getMessage());
    }
    include "pied-page.php";
    ?>
</body>

</html>