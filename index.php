<?php

require  $_SERVER['DOCUMENT_ROOT'] . "/kgb/components/header.php";
require  $_SERVER['DOCUMENT_ROOT'] . "/kgb/components/loadClasses.php";
?>

<main>


    <h1 class="text-center">Les Missions</h1>

    <?php

    // MISSIONS

    // creation d'un nouvel obj
    $managerMission = new MissionsManager();
    // appel de la fonction get all pour récupérer les données
    $missions = $managerMission->getAll();
    ?>

    <?php
    foreach ($missions as $mission) {
        require "../kgb/vue/affichage_missions.php";
    }
    ?>


</main>

<?php
require  $_SERVER['DOCUMENT_ROOT'] . '/kgb/components/footer.php';
?>