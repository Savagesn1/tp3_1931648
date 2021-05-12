<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$adresseCourante = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$estSurServeurTim = strpos($adresseCourante, 'tim.cgmatane.qc.ca') !== false ? true : false;

if ($estSurServeurTim) {
    $usager = 'tim_lebretonbms';
    $motdepasse = '2943fgMMH3';
    $hote = 'tim.cgmatane.qc.ca';
    $base = 'tim_lebretonbms';
} else {
    $usager = 'root';
    $motdepasse = 'Brandonsn1';
    $hote = 'localhost';
    $base = 'tp3-1931648';
}
$dsn = 'mysql:dbname=' . $base . ';host=' . $hote;
$dbh = new PDO($dsn, $usager, $motdepasse);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->exec('SET CHARACTER SET UTF8');

return $dbh;
