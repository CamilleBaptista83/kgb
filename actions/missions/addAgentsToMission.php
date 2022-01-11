<?php

require  $_SERVER['DOCUMENT_ROOT'] . "/kgb/components/header.php";
require  $_SERVER['DOCUMENT_ROOT'] . "/kgb/components/loadClasses.php";


$manager = new MissionsManager();
$mission = $manager->getByCode($_GET['code_name']);

// agent principaux
$managerAgents = new AgentsManager();
$agentsPincipaux = $managerAgents->getAgentsListForAddMissionAndSpeciliality($mission->getId_country(), $mission->getId_speciality());
$managerAgents = new AgentsManager();
$agents = $managerAgents->getAgentsListForAddMission($mission->getId_country(), $mission->getId_speciality());
$managerCibles = new CiblesManager();
$cibles = $managerCibles->getCiblesListForAddMission($mission->getId_country());
$managerContacts = new ContactsManager();
$contacts = $managerContacts->getContactsListForAddMission($mission->getId_country());

if ($_POST) {
    if (!empty($_POST['agent_id_uuid']) && !empty($_POST['target_id_uuid']) && !empty($_POST['contact_id_uuid'])) {
        foreach ($_POST['agent_id_uuid'] as $value) {
            $data = array(
                'mission_id_uuid' => $mission->getMission_id_uuid(),
                'agent_id_uuid' => $value
            );
            $agents = new Agents($data);
            $managerAgents->asignAgentToMission($agents);
        }
        foreach ($_POST['target_id_uuid'] as $value) {
            $data = array(
                'mission_id_uuid' => $mission->getMission_id_uuid(),
                'target_id_uuid' => $value
            );
            $cibles = new Cibles($data);
            $managerCibles->asignCiblesToMission($cibles);
        }
        foreach ($_POST['contact_id_uuid'] as $value) {
            $data = array(
                'mission_id_uuid' => $mission->getMission_id_uuid(),
                'contact_id_uuid' => $value
            );
            $contacts = new Contacts($data);
            $managerContacts->asignContactsToMission($contacts);
        }
        //echo '<script>window.location.href="../../admin.php"</script>';

    }
}
?>

<div class="container">
    <h2 class="text-center m-5">Ajouter à la mission <?= $mission->getCode_name() ?></h2>
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

            <div class="form-group col-sm-6">
                <h2>Cibles :</h2>
                <?php

                foreach ($cibles as $cible) {
                ?>
                    <div class="form-check">
                        <input name='target_id_uuid[]' class="form-check-input" type="radio" value="<?= $cible->getTarget_id_uuid() ?>" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <?= $cible->getLast_name() ?>
                        </label>
                    </div>
                <?php
                }
                ?>
            </div>


            <div class="form-group col-sm-6">
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

            <div>
                <input type="submit" value="Ajouter l'Agent a la Mission" class="btn btn-danger">
            </div>
        </div>
    </form>
</div>

<?php

require  $_SERVER['DOCUMENT_ROOT'] . '/kgb/components/footer.php';

?>