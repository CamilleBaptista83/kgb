<div class="col-6 col-sm-4 col-md-3 p-2" id="delete<?= $planque->getCode() ?>">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= $planque->getCode() ?></h5>
            <p class="card-text"><?= $planque->getAdress() ?> </p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $planque->getName_country() ?></li>
                <li class="list-group-item"><?= $planque->getName_type() ?></li>
            </ul>
            <p class="card-text"><small class="text-muted"><?= $planque->getId() ?></small></p>
        </div>
    </div>
</div>