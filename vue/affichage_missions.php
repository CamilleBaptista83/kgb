<div class="card m-5">
    <div class="card-body">
        <h5 class="card-title"><?= $mission->getTitle() ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= $mission->getCode_name() ?></h6>
        <p class="card-text"><?= $mission->getDescription() ?></p>
        <p class="card-text"><small class="text-muted"><?= $mission->getStart() ?> - <?= $mission->getEnd() ?></small></p>
        <a href="../kgb/vue/affichage_mission_by_id.php?id=<?= $mission->getMission_id_uuid() ?>" class="btn btn-danger">En Savoir Plus</a>

    </div>
</div>