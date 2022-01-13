<div class="col-6 col-sm-4 col-md-3 p-2" id="delete<?= $agent->getIdentification_code() ?>">
    <div class="card " style="width: 18rem; height:25rem">
        <div class="card-body">
            <h5 class="card-title"><?= $agent->getIdentification_code() ?></h5>
            <p class="card-text"><?= $agent->getFirst_name();
                                    echo ' ' . $agent->getLast_name() ?> </p>
            <p class="card-text"><?= $agent->getBirth_date() ?> </p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $agent->getName() ?></li>
                <?php
                $manager = new SpecialityManager();

                $specialities = $manager->getSpecialityById($agent->getAgent_id_uuid());

                foreach ($specialities as $speciality) {
                    if (!$speciality->getSpe_name()) {
                ?>
                        <li class="list-group-item">Aucune Spécialité</li>
                    <?php
                    } else {
                    ?>
                        <li class="list-group-item"><?= $speciality->getSpe_name() ?></li>
                <?php
                    }
                }
                ?>
            </ul>
            <p class="card-text"><small class="text-muted"><?= $agent->getAgent_id_uuid() ?></small></p>

            <a href="../actions/agents/updateAgents.php?id=<?= $agent->getAgent_id_uuid() ?>" ><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/30/000000/external-edit-interface-kiranshastry-solid-kiranshastry-2.png"/></a>
            <a onclick="deleteAjax('<?= $agent->getAgent_id_uuid(); ?>', '<?= $agent->getIdentification_code() ?>', '/kgb/actions/agents/deleteAgents.php')" ><img src="https://img.icons8.com/ios-glyphs/30/000000/filled-trash.png"/></a>

            <?php
            if (isset($_GET['id'])) {
            ?>
                <a onclick="deleteAjaxMission('<?= $agent->getAgent_id_uuid(); ?>', '<?= $mission->getMission_id_uuid() ?>', '/kgb/actions/agents/deleteAgentsFromMission.php')" class="btn btn-danger">Supprimer l'agent de la mission</a>
            <?php
            }
            ?>

        </div>
    </div>
</div>