<?php

require  "./components/header.php";
require  "./components/loadClasses.php";


$manager = new PlanquesManager();

// affichage des nom de pays dans l'input select
$managerContries = new CountriesManager();
$contries = $managerContries->getCountryName();
// affichage des nom des types de planque dans l'input select
$managerPlanqueTypes = new PlanqueTypesManager();
$planqueTypes = $managerPlanqueTypes->getAll();

if ($_POST) {
    $planque = new Planques($_POST);
    $manager->create($planque);
?>
    <script>
        window.location.href = "../../admin.php"
    </script>
<?php
}
?>

<div class="container">
    <h2 class="text-center">Créer une planque</h2>
    <form method="post">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="form-label">Code : </label>
                <input type="text" class="form-control" id="code" name="code" placeholder="" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Adresse : </label>
                <input type="text" class="form-control" id="adress" name="adress" placeholder="" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Choisir un pays : </label>
                <select name='id_country' class="form-select" aria-label="Default select example" required>
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
                <label for="form-label">Choisir un type : </label>
                <select name='id_type' class="form-select" aria-label="Default select example">
                    <option selected>Choisir votre Type</option>

                    <?php

                    foreach ($planqueTypes as $planqueType) {
                    ?>
                        <option value="<?= $planqueType->getId() ?>"><?= $planqueType->getName() ?></option>
                    <?php
                    }
                    ?>

                </select>
            </div>

            <div>
                <input type="submit" value="Ajouter la planque" class="btn btn-danger">
            </div>
    </form>
</div>

<?php

require  './components/footer.php';

?>