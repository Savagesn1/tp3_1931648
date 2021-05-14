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
    <title>Page confirmation pour la mise à jour d'une biere</title>
</head>

<body>
    <?php
    include "en-tete.php";
    include "../connexion.php";

    $dossierCible = "../image/";
    $fichierCible = $dossierCible . basename($_FILES['image']['name']);

    try {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $fichierCible)) {
            $sth = $dbh->prepare("UPDATE `bieres` SET `nom`=:nom,`nom_brasserie`=:nom_brasserie,`type`= :type,`taux`=:taux,`image`=:image WHERE `id_biere` = :id_biere;");

            $sth->bindParam(':id_biere', $_POST['id_biere'], PDO::PARAM_INT);
            $sth->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
            $sth->bindParam(':nom_brasserie', $_POST['nom_brasserie'], PDO::PARAM_STR);
            $sth->bindParam(':type', $_POST['type'], PDO::PARAM_STR);
            $sth->bindParam(':taux', $_POST['taux'], PDO::PARAM_INT);
            $sth->bindParam(':image', $_FILES['image']['name'], PDO::PARAM_STR);
    ?>
            <div>
                <?php
                if ($sth->execute()) {
                    echo ("Succès lors de la mise à jour de la biere.");
                } else {
                    echo ("Erreur lors de la mise à jour de la biere.");
                }
                ?>
            </div>
    <?php
            echo ("<script>window.location = 'gere-bieres.php'</script>");
            exit;
        }
    } catch (\Throwable $e) {
        echo ("Erreur lors de la mise à jour de la biere.");
        echo ($e->getMessage());
    }

    include "../pied-page.php";
    ?>
</body>

</html>