<?php
require  "../kgb/components/header.php";
require  "../kgb/components/loadClasses.php";
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

            <a href="../kgb/createAgent.php" class="btn btn-danger">Ajouter un agent</a>

            <?php

            // CIBLES

            // creation d'un nouvel obj
            $manager = new CiblesManager();
            // appel de la fonction get all pour récupérer les données
            $cibles = $manager->getAll();
            ?>

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


            <?php

            // CONTACTS

            // creation d'un nouvel obj
            $manager = new ContactsManager();
            // appel de la fonction get all pour récupérer les données
            $contacts = $manager->getAll();
            ?>

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

        </div>

    </section>
</main>

<?php
require  "../kgb/components/footer.php";
?>