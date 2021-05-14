<?php
// Condition pour éviter le problème
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php
$idBiere = $_GET['id_biere'];

include "connexion.php";

$sth = $dbh->prepare("SELECT `id_biere`, `nom`, `nom_brasserie`, `type`, `taux`, `image` FROM `bieres` WHERE `id_biere` = :id");
$sth->bindParam(':id', $idBiere, PDO::PARAM_INT);
$sth->execute();
$biere = $sth->fetch();
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title><?php echo $biere['nom']; ?></title>

</head>

<body>
    <?php
    include "en-tete.php";
    ?>

    <section class="centrer centrer-texte">

        <div class="content">

            <h4 class="detail"><?= $biere['nom'] ?></h4>
            <span>Brasserie: <?= $biere['nom_brasserie'] ?></span>
            <p>Type: <?= $biere['type'] ?></p>
            <p>Taux: <?= $biere['taux'] ?>%</p>
            <img class="image" src="image/<?= $biere['image'] ?>">
        </div>
    </section>
    <?php
    include "pied-page.php";
    ?>
</body>

</html>