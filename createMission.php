<?php

require  "./components/header.php";
require  "./components/loadClasses.php";


$manager = new MissionsManager();

$managerMissionType = new MissionTypesManager();
$missionTypes = $managerMissionType->getAll();

$managerContries = new CountriesManager();
$contries = $managerContries->getCountryName();

$managerMissionStatut = new MissionStatutsManager();
$statuts = $managerMissionStatut->getAll();

$managerSpeciality = new SpecialityManager();
$specialities = $managerSpeciality->getSpecialitiesName();


if ($_POST) {
    $mission = new Missions($_POST);
    $manager->create($mission);

    ?>
    <script>
    window.location.href="./addCiblesToMission.php?code_name=<?=$_POST['code_name']?>"
    </script>
    <?php

}
?>

<div class="container">
    <h2 class="text-center">Créer une Mission</h2>
    <form method="post">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="form-label">Titre : </label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <label for="exampleFormControlTextarea1" class="form-label">Description : </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" id="description" name="description"></textarea>


            <div class="form-group col-sm-6">
                <label for="form-label">Nom de Code : </label>
                <input type="text" class="form-control" id="code_name" name="code_name" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Date de départ : </label>
                <input type="date" class="form-control" id="start" name="start" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Date de fin : </label>
                <input type="date" class="form-control" id="end" name="end">
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Choisir un type de mission : </label>
                <select name='id_type' class="form-select" aria-label="Default select example">
                    <option selected>Choisir votre type</option>

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
                <label for="form-label">Choisir un statut : </label>
                <select name='id_statut' class="form-select" aria-label="Default select example">
                    <option selected>Choisir votre statut</option>

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
                    <option selected>Choisir votre spécialité</option>

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
                <input type="submit" value="Créer la Mission" class="btn btn-danger">
            </div>
        </div>
    </form>
</div>

<?php

require  './components/footer.php';

?>