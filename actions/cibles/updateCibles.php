<?php

require  $_SERVER['DOCUMENT_ROOT']."/kgb/components/header.php";
require  $_SERVER['DOCUMENT_ROOT']."/kgb/components/loadClasses.php";


$manager = new CiblesManager();
$cible = $manager->getById($_GET['id']);

$managerContries = new CountriesManager();
$contries = $managerContries->getCountryName();

if ($_POST) {
    $cible->hydrate($_POST);
    $manager->update($cible);

    echo '<script>window.location.href="../../admin.php"</script>';
}
?>

<div class="container">
    <h2 class="text-center">Modifier la cible <?= $cible->getCode_name() ?></h2>
    <form method="post">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="form-label">Code d'didentification : </label>
                <input type="text" class="form-control" id="identification_code" name="identification_code" value="<?= $cible->getCode_name() ?>" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Prénom : </label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $cible->getFirst_name() ?>" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="form-label">Nom : </label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $cible->getLast_name() ?>" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Date de Naissance : </label>
                <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?= $cible->getBirth_date() ?>" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="form-label">Choisir un pays : </label>
                <select name='id_country' class="form-select" aria-label="Default select example">
                    <option value="<?= $cible->getId_country() ?>" selected><?= $cible->getName() ?></option>

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
                <input type="submit" value="Modifier la cible" class="btn btn-danger">
            </div>
        </div>
    </form>
</div>

<?php

require  $_SERVER['DOCUMENT_ROOT'].'/kgb/components/footer.php';

?>