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

    require  "../kgb/pages/header.html";

    ?>

    <section>


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

                <h1 class="text-center">Les Missions</h1>

                <?php
                while ($donnees = $req->fetch()) {
                ?>

                    <tr>
                        <th scope="row"><?php echo $donnees['admin_id_uuid']; ?></th>
                        <td><?php echo $donnees['first_name']; ?></td>
                        <td><?php echo $donnees['last_name']; ?></td>
                        <td><?php echo $donnees['email']; ?></td>
                        <td><?php echo $donnees['password']; ?></td>
                        <td><?php echo $donnees['creation_date']; ?></td>
                    </tr>

                <?php
                } // Fin de la boucle des billets
                $req->closeCursor();
                ?>
            </tbody>
        </table>

    </section>

    <script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>

</body>

</html>