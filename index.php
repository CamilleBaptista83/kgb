<?php
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