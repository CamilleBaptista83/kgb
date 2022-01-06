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

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // affichage agents
                    foreach ($agents as $agent) {
                        require "../kgb/vue/affichage_agents.php";
                    }
                    ?>

                </tbody>
            </table>

            <a href="./actions/agents/createAgent.php" class="btn btn-danger">Ajouter un agent</a>

            <?php

            // CIBLES

            // creation d'un nouvel obj
            $manager = new CiblesManager();
            // appel de la fonction get all pour récupérer les données
            $cibles = $manager->getAll();
            ?>

            <h2>CIBLES</h2>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($cibles as $cible) {
                        require "../kgb/vue/affichage_cibles.php";
                    }
                    ?>
                </tbody>
            </table>

            <a href="./actions/cibles/createCibles.php" class="btn btn-danger">Ajouter une Cible</a>



            <?php

            // CONTACTS

            // creation d'un nouvel obj
            $manager = new ContactsManager();
            // appel de la fonction get all pour récupérer les données
            $contacts = $manager->getAll();
            ?>

            <h2>CONTACTS</h2>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($contacts as $contact) {
                        require "../kgb/vue/affichage_contacts.php";
                    }
                    ?>
                </tbody>
            </table>

            <a href="./actions/contacts/createContact.php" class="btn btn-danger">Ajouter un Contact</a>



            <?php

            // PLANQUES

            // creation d'un nouvel obj
            $manager = new PlanquesManager();
            // appel de la fonction get all pour récupérer les données
            $planques = $manager->getAll();
            ?>

            <h2>PLANQUES</h2>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($planques as $planque) {
                        require "../kgb/vue/affichage_planques.php";
                    }
                    ?>
                </tbody>
            </table>

            <a href="./actions/planques/createPlanques.php" class="btn btn-danger">Ajouter une planques</a>


            <?php

            // MISSIONS

            // creation d'un nouvel obj
            $managerMission = new MissionsManager();
            // appel de la fonction get all pour récupérer les données
            $missions = $managerMission->getAll();
            ?>

            <h2>MISSIONS</h2>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($missions as $mission) {
                        require "../kgb/vue/affichage_missions.php";
                    }
                    ?>
                </tbody>
            </table>

            <a href="./actions/missions/createMission.php" class="btn btn-danger">Ajouter une Mission</a>


        </div>

    </section>
</main>

<?php
require  $_SERVER['DOCUMENT_ROOT'] . '/kgb/components/footer.php';
?>