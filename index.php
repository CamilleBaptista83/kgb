<?php

try {
    $kgb_bdd = new PDO('mysql:host=localhost;dbname=kgb;charset=utf8', 'kgb_admin', 'vladimirovitch');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$req = $kgb_bdd->query('SELECT * FROM dt_admin');

require  "pages/affichage_acceuil.php";

?>