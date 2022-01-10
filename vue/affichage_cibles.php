<div class="col-6 col-sm-4 col-md-3 p-2">
    <div class="card" style="width: 18rem; height:25rem">
        <div class="card-body">
            <h5 class="card-title"><?= $cible->getCode_name() ?></h5>
            <p class="card-text"> <span><?= $cible->getLast_name() ?> </span><?= $cible->getFirst_name() ?></p>
            <p class="card-text"><?= $cible->getBirth_date() ?> </p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $cible->getName() ?></li>
            </ul>
            <p class="card-text"><small class="text-muted"><?= $cible->getTarget_id_uuid() ?></small></p>

            <a href="../actions/cibles/updateCibles.php?id=<?= $cible->getTarget_id_uuid() ?>" ><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/30/000000/external-edit-interface-kiranshastry-solid-kiranshastry-2.png"/></a>
            <a href="../actions/cibles/deleteCibles.php?id=<?= $cible->getTarget_id_uuid() ?>" ><img src="https://img.icons8.com/ios-glyphs/45/000000/filled-trash.png"/></a>

            <?php
            if (isset($_GET['id'])) {
            ?>
                <a href="../actions/agents/deleteAgents.php?id=<?= $agent->getAgent_id_uuid() ?>" class="btn btn-danger">Supprimer la cible de la mission</a>
            <?php
            }
            ?>

        </div>
    </div>
</div>