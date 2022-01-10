<?php

require  $_SERVER['DOCUMENT_ROOT']."/kgb/components/header.php";
require  $_SERVER['DOCUMENT_ROOT']."/kgb/components/loadClasses.php";


$manager = new MissionsManager();
$mission = $manager->getByCode($_GET['code_name']);

// agent principaux
$managerAgents = new AgentsManager();
$agentsPincipaux = $managerAgents->getAgentsListForAddMissionAndSpeciliality($mission->getId_country(), $mission->getId_speciality());
$managerAgents = new AgentsManager();
$agents = $managerAgents->getAgentsListForAddMission($mission->getId_country(), $mission->getId_speciality());

if ($_POST) {
    if (!empty($_POST['id'])) {
        foreach ($_POST['id'] as $value) {
            $data = array('id' => $value, 'agent_id_uuid' => $mission->getMission_id_uuid());
            $agents = new Speciality($data);
            var_dump($agents);
            //$manageragents->create($agents);
            echo '<script>window.location.href="../../admin.php"</script>';
        }
    }
}
?>

<div class="container">
    <h2 class="text-center m-5">Ajouter à la mission  <?= $mission->getCode_name() ?></h2>
    <form method="post">
        <div class="row">
            <div class="form-group col-sm-6">
                <h2>Agents :</h2>

                <p>Agent Principal :</p>
                <?php

                foreach ($agentsPincipaux as $agentPincipal) {
                ?>
                    <div class="form-check">
                        <input name='agent_id_uuid[]' class="form-check-input" type="radio" value="<?= $agentPincipal->getAgent_id_uuid() ?>" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <?= $agentPincipal->getLast_name() ?>
                        </label>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="form-group col-sm-6">

                <p>Agent Secondaire :</p>
                <?php

                foreach ($agents as $agent) {
                ?>
                    <div class="form-check">
                        <input name='agent_id_uuid[]' class="form-check-input" type="checkbox" value="<?= $agent->getAgent_id_uuid() ?>" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <?= $agent->getLast_name() ?>
                        </label>
                    </div>
                <?php
                }
                ?>
            </div>

            <div>
                <input type="submit" value="Modifier l'Agent" class="btn btn-danger">
            </div>
        </div>
    </form>
</div>

<?php

require  $_SERVER['DOCUMENT_ROOT'].'/kgb/components/footer.php';

?>