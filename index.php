<?php

require  $_SERVER['DOCUMENT_ROOT'] . "/kgb/components/header.php";
require  $_SERVER['DOCUMENT_ROOT'] . "/kgb/components/loadClasses.php";
?>

<main>


    <h1 class="text-center">Les Missions</h1>


    <section>
        <div class="container">

            <?php

            // AGENTS

            // creation d'un nouvel obj
            $manager = new AgentsManager();
            // appel de la fonction get all pour récupérer les données
            $agents = $manager->getAll();

            ?>
            <h2>AGENTS</h2>

            <div class="row">

                <?php
                // affichage agents
                foreach ($agents as $agent) {
                    require "../kgb/vue/affichage_agents.php";
                ?>
                    <a href="../kgb/actions/agents/updateAgents.php?id=<?= $agent->getAgent_id_uuid() ?>" class="btn btn-danger">Edit</a>
                    <a href="../kgb/actions/agents/deleteAgents.php?id=<?= $agent->getAgent_id_uuid() ?>" class="btn btn-danger">Delete</a>
                <?php
                }
                ?>

                <a href="./actions/agents/createAgent.php" class="btn btn-danger">Ajouter un agent</a>
            </div>
            <?php

            // CIBLES

            // creation d'un nouvel obj
            $manager = new CiblesManager();
            // appel de la fonction get all pour récupérer les données
            $cibles = $manager->getAll();
            ?>

            <h2>CIBLES</h2>

            <div class="row">
                <?php
                foreach ($cibles as $cible) {
                    require "../kgb/vue/affichage_cibles.php";
                ?>
                    <a href="../kgb/actions/cibles/updateCibles.php?id=<?= $cible->getTarget_id_uuid() ?>" class="btn btn-danger">Edit</a>
                    <a href="../kgb/actions/cibles/deleteCibles.php?id=<?= $cible->getTarget_id_uuid() ?>" class="btn btn-danger">Delete</a>

                <?php
                }
                ?>

                <a href="./actions/cibles/createCibles.php" class="btn btn-danger">Ajouter une Cible</a>
            </div>


            <?php

            // CONTACTS

            // creation d'un nouvel obj
            $manager = new ContactsManager();
            // appel de la fonction get all pour récupérer les données
            $contacts = $manager->getAll();
            ?>

            <h2>CONTACTS</h2>

            <div class="row">
                <?php
                foreach ($contacts as $contact) {
                    require "../kgb/vue/affichage_contacts.php";
                ?>
                    <a href="../kgb/actions/contacts/updateContact.php?id=<?= $contact->getContact_id_uuid() ?>" class="btn btn-danger">Edit</a>
                    <a href="../kgb/actions/contacts/deleteContact.php?id=<?= $contact->getContact_id_uuid() ?>" class="btn btn-danger">Delete</a>

                <?php
                }
                ?>
                <a href="./actions/contacts/createContact.php" class="btn btn-danger">Ajouter un Contact</a>

            </div>

            <?php

            // PLANQUES

            // creation d'un nouvel obj
            $managerPlanques = new PlanquesManager();
            // appel de la fonction get all pour récupérer les données
            $planques = $managerPlanques->getAll();
            ?>

            <h2>PLANQUES</h2>

            <div class="row">
                <?php
                foreach ($planques as $planque) {
                    require "../kgb/vue/affichage_planques.php";
                ?>
                    <a href="../kgb/actions/planques/updatePlanques.php?id=<?= $planque->getId() ?>" class="btn btn-danger">Edit</a>
                    <a href="../kgb/actions/planques/deletePlanques.php?id=<?= $planque->getId() ?>" class="btn btn-danger">Delete</a>

                <?php
                }
                ?>
            </div>
            <a href="./actions/planques/createPlanques.php" class="btn btn-danger">Ajouter une planques</a>


            <?php

            // MISSIONS

            // creation d'un nouvel obj
            $managerMission = new MissionsManager();
            // appel de la fonction get all pour récupérer les données
            $missions = $managerMission->getAll();
            ?>

            <h2>MISSIONS</h2>

            <?php
            foreach ($missions as $mission) {
                require "../kgb/vue/affichage_missions.php";
            }
            ?>

            <a href="./actions/missions/createMission.php" class="btn btn-danger">Ajouter une Mission</a>


        </div>

    </section>
</main>

<?php
require  $_SERVER['DOCUMENT_ROOT'] . '/kgb/components/footer.php';
?>