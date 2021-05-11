<?php
session_start();
?>

<header>
    <h1>Les Bieres Canadiennes</h1>
    <nav>

        <div style="float: right;">
            <?php


            if (!empty($_SESSION['utilisateur'])) {


            ?>
                <span>Bienvenue <?= htmlspecialchars($_SESSION['utilisateur']['courriel'], ENT_QUOTES, 'UTF-8') ?></span> |
                <a href="administration/deconnexion.php">Se deconnecter</a>
            <?php
            } else {

            ?>
                <a href="administration/authentification.php">S'authentifier</a> |
                <a href="administration/creer-utilisateur.php">Créer un compte</a>
            <?php
            }
            ?>
        </div>
    </nav>
</header>