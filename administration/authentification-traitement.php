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
    <title>Page de confirmation de l'authentification</title>
</head>

<body>
    <?php

    // Si l'utilisateur est authentifié, redirigez celui-ci vers la page sécurisée.
    if (!empty($_SESSION['utilisateur'])) {
    }

    include "en-tete.php";

    try {

        include "../connexion.php";

        /*
            Nettoyer les données avant la recherche 

            1. Nettoyez l'adresse courriel
            2. S'assurez de nettoyer le mot de passe des caractères supérieur à la valeur 127 de la table ascii avec l'option `FILTER_FLAG_STRIP_HIGH` de `FILTER_SANITIZE_STRING`.
            http://www.asciitable.com/

        */

        $utilsateur = filter_var_array($_POST, array(
            'courriel' => FILTER_SANITIZE_EMAIL,
            'mot_passe' => [
                'filter' => FILTER_SANITIZE_STRING,
                'options' => FILTER_FLAG_STRIP_HIGH
            ]
        ));

        // Pour ajouter un contexte, la date de suppression doit être vide.
        $sth = $dbh->prepare("SELECT `id_utilisateur`, `courriel`,`nom_utilisateur`,`prenom_utilisateur`, `mot_passe`, `date_creation`
                                FROM `utilisateur` 
                               WHERE `courriel` = :courriel;");

        $sth->bindParam(':courriel', $utilsateur['courriel'], PDO::PARAM_STR);
    ?>

        <div class="centrer centrer-texte">
            <?php
            if ($sth->execute()) {


                $utilisateurTrouve = $sth->fetch(PDO::FETCH_ASSOC);


                if (password_verify($utilsateur["mot_passe"], $utilisateurTrouve['mot_passe'])) {


                    $_SESSION['utilisateur'] = array(
                        'id_utilisateur' => $utilisateurTrouve['id_utilisateur'],
                        'courriel' => $utilisateurTrouve['courriel'],
                        'nom_utilisateur' => $utilisateurTrouve['nom_utilisateur'],
                        'prenom_utilisateur' => $utilisateurTrouve['prenom_utilisateur'],
                        'mot_passe' => $utilisateurTrouve['mot_passe'],
                        'date_creation' => $utilisateurTrouve['date_creation']
                    );

                    // Redirigez l'utilisateur authentifé vers la page sécurisée.
                    echo ("<script>window.location = 'gere-bieres.php'</script>");
                    exit;
                } else {
                    echo ("Connexion impossible avec ces informations.");
                }
            } else {
                echo ("Erreur lors de l'authentification.");
            }
            ?>
        </div>
    <?php

    } catch (\Throwable $e) {
        echo ("Erreur lors de l'authentification.");
        echo ($e->getMessage());
    }

    include "../pied-page.php";
    ?>
</body>

</html>