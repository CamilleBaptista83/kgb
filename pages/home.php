<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Import Bootstrap.css -->
    <link rel="stylesheet" type="text/css" href="./node_modules/bootstrap/dist/css/bootstrap.css">

    <!-- Import Logos -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Import Style.css -->
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>KGB</title>

    <meta name="description" content="Liste des missions du KGB -- Russie">
</head>

<body>
    <main>
        <?php

        require  "../kgb/components/header.html";
        require  "../kgb/components/loadClasses.php";

        ?>

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
    <script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>

</body>

</html>