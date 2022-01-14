<div class="col-6 col-sm-4 col-md-3 p-2" id="delete<?= $planque->getCode() ?>">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $planque->getCode() ?></h5>
            <p class="card-text"><?= $planque->getAdress() ?> </p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $planque->getName_country() ?></li>
                <li class="list-group-item"><?= $planque->getName_type() ?></li>
            </ul>
            <p class="card-text"><small class="text-muted"><?= $planque->getId() ?></small></p>

            <?php if (isset($_SESSION['last_name'])) {
            ?>

                <a href="/kgb/actions/planques/updatePlanques.php?id=<?= $planque->getId() ?>"><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/30/000000/external-edit-interface-kiranshastry-solid-kiranshastry-2.png" /></a>
                <a onclick="deleteAjax('<?= $planque->getId(); ?>', '<?= $planque->getCode() ?>', '/kgb/actions/planques/deletePlanques.php')"><img src="https://img.icons8.com/ios-glyphs/30/000000/filled-trash.png" /></a>
                <?php
                if (isset($_GET['id'])) {
                ?>
                    <a href="../actions/agents/deleteAgents.php?id=<?= $agent->getAgent_id_uuid() ?>" class="btn btn-danger">Supprimer le contact de la mission</a>
            <?php
                }
            }
            ?>

        </div>
    </div>
</div>