<?php
// Condition pour éviter le problème
if (!isset($_SESSION)) {
    session_start();
}
?>
<header>

    <h1>Les Bieres Canadiennes</h1>

    <nav>

        <div style="float: right;">
            <?php

            if (!empty($_SESSION['utilisateur'])) {
            ?>
                <span>Bienvenue <?= htmlspecialchars($_SESSION['utilisateur']['prenom_utilisateur'], ENT_QUOTES, 'UTF-8') ?></span> |
                <a href="../index.php"> Accueil </a>|
                <a href="administration/gere-bieres.php"> Gérer </a>|
                <a href="administration/ajouter-biere.php"> Ajout </a>|
                <a href="administration/deconexion.php">Se deconecter</a>
            <?php
            } else {

            ?>
                <a href="index.php"> Accueil </a>|
                <a href="administration/authentification.php">S'authentifier</a> |
                <a href="administration/creer-utilisateur.php">Créer un compte</a>
            <?php
            }
            ?>
        </div>
    </nav>
</header>