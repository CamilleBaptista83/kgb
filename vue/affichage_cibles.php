<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?= $cible->getCode_name() ?></h5>
        <p class="card-text"> <span><?= $cible->getLast_name() ?> </span><?= $cible->getFirst_name() ?></p>
        <p class="card-text"><?= $cible->getBirth_date() ?> </p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><?= $cible->getName() ?></li>
        </ul>
        <p class="card-text"><small class="text-muted"><?= $cible->getTarget_id_uuid() ?></small></p>
    </div>
</div>