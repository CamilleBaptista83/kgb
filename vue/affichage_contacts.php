<div class="col-6 col-sm-4 col-md-3 p-2" id="delete<?= $contact->getCode_name() ?>">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $contact->getCode_name() ?></h5>
            <p class="card-text"> <span><?= $contact->getLast_name() ?> </span><?= $contact->getFirst_name() ?></p>
            <p class="card-text"><?= $contact->getBirth_date() ?> </p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $contact->getName() ?></li>
            </ul>
            <p class="card-text"><small class="text-muted"><?= $contact->getContact_id_uuid() ?></small></p>

            <?php if (isset($_SESSION['last_name'])) {
            ?>

                <a href="/kgb/actions/contacts/updateContact.php?id=<?= $contact->getContact_id_uuid() ?>"><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/30/000000/external-edit-interface-kiranshastry-solid-kiranshastry-2.png" /></a>
                <a onclick="deleteAjax('<?= $contact->getContact_id_uuid(); ?>', '<?= $contact->getCode_name() ?>', '/kgb/actions/contacts/deleteContact.php')"><img src="https://img.icons8.com/ios-glyphs/30/000000/filled-trash.png" /></a>
                <?php
                if (isset($_GET['id'])) {
                ?>
                <a onclick="deleteAjaxMission('<?= $contact->getContact_id_uuid(); ?>', '<?= $contact->getCode_name() ?>', '<?= $mission->getMission_id_uuid() ?>', '/kgb/actions/contacts/deleteContactsFromMission.php')" class="btn btn-danger">Supprimer le contact de la mission</a>
            <?php
                }
            }
            ?>
            

        </div>
    </div>
</div>