<?php

require('./components/header.php');
require  "./components/loadClasses.php";


$managerAgent = new AgentsManager();
$agent = $managerAgent->getById($_GET['id']);

if ($_POST) {
    $agent->hydrate($_POST);
    $managerAgent->update($agent);

    echo '<script>window.location.href="../kgb/index.php"</script>';
}
?>

<div class="container">
    <h2 class="text-center">Modifier l'agent <?= $agent->getIdentification_code() ?></h2>
    <form action="" method="POST">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="first-name">Prénom : </label>
                <input type="text" class="form-control" id="first-name" name="first-name" value="<?= $agent->getFirst_name() ?>" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="last-name">Nom : </label>
                <input type="text" class="form-control" id="last-name" name="last-name" value="<?= $agent->getLast_name() ?>" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="birth_date">Date de Naissance : </label>
                <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?= $agent->getBirth_date() ?>" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="birth_date">Pays : </label>
                <input type="text" class="form-control" id="birth_date" name="birth_date" value="<?= $agent->getId_country() ?>" required>
            </div>
            <div class="form-group">
                <p>Spécialités :</p>

                <?php
                $managerSpe = new SpecialityManager();

                $specialities = $managerSpe->getSpecialitiesName();

                foreach ($specialities as $speciality) {
                ?>
                    <label for="<?= $speciality->getSpe_name() ?>"><?= $speciality->getSpe_name() ?></label>
                    <input type="checkbox" name="<?= $speciality->getId() ?>" id="<?= $speciality->getSpe_name() ?>"></input> <br>
                <?php
                }
                ?>

            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <input type="submit" value="Modifier l'Agent" class="btn btn-danger">
            </div>
        </div>
    </form>
</div>

<?php

require('./components/footer.php');


$manager = new AgentsManager();
$agents = $manager->getById($_GET['id']);

if ($_POST) {
}
?>