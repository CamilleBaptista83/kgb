<?php

require  $_SERVER['DOCUMENT_ROOT']."/kgb/components/header.php";
require  $_SERVER['DOCUMENT_ROOT']."/kgb/components/loadClasses.php";


$manager = new CiblesManager();

// affichage des nom de pays dans l'input select
$managerContries = new CountriesManager();
$contries = $managerContries->getCountryName();


if ($_POST) {
    $cible = new Cibles($_POST);
    $manager->create($cible);
    ?>
    <script>
    window.location.href="../../index.php"
    </script>
    <?php
}
?>

<div class="container">
    <h2 class="text-center">Créer une Cible</h2>
    <form method="post">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="form-label">Nom de Code : </label>
                <input type="text" class="form-control" id="code_name" name="code_name" placeholder="" required>
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
                <input type="submit" value="Ajouter la Cible" class="btn btn-danger">
            </div>
    </form>
</div>

<?php

require  $_SERVER['DOCUMENT_ROOT'].'/kgb/components/footer.php';

?>