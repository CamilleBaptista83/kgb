<?php

session_start();

require  "./components/header.php";
require  "./components/loadClasses.php";
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
require  './components/footer.php';
?>