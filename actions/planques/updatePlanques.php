<?php

require  $_SERVER['DOCUMENT_ROOT']."/kgb/components/header.php";
require  $_SERVER['DOCUMENT_ROOT']."/kgb/components/loadClasses.php";


$manager = new PlanquesManager();
$planque = $manager->getById($_GET['id']);

$managerContries = new CountriesManager();
$contries = $managerContries->getCountryName();

if ($_POST) {
    $planque->hydrate($_POST);
    $manager->update($planque);

    echo '<script>window.location.href="../kgb/index.php"</script>';
}
?>

<div class="container">
    <h2 class="text-center">Modifier l'planque <?= $planque->getCode() ?></h2>
    <form method="post">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="form-label">Code : </label>
                <input type="text" class="form-control" id="code" name="code" value="<?= $planque->getCode() ?>" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Adresse : </label>
                <input type="text" class="form-control" id="adress" name="adress" value="<?= $planque->getAdress() ?>" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="form-label">Choisir un pays : </label>
                <select name='id_country' class="form-select" aria-label="Default select example">
                    <option value="<?= $planque->getId_country() ?>" selected><?= $planque->getName_country() ?></option>

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
                <input type="submit" value="Modifier le planque" class="btn btn-danger">
            </div>
        </div>
    </form>
</div>

<?php

require  $_SERVER['DOCUMENT_ROOT'].'/kgb/components/footer.php';

?>