<?php

session_start();

require  "header.php";
require  "loadClasses.php";
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
        foreach ($missions as $mission) { ?>
            <div class="card m-5">
                <div class="card-body">
                    <?php
                    require "vue/affichage_missions.php";
                    ?>
                    <a href="details_mission.php?id=<?= $mission->getMission_id_uuid() ?>" class="btn btn-danger">En Savoir Plus</a>
                </div>
            </div>

        <?php
        }
        ?>
    </div>

</main>

<?php
require  'footer.php';
?>