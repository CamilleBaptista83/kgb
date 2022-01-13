<?php
session_start();

if (isset($_SESSION['last_name'])) {

    require  $_SERVER['DOCUMENT_ROOT'] . "/kgb/components/header.php";
    require  $_SERVER['DOCUMENT_ROOT'] . "/kgb/components/loadClasses.php";

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

    <a href="/kgb/admin/logOut.php">Se déconnecter</a>


    <div class="container">


        <h1 class="text-center m-4">Bienvenue Agent <?= $_SESSION['last_name'] ?></h1>

        <nav class="nav nav-pills flex-column flex-sm-row">
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
                        require "../kgb/vue/affichage_agents.php";
                    }
                    ?>
                    <div class="col-6 col-sm-4 col-md-3 p-2">

                        <div style="width: 18rem; height:25rem">
                            <div class="card-body">
                                <a href="./actions/agents/createAgent.php"><img src="https://img.icons8.com/ios/50/5f0b0e/add-administrator.png" /></a>
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
                        require "../kgb/vue/affichage_cibles.php";
                    }
                    ?>
                    <div class="col-6 col-sm-4 col-md-3 p-2">
                        <div style="width: 18rem; height:25rem">
                            <div class="card-body">
                                <a href="./actions/cibles/createCibles.php"><img src="https://img.icons8.com/ios/50/5f0b0e/add-administrator.png" /></a>
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
                        require "../kgb/vue/affichage_contacts.php";
                    }
                    ?>

                    <div class="col-6 col-sm-4 col-md-3 p-2">
                        <div style="width: 18rem;">
                            <div class="card-body">
                                <a href="./actions/contacts/createContact.php"><img src="https://img.icons8.com/ios/50/5f0b0e/add-administrator.png" /></a>
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
                        require "../kgb/vue/affichage_planques.php";
                    }
                    ?>

                    <div class="col-6 col-sm-4 col-md-3 p-2">
                        <div style="width: 18rem; height:25rem">
                            <div class="card-body">
                                <a href="./actions/planques/createPlanques.php" class="btn btn-danger">Ajouter une planques</a>
                            </div>
                        </div>
                    </div>
                </div>

            </article>

            <!-- MISSIONS -->

            <article id="missions">

                <h2 class="text-center m-4">MISSIONS</h2>

                <?php
                foreach ($missions as $mission) {
                    require "../kgb/vue/affichage_missions.php";
                }
                ?>
                <div class="col-6 col-sm-4 col-md-3 p-2">
                    <div style="width: 18rem; height:25rem">
                        <div class="card-body">
                            <a href="./actions/missions/createMission.php" class="btn btn-danger">Ajouter une Mission</a>
                        </div>
                    </div>
                </div>

            </article>
        </section>
    </div>




<?php
    require  $_SERVER['DOCUMENT_ROOT'] . '/kgb/components/footer.php';
} else {
    echo 'Vous ne devez pas être là';
}
?>