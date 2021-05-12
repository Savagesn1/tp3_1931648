 <header>
     <h1>Les Bieres Canadiennes</h1>
     <?php
        // Condition pour éviter le problème
        if (!isset($_SESSION)) {
            session_start();
        }
        ?>
     <nav>

         <div style="float: right;">
             <?php

                if (!empty($_SESSION['utilisateur'])) {
                ?>
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