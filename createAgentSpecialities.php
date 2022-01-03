<?php

require './components/header.php';
require  "./components/loadClasses.php";


$manager = new AgentsManager();
$agent = $manager->getById($_GET['id']);

// affichage des nom des spécialités dans l'input check
$managerSpecialities = new SpecialityManager();
$specialities = $managerSpecialities->getSpecialitiesName();

if ($_POST) {
    $specialities = new Speciality($_POST);
    $managerSpecialities->create($specialities);

    echo '<script>window.location.href="../kgb/index.php"</script>';
}
?>

<div class="container">
    <h2 class="text-center">Ajouter des Spécialités à l'agent <?= $agent->getIdentification_code() ?></h2>
    <form method="post">
        <div class="row">
            <div class="form-group col-sm-6">
                <h2>Spécilaités</h2>

                <?php

                foreach ($specialities as $speciality) {
                ?>
                    <div class="form-check">
                        <input name="id_speciality" class="form-check-input" type="checkbox" value="<?= $speciality->getId() ?>" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <?= $speciality->getSpe_name() ?>
                        </label>
                    </div>
                <?php
                }
                ?>
            </div>

            <div>
                <input type="submit" value="Modifier l'Agent" class="btn btn-danger">
            </div>
        </div>
    </form>
</div>

<?php

require('./components/footer.php');

?>