<?php

require  "../../header.php";
require  "../../loadClasses.php";


$manager = new ContactsManager();
$contact = $manager->getById($_GET['id']);

$managerContries = new CountriesManager();
$contries = $managerContries->getCountryName();

if ($_POST) {
    $contact->hydrate($_POST);
    $manager->update($contact);

    echo '<script>window.location.href="../../admin.php"</script>';
}
?>

<div class="container">
    <h2 class="text-center">Modifier le Contact <?= $contact->getCode_name() ?></h2>
    <form method="post">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="form-label">Code d'didentification : </label>
                <input type="text" class="form-control" id="code_name" name="code_name" value="<?= $contact->getCode_name() ?>" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Prénom : </label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $contact->getFirst_name() ?>" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="form-label">Nom : </label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $contact->getLast_name() ?>" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="form-label">Date de Naissance : </label>
                <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?= $contact->getBirth_date() ?>" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="form-label">Choisir un pays : </label>
                <select name='id_country' class="form-select" aria-label="Default select example">
                    <option value="<?= $contact->getId_country() ?>" selected><?= $contact->getName() ?></option>

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
                <input type="submit" value="Modifier le Contact" class="btn btn-danger">
            </div>
        </div>
    </form>
</div>

<?php

require  '../../footer.php';

?>