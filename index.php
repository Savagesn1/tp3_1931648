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
    <title> Bière</title>
</head>


<body>
    <?php
    include "en-tete.php";
    try {
        include "connexion.php";
        $sth = $dbh->prepare("SELECT `id_biere`, `nom`, `nom_brasserie`, `type`, `taux`, `image` from `bieres`;");
        $sth->execute();
        $biere = $sth->fetchAll();

        foreach ($biere as $bieres) {
    ?>
            <section class="centrer centrer-texte">

                <div class="content">
                    <h4>
                        <a href="detail-biere.php?id_biere=<?= $bieres['id_biere'] ?>" title=""><?= $bieres['nom'] ?></a>
                    </h4>
                    <span>Brasserie: <?= $bieres['nom_brasserie'] ?></span>
                    <p>Type: <?= $bieres['type'] ?></p>

                    <img class="image" src="image/<?= $bieres['image'] ?>">
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