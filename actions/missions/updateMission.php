<?php

require  $_SERVER['DOCUMENT_ROOT'] . "/kgb/components/header.php";
require  $_SERVER['DOCUMENT_ROOT'] . "/kgb/components/loadClasses.php";


$manager = new MissionsManager();
$mission = $manager->getById($_GET['id']);

$managerMissionType = new MissionTypesManager();
$missionTypes = $managerMissionType->getAll();

$managerContries = new CountriesManager();
$contries = $managerContries->getCountryName();

$managerMissionStatut = new MissionStatutsManager();
$statuts = $managerMissionStatut->getAll();

$managerSpeciality = new SpecialityManager();
$specialities = $managerSpeciality->getSpecialitiesName();

if ($_POST) {
    $mission->hydrate($_POST);
    $manager->update($mission);

    echo '<script>window.location.href="../../admin.php"</script>';
}
?>

<div class="container">
    <h2 class="text-center">Modifier la mission <?= $mission->getMission_id_uuid() ?></h2>
    <form method="post">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="form-label">Titre : </label>
                <input type="text" class="form-control" id="title" name="title" value="<?= $mission->getTitle() ?>" required>
            </div>

            <label for="exampleFormControlTextarea1" class="form-label">Description : </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" id="description" name="description"><?= $mission->getDescription() ?></textarea>


            <div class="form-group col-sm-6">
                <label for="form-label">Nom de Code : </label>
                <input type="text" class="form-control" id="code_name" name="code_name" value="<?= $mission->getCode_name() ?>" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Date de départ : </label>
                <input type="date" class="form-control" id="start" name="start" value="<?= $mission->getStart() ?>" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Date de fin : </label>
                <input type="date" class="form-control" id="end" name="end" value="<?= $mission->getEnd() ?>" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Choisir un type de mission : </label>
                <select name='id_type' class="form-select" aria-label="Default select example">
                    <option value="<?= $mission->getId_type() ?>" selected><?= $mission->getMission_type_name() ?></option>

                    <?php

                    foreach ($missionTypes as $missionType) {
                    ?>
                        <option value="<?= $missionType->getId() ?>"><?= $missionType->getName() ?></option>
                    <?php
                    }
                    ?>

                </select>
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Choisir un pays : </label>
                <select name='id_country' class="form-select" aria-label="Default select example">
                    <option value="<?= $mission->getId_country() ?>" selected><?= $mission->getCountry_name() ?></option>

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
                <label for="form-label">Choisir un statut : </label>
                <select name='id_statut' class="form-select" aria-label="Default select example">
                    <option value="<?= $mission->getId_statut() ?>" selected><?= $mission->getMission_statut_name() ?></option>

                    <?php

                    foreach ($statuts as $statut) {
                    ?>
                        <option value="<?= $statut->getId() ?>"><?= $statut->getName() ?></option>
                    <?php
                    }
                    ?>

                </select>
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Choisir une spécialité : </label>
                <select name='id_speciality' class="form-select" aria-label="Default select example">
                    <option value="<?= $mission->getId_speciality() ?>" selected><?= $mission->getSpeciality_name() ?></option>

                    <?php

                    foreach ($specialities as $speciality) {
                    ?>
                        <option value="<?= $speciality->getId() ?>"><?= $speciality->getSpe_name() ?></option>
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

require  $_SERVER['DOCUMENT_ROOT'] . '/kgb/components/footer.php';

?>