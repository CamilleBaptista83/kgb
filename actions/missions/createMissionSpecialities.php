<?php

require  $_SERVER['DOCUMENT_ROOT']."/kgb/components/header.php";
require  $_SERVER['DOCUMENT_ROOT']."/kgb/components/loadClasses.php";


$manager = new AgentsManager();
$agent = $manager->getByCode($_GET['identification_code']);

// affichage des nom des spécialités dans l'input check
$managerSpecialities = new SpecialityManager();
$specialities = $managerSpecialities->getSpecialitiesName();

if ($_POST) {
    if (!empty($_POST['id'])) {
        foreach ($_POST['id'] as $value) {
            $data = array('id' => $value, 'agent_id_uuid' => $agent->getAgent_id_uuid());
            $specialities = new Speciality($data);
            var_dump($specialities);
            $managerSpecialities->create($specialities);
            echo '<script>window.location.href="../../index.php"</script>';
        }
    }
}
?>

<div class="container">
    <h2 class="text-center">Ajouter des Spécialités à l'agent <?= $agent->getIdentification_code() ?></h2>
    <form method="post">
        <div class="row">
            <div class="form-group col-sm-6">
                <h2>Spécialités :</h2>
                <?php

                foreach ($specialities as $speciality) {
                ?>
                    <div class="form-check">
                        <input name='id[]' class="form-check-input" type="checkbox" value="<?= $speciality->getId() ?>" id="flexCheckDefault">
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

require  $_SERVER['DOCUMENT_ROOT'].'/kgb/components/footer.php';

?>