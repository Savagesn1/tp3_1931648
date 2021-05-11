<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Page confirmation pour l'ajout d'une biere</title>
</head>

<body>
    <?php
    include "en-tete.php";

    $dossierCible = "../image/";
    $fichierCible = $dossierCible . basename($_FILES['image']['name']);

    //Televersement de l'image

    if (move_uploaded_file($_FILES['image']['name'], $fichierCible)) {


        try {

            include "connexion.php";

            $sth = $dbh->prepare("INSERT INTO `bieres`(`nom`, `nom_brasserie`, `type`, `taux`, `image`) VALUES (:nom, :nom_brasserie, :type, :taux, :image);");

            $sth->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
            $sth->bindParam(':nom_brasserie', $_POST['nom_brasserie'], PDO::PARAM_STR);
            $sth->bindParam(':type', $_POST['type'], PDO::PARAM_STR);
            $sth->bindParam(':taux', $_POST['taux'], PDO::PARAM_STR);
            $sth->bindParam(':image', $_FILES['image']['name'], PDO::PARAM_STR);
    ?>
            <div>
                <?php
                if ($sth->execute()) {
                    echo ("Succès lors de l'ajout d'une biere");
                } else {
                    echo ("Erreur lors de l'ajout d'une biere");
                }
                ?>
            </div>
    <?php
        } catch (\Throwable $e) {
            echo ("Erreur lors de l'ajout d'une biere.");
            echo ($e->getMessage());
        }
    } else {
        echo ("Erreur lors de la sauvegarde de l'image.");
    }

    include "pied-page.php";
    ?>
</body>

</html>