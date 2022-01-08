<?php

require  $_SERVER['DOCUMENT_ROOT'] . "/kgb/components/header.php";
require  $_SERVER['DOCUMENT_ROOT'] . "/kgb/components/loadClasses.php";


$manager = new MissionsManager();
$mission = $manager->getById($_GET['id']);

$managerAgents = new AgentsManager();
$agent = $managerAgents->getByMission($_GET['id']);
?>

<div class="container">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= $mission->getTitle() ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $mission->getCode_name() ?></h6>
            <p class="card-text"><?= $mission->getDescription() ?></p>
            <p class="card-text"><small class="text-muted"><?= $mission->getStart() ?> - <?= $mission->getEnd() ?></small></p>
        </div>
    </div>

    <table class="table">
        <tbody>
            <tr>
                <td>Type de Mission</td>
                <td><?= $mission->getMission_type_name() ?></td>
            </tr>
            <tr>
                <td>Pays de la Mission</td>
                <td><?= $mission->getCountry_name() ?></td>
            </tr>
            <tr>
                <td>Spécialité de la Mission</td>
                <td><?= $mission->getSpeciality_name() ?></td>
            </tr>
            <tr>
                <td>Statut de la Mission</td>
                <td><?= $mission->getMission_statut_name() ?></td>
            </tr>
        </tbody>
    </table>

    <?php
    require "./affichage_agents.php";
    ?>

    <a href="../kgb/actions/missions/updateMission.php?id=<?= $mission->getMission_id_uuid() ?>" class="btn btn-danger">Edit</a>
    <a href="../kgb/actions/missions/deleteMission.php?id=<?= $mission->getMission_id_uuid() ?>" class="btn btn-danger">Delete</a>


</div>

<?php

require  $_SERVER['DOCUMENT_ROOT'] . '/kgb/components/footer.php';

?>