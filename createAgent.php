<?php

require './components/header.php';
require  "./components/loadClasses.php";


$manager = new AgentsManager();

// affichage des nom de pays dans l'input select
$managerContries = new CountriesManager();
$contries = $managerContries->getCountryName();

// affichage des nom des spécialités dans l'input check
$managerSpecialities = new SpecialityManager();
$specialities = $managerSpecialities->getSpecialitiesName();


if ($_POST) {
    $agent = new Agents($_POST);
    $manager->create($agent);

    $specialities = new Speciality($_POST);
    $managerSpecialities->create($specialities);

    //echo '<script>window.location.href="../kgb/createAgentSpecialities.php"</script>';
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
            </div>

            <div class="form-group col-sm-6">
                <h2>Spécilaités</h2>

                <?php

                foreach ($specialities as $speciality) {
                ?>
                    <input name="id_speciality" class="form-check-input" type="checkbox" value="<?= $speciality->getId() ?>" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <?= $speciality->getSpe_name() ?>
                    </label>
                <?php
                }
                ?>
            </div>

            <div>
                <input type="submit" value="Ajouter l'agent" class="btn btn-danger">
            </div>
    </form>
</div>

<?php

require('./components/footer.php');

?>