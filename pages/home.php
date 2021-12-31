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
    <?php

    require  "../kgb/components/header.html";

    ?>

    <h1 class="text-center">Les Missions</h1>


    <section>
        <?php
        require  "../kgb/vue/affichage_acceuil.php";
        require  "../kgb/vue/affichage_agents.php";
        ?>

    </section>

    <script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>

</body>

</html>