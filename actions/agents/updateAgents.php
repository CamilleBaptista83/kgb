<?php

require  $_SERVER['DOCUMENT_ROOT']."/kgb/components/header.php";
require  $_SERVER['DOCUMENT_ROOT']."/kgb/components/loadClasses.php";


$manager = new AgentsManager();
$agent = $manager->getById($_GET['id']);

$managerContries = new CountriesManager();
$contries = $managerContries->getCountryName();

if ($_POST) {
    $agent->hydrate($_POST);

    $manager->update($agent);

    echo '<script>window.location.href="../../index.php"</script>';
}
?>

<div class="container">
    <h2 class="text-center">Modifier l'agent <?= $agent->getIdentification_code() ?></h2>
    <form method="post">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="form-label">Code d'didentification : </label>
                <input type="text" class="form-control" id="identification_code" name="identification_code" value="<?= $agent->getIdentification_code() ?>" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Prénom : </label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $agent->getFirst_name() ?>" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="form-label">Nom : </label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $agent->getLast_name() ?>" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Date de Naissance : </label>
                <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?= $agent->getBirth_date() ?>" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="form-label">Choisir un pays : </label>
                <select name='id_country' class="form-select" aria-label="Default select example">
                    <option value="<?= $agent->getId_country() ?>" selected><?= $agent->getName() ?></option>

                    <?php

                    foreach ($contries as $country) {
                    ?>
                        <option value="<?= $country->getId() ?>"><?= $country->getName() ?></option>
                    <?php
                    }
                    ?>

                </select>
            </div>

            <div>
                <input type="submit" value="Modifier l'Agent" class="btn btn-danger">
            </div>
        </div>
    </form>
</div>

<?php

require  $_SERVER['DOCUMENT_ROOT'].'/kgb/components/footer.php';

?>