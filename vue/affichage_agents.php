<div class="col-6 col-sm-4 col-md-3 p-2" id="delete<?= $agent->getIdentification_code() ?>">
    <div class="card ">
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
                } ?>
            </ul>
            <p class="card-text"><small class="text-muted"><?= $agent->getAgent_id_uuid() ?></small></p>
        </div>
    </div>
</div>