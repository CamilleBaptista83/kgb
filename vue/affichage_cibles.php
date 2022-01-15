<div class="col-6 col-sm-4 col-md-3 p-2" id="delete<?= $cible->getCode_name() ?>">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= $cible->getCode_name() ?></h5>
            <p class="card-text"> <span><?= $cible->getLast_name() ?> </span><?= $cible->getFirst_name() ?></p>
            <p class="card-text"><?= $cible->getBirth_date() ?> </p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $cible->getName() ?></li>
            </ul>
            <p class="card-text"><small class="text-muted"><?= $cible->getTarget_id_uuid() ?></small></p>

            <div class="actions">
                <a href="../actions/cibles/updateCibles.php?id=<?= $cible->getTarget_id_uuid() ?>"><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/30/000000/external-edit-interface-kiranshastry-solid-kiranshastry-2.png" /></a>
                <a onclick="deleteAjax('<?= $cible->getTarget_id_uuid(); ?>', '<?= $cible->getCode_name() ?>', '../actions/cibles/deleteCibles.php')"><img src="https://img.icons8.com/ios-glyphs/30/000000/filled-trash.png" /></a>
            </div>
        </div>
    </div>
</div>