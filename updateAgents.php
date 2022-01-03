<?php

require './components/header.php' ;
require  "./components/loadClasses.php";


$manager = new AgentsManager();
$agent = $manager->getById($_GET['id']);

if ($_POST) {
    $agent = new Agents();
    var_dump($agent);
    $agent->hydrate($_POST);
    var_dump($_POST);
    var_dump($agent);

    $manager->update($agent);

    echo '<script>window.location.href="../kgb/index.php"</script>';
}
?>

<div class="container">
    <h2 class="text-center">Modifier l'agent <?= $agent->getIdentification_code() ?></h2>
    <form method="post">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="form-label">Nom : </label>
                <input type="text" class="form-control" id="agent_id_uuid" name="agent_id_uuid" value="<?= $agent->getAgent_id_uuid() ?>" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="form-label">Nom : </label>
                <input type="text" class="form-control" id="identification_code" name="identification_code" value="<?= $agent->getIdentification_code() ?>" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Prénom : </label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $agent->getFirst_name() ?>" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="form-label">Nom : </label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $agent->getLast_name() ?>" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Date de Naissance : </label>
                <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?= $agent->getBirth_date() ?>" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="form-label">Pays : </label>
                <input type="text" class="form-control" id="id_country" name="id_country" value="<?= $agent->getId_country() ?>" required>
            </div>

            <div class="d-grid gap-2 col-6 mx-auto">
                <input type="submit" value="Modifier l'Agent" class="btn btn-danger">
            </div>
        </div>
    </form>
</div>

<?php

require('./components/footer.php');

?>