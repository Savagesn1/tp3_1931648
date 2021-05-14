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
    <link rel="stylesheet" href="styles/style.css">

</head>

<body>
    <?php
    include "en-tete.php";

    $idBiere = $_GET['id_biere'];

    include "../connexion.php";

    try {
        $sth = $dbh->prepare("DELETE FROM `bieres` WHERE `id_biere` = :id;");
        $sth->bindParam(':id', $idbiere, PDO::PARAM_INT);
    ?>
        <div>
            <?php
            if ($sth->execute()) {
                echo ("Succès lors de la suppression de la biere.");
            } else {
                echo ("Erreur lors de la suppression de la biere.");
            }
            ?>
        </div>
    <?php
    } catch (\Throwable $e) {
        echo ("Erreur lors de la suppression de la biere.");
    }

    include "../pied-page.php";
    ?>
</body>

</html>