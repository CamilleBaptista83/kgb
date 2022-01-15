<?php

require  "../../header.php";
require  "../../loadClasses.php";


$manager = new MissionsManager();
$mission = $manager->getById($_GET['id_mission']);

$managerCibles = new CiblesManager();
$cibles = $managerCibles->getId_countries($_GET['id_mission']);

// agent principaux
$managerAgents = new AgentsManager();
$agentsPincipaux = $managerAgents->getAgentsListForAddMissionAndSpeciliality($cibles, $mission->getId_speciality());
$managerAgents = new AgentsManager();
$agents = $managerAgents->getAgentsListForAddMission($cibles);
$managerContacts = new ContactsManager();
$contacts = $managerContacts->getContactsListForAddMission($mission->getId_country());
$managerPlanques = new PlanquesManager();
$planques = $managerPlanques->getPlanquesListForAddMission($mission->getId_country());

if ($_POST) {
    if (isset($_POST['submit'])) {
        if (!empty($_POST['agent_id_uuid']) && !empty($_POST['contact_id_uuid']) && !empty($_POST['id'])) {
            foreach ($_POST['agent_id_uuid'] as $value) {
                $data = array(
                    'mission_id_uuid' => $mission->getMission_id_uuid(),
                    'agent_id_uuid' => $value
                );
                var_dump($data);
                $agents = new Agents($data);
                $managerAgents->asignAgentToMission($agents);
            }
            foreach ($_POST['contact_id_uuid'] as $value) {
                $data = array(
                    'mission_id_uuid' => $mission->getMission_id_uuid(),
                    'contact_id_uuid' => $value
                );
                $contacts = new Contacts($data);
                $managerContacts->asignContactsToMission($contacts);
            }
            foreach ($_POST['id'] as $value) {
                $data = array(
                    'mission_id_uuid' => $mission->getMission_id_uuid(),
                    'id' => $value
                );
                $planques = new Planques($data);
                $managerPlanques->asignPlanquesToMission($planques);
            }
            echo '<script>window.location.href="../../admin.php"</script>';

        }
    }else{
        $mission = $manager->delete($mission->getMission_id_uuid());
        echo '<script>window.location.href="../../admin.php"</script>';
    }

}
?>

<script>
    $(document).ready(function() {
        $('#checkBtn').click(function() {
            checked = $("input[type=checkbox]:checked").length;

            if (!checked) {
                alert("You must check at least one checkbox.");
                return false;
            }

        });
    });
</script>

<div class="container">
    <h2 class="text-center m-5">Ajouter à la mission <?= $mission->getCode_name() ?></h2>
    <form method="post">
        <div class="row">
            <div class="form-group col-sm-6 p-1">
                <h2>Agents :</h2>

                <p>Agent Principal : (contenant la spécialité requise pour la mission)</p>
                <?php

                foreach ($agentsPincipaux as $agentPincipal) {
                ?>
                    <div class="form-check">
                        <input name='agent_id_uuid[]' class="form-check-input" type="radio" value="<?= $agentPincipal->getAgent_id_uuid() ?>" required id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <?= $agentPincipal->getLast_name() ?>
                        </label>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="form-group col-sm-6 p-1">

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


            <div class="form-group col-sm-6 p-1">
                <h2>Contacts :</h2>
                <?php

                foreach ($contacts as $contact) {
                ?>
                    <div class="form-check">
                        <input name='contact_id_uuid[]' class="form-check-input" type="radio" value="<?= $contact->getContact_id_uuid() ?>" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <?= $contact->getLast_name() ?>
                        </label>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="form-group col-sm-6 p-1">
                <h2>Planques :</h2>
                <?php

                foreach ($planques as $planque) {
                ?>
                    <div class="form-check">
                        <input name='id[]' class="form-check-input" type="radio" value="<?= $planque->getId() ?>" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <?= $planque->getCode() ?>
                            <?= $planque->getAdress() ?>
                            <?= $planque->getId_type() ?>
                        </label>
                    </div>
                <?php
                }
                ?>
            </div>

            <div>
                <input id="checkBtn" type="submit" name="submit" value="Ajouter l'Agent a la Mission" class="btn btn-danger">
            </div>

            <div>
                <input type="submit" name="delete" value="Annuler la missions" class="btn btn-danger">
            </div>


        </div>
    </form>
</div>

<?php

require  '../../footer.php';

?>