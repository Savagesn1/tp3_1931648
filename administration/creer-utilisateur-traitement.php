<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Page de confirmation</title>
</head>

<body>
    <?php
    include "en-tete.php";
    $utilsateur = filter_var_array($_POST, array(
        'courriel' => FILTER_SANITIZE_EMAIL,
        'mot_passe' => FILTER_SANITIZE_STRING,
        'nom_utilisateur' => FILTER_SANITIZE_STRING,
        'prenom_utilisateur' => FILTER_SANITIZE_STRING
    ));


    if (!filter_var($utilsateur['courriel'], FILTER_VALIDATE_EMAIL)) {
    ?>
        <?php
        echo ("Le format du courriel est invalide.");
        ?>

        <?php
    } else {

        try {
            include "../connexion.php";
            $motPasseSecurise = password_hash($utilsateur['mot_passe'], PASSWORD_BCRYPT);

            $sth = $dbh->prepare("INSERT INTO `utilisateur`(`id_utilisateur`,`courriel`,`nom_utilisateur`,`prenom_utilisateur` `mot_passe`) VALUES (:id_utilisateur,:courriel, :nom_utilisateur, :prenom_utilisateur, :mot_passe);");

            $sth->bindParam(':id_utilisateur', $utilsateur['id_utilisateur'], PDO::PARAM_STR);
            $sth->bindParam(':courriel', $utilsateur['courriel'], PDO::PARAM_STR);
            $sth->bindParam(':nom_utilisateur', $utilsateur['nom_utilisateur'], PDO::PARAM_INT);
            $sth->bindParam(':prenom_utilisateur', $utilsateur['prenom_utilisateur'], PDO::PARAM_INT);
            $sth->bindParam(':mot_passe', $motPasseSecurise, PDO::PARAM_STR);
        ?>


            <?php
            if ($sth->execute()) {
                echo ("Succès lors de la création du compte.");
            } else {
                echo ("Erreur lors de la création du compte.");
            }
            ?>

    <?php
        } catch (\Throwable $e) {
            echo ("Erreur lors de la création du compte.");
            echo ($e->getMessage());
        }
    }

    include "../pied-page.php";
    ?>

</body>

</html>