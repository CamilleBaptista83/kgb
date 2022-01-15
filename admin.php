<?php
session_start();

if (isset($_SESSION['last_name'])) {

    require  "header.php";
    require  "loadClasses.php";

    $manager = new AgentsManager();
    $agents = $manager->getAll();

    $manager = new CiblesManager();
    $cibles = $manager->getAll();

    $manager = new ContactsManager();
    $contacts = $manager->getAll();

    $managerPlanques = new PlanquesManager();
    $planques = $managerPlanques->getAll();

    $managerMission = new MissionsManager();
    $missions = $managerMission->getAll();

?>

    <div class="container">
        <button class="btn logOut"><a href="logOut.php">Se déconnecter</a></button>

        <h1 class="text-center m-4">Bienvenue Agent <?= $_SESSION['last_name'] ?></h1>

        <nav class="nav nav-pills flex-column flex-sm-row navigation_admin">
            <a class="flex-sm-fill text-sm-center nav-link" href="#" onclick="show();">Tous</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="#" onclick="divVisibility('agents');">Agents</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="#" onclick="divVisibility('cibles');">Cibles</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="#" onclick="divVisibility('contacts');">Contacts</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="#" onclick="divVisibility('planques');">Planques</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="#" onclick="divVisibility('missions');">Missions</a>
        </nav>

        <section id="all">
            <!-- AGENTS -->

            <article id="agents">

                <h2 class="text-center m-4">AGENTS</h2>

                <div class="card-group">

                    <?php
                    // affichage agents
                    foreach ($agents as $agent) {
                        require "vue/affichage_agents.php"; ?>

                        <div class="actions">
                            <a href="actions/agents/updateAgents.php?id=<?= $agent->getAgent_id_uuid() ?>"><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/30/000000/external-edit-interface-kiranshastry-solid-kiranshastry-2.png" /></a>
                            <a onclick="deleteAjax('<?= $agent->getAgent_id_uuid(); ?>', '<?= $agent->getIdentification_code() ?>', 'actions/agents/deleteAgents.php')"><img src="https://img.icons8.com/ios-glyphs/30/000000/filled-trash.png" /></a>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="col-6 col-sm-4 col-md-3 p-2">

                        <div style="width: 18rem; height:25rem">
                            <div class="card-body">
                                <a href="actions/agents/createAgent.php"><img src="https://img.icons8.com/ios/50/5f0b0e/add-administrator.png" /></a>
                            </div>
                        </div>
                    </div>
                </div>

            </article>


            <!-- CIBLES -->

            <article id="cibles">

                <h2 class="text-center m-4">CIBLES</h2>

                <div class="card-group">

                    <?php
                    foreach ($cibles as $cible) {
                        require "vue/affichage_cibles.php";
                    ?>
                        <div class="actions">
                            <a href="actions/cibles/updateCibles.php?id=<?= $cible->getTarget_id_uuid() ?>"><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/30/000000/external-edit-interface-kiranshastry-solid-kiranshastry-2.png" /></a>
                            <a onclick="deleteAjax('<?= $cible->getTarget_id_uuid(); ?>', '<?= $cible->getCode_name() ?>', 'actions/cibles/deleteCibles.php')"><img src="https://img.icons8.com/ios-glyphs/30/000000/filled-trash.png" /></a>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="col-6 col-sm-4 col-md-3 p-2">
                        <div style="width: 18rem; height:25rem">
                            <div class="card-body">
                                <a href="actions/cibles/createCibles.php"><img src="https://img.icons8.com/ios/50/5f0b0e/add-administrator.png" /></a>
                            </div>
                        </div>
                    </div>
                </div>

            </article>

            <!-- CONTACTS -->

            <article id="contacts">

                <h2 class="text-center m-4">CONTACTS</h2>

                <div class="card-group contacts">
                    <?php
                    foreach ($contacts as $contact) {
                        require "vue/affichage_contacts.php";
                    ?>
                        <div class="actions">
                            <a href="actions/contacts/updateContact.php?id=<?= $contact->getContact_id_uuid() ?>"><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/30/000000/external-edit-interface-kiranshastry-solid-kiranshastry-2.png" /></a>
                            <a onclick="deleteAjax('<?= $contact->getContact_id_uuid(); ?>', '<?= $contact->getCode_name() ?>', 'actions/contacts/deleteContact.php')"><img src="https://img.icons8.com/ios-glyphs/30/000000/filled-trash.png" /></a>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="col-6 col-sm-4 col-md-3 p-2">
                        <div style="width: 18rem;">
                            <div class="card-body">
                                <a href="actions/contacts/createContact.php"><img src="https://img.icons8.com/ios/50/5f0b0e/add-administrator.png" /></a>
                            </div>
                        </div>
                    </div>

                </div>

            </article>

            <!-- PLANQUES -->

            <article id="planques">

                <h2 class="text-center m-4">PLANQUES</h2>

                <div class="card-group planques">
                    <?php
                    foreach ($planques as $planque) {
                        require "vue/affichage_planques.php";
                    ?>
                        <div class="actions">
                            <a href="actions/planques/updatePlanques.php?id=<?= $planque->getId() ?>"><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/30/000000/external-edit-interface-kiranshastry-solid-kiranshastry-2.png" /></a>
                            <a onclick="deleteAjax('<?= $planque->getId(); ?>', '<?= $planque->getCode() ?>', 'actions/planques/deletePlanques.php')"><img src="https://img.icons8.com/ios-glyphs/30/000000/filled-trash.png" /></a>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="col-6 col-sm-4 col-md-3 p-2">
                        <div style="width: 18rem; height:25rem">
                            <div class="card-body">
                                <a href="actions/planques/createPlanques.php" class="btn btn-danger">Ajouter une planques</a>
                            </div>
                        </div>
                    </div>
                </div>

            </article>

            <!-- MISSIONS -->

            <article id="missions">

                <h2 class="text-center m-4">MISSIONS</h2>

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
                <div class="col-6 col-sm-4 col-md-3 p-2">
                    <div style="width: 18rem; height:25rem">
                        <div class="card-body">
                            <a href="actions/missions/createMission.php" class="btn btn-danger">Ajouter une Mission</a>
                        </div>
                    </div>
                </div>

            </article>

        </section>
    </div>

<?php
    require  'footer.php';
} else {
    echo 'Vous ne devez pas être là';
}
?>