<?php

session_start();

// Détruire la session courante.
session_destroy();

// Redirigez l'utilisateur vers la page d'accueil du site.
header('location: ../index.php');

exit;
