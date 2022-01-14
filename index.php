<?php

session_start();

require  "header.php";
require  "loadClasses.php";
?>

<main>
    <?php

    echo $_SERVER['DOCUMENT_ROOT'];

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
            require "vue/affichage_missions.php";
        }
        ?>
    </div>

</main>

<?php
require  'footer.php';
?>