<?php

if (getenv('JAWSDB_URL') !== false) {
    $dbparts = parse_url(getenv('JAWSDB_URL'));

    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'], '/');
} else {
    $hostname = 'localhost';
    $username = 'kgb_admin';
    $password = 'vladimirovitch';
    $database = 'kgb';
}

try {
    $this->setPdo(new PDO('mysql:host=' . $hostname . ';dbname=' . $database . ';charset=utf8', $username, $password));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
session_start();

require  $_SERVER['DOCUMENT_ROOT'] . "/kgb/components/header.php";
require  $_SERVER['DOCUMENT_ROOT'] . "/kgb/components/loadClasses.php";
?>

<main>
    <?php

    // MISSIONS

    // creation d'un nouvel obj
    $managerMission = new MissionsManager();
    // appel de la fonction get all pour récupérer les données
    $missions = $managerMission->getAll();
    ?>
    <div class="container">
        <h1 class="text-center">Les Missions</h1>

        <?php
        foreach ($missions as $mission) {
            require "../kgb/vue/affichage_missions.php";
        }
        ?>
    </div>

</main>

<?php
require  $_SERVER['DOCUMENT_ROOT'] . '/kgb/components/footer.php';
?>