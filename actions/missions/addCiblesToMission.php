<?php

require  $_SERVER['DOCUMENT_ROOT'] . "/kgb/components/header.php";
require  $_SERVER['DOCUMENT_ROOT'] . "/kgb/components/loadClasses.php";



$manager = new MissionsManager();
$mission = $manager->getByCode($_GET['code_name']);

// cibles
$managerCibles = new CiblesManager();
$cibles = $managerCibles->getAll();

if ($_POST) {
    if (isset($_POST['submit'])) {
        if (!empty($_POST['target_id_uuid'])) {
            foreach ($_POST['target_id_uuid'] as $value) {
                $data = array(
                    'mission_id_uuid' => $mission->getMission_id_uuid(),
                    'target_id_uuid' => $value
                );
                $cible = new Cibles($data);
                $managerCibles->asignCiblesToMission($cible);
            }
?>
            <script>
                window.location.href = "./addAgentsToMission.php?id_mission=<?= $mission->getMission_id_uuid()?>"
            </script>
<?php
        }
    } else {
        $mission = $manager->delete($mission->getMission_id_uuid());
        echo '<script>window.location.href="../../admin.php"</script>';
    }
}

?>

<script>
    $(document).ready(function() {
        $('#checkBtn').click(function() {
            checked = $("input[type=checkbox]:checked").length;

            if (!checked) {
                alert("You must check at least one checkbox.");
                return false;
            }

        });
    });
</script>

<div class="container">
    <h2 class="text-center m-5">Ajouter votre cible à la mission <?= $mission->getCode_name() ?></h2>
    <form method="post">
        <div class="row">
            <div class="form-group col-sm-6">
                <h2>Cibles :</h2>
                <?php

                foreach ($cibles as $cible) {
                ?>
                    <div class="form-check">
                        <input name='target_id_uuid[]' class="form-check-input" type="checkbox" value="<?= $cible->getTarget_id_uuid() ?>" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <?= $cible->getLast_name()?>
                        </label>
                    </div>
                <?php
                }
                ?>
            </div>


            <div>
                <input type="submit" id="checkBtn" name="submit" value="Ajouter la cible a la Mission" class="btn btn-danger">
            </div>

            <div>
                <input type="submit" name="delete" value="Annuler la missions" class="btn btn-danger">
            </div>


        </div>
    </form>
</div>



<?php

require  $_SERVER['DOCUMENT_ROOT'] . '/kgb/components/footer.php';

?>