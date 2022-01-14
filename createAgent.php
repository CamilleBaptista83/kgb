<?php

require  "./header.php";
require  "./loadClasses.php";



$manager = new AgentsManager();

// affichage des nom de pays dans l'input select
$managerContries = new CountriesManager();
$contries = $managerContries->getCountryName();


if ($_POST) {
    $agent = new Agents($_POST);
    $manager->create($agent);
    ?>
    <script>
    window.location.href="./createAgentSpecialities.php?identification_code=<?=$_POST['identification_code'] ?>"
    </script>
    <?php
}
?>

<div class="container">
    <h2 class="text-center">Créer un Agent</h2>
    <form method="post">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="form-label">Code d'didentification : </label>
                <input type="text" class="form-control" id="identification_code" name="identification_code" placeholder="" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Prénom : </label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="form-label">Nom : </label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Date de Naissance : </label>
                <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="form-label">Choisir un pays : </label>
                <select name='id_country' class="form-select" aria-label="Default select example">
                    <option selected>Choisir votre pays</option>

                    <?php

                    foreach ($contries as $country) {
                    ?>
                        <option value="<?= $country->getId() ?>"><?= $country->getName() ?></option>
                    <?php
                    }
                    ?>

                </select>

            <div>
                <input type="submit" value="Ajouter l'agent" class="btn btn-danger">
            </div>
    </form>
</div>

<?php

require  "./footer.php";


?>