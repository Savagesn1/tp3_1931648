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
                <a href="gere-bieres.php"> Gérer </a>|
                <span>Bienvenue <?= htmlspecialchars($_SESSION['utilisateur']['prenom_utilisateur'], ENT_QUOTES, 'UTF-8') ?></span> |
                <a href="deconexion.php">Se deconnecter</a>
            <?php
            } else {

            ?>
                <a href="../index.php"> Accueil </a>|
                <a href="authentification.php">S'authentifier</a> |
                <a href="creer-utilisateur.php">Créer un compte</a>
            <?php
            }
            ?>
        </div>
    </nav>


</header>