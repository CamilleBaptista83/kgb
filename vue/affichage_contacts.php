<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?= $contact->getCode_name() ?></h5>
        <p class="card-text"> <span><?= $contact->getLast_name() ?> </span><?= $contact->getFirst_name() ?></p>
        <p class="card-text"><?= $contact->getBirth_date() ?> </p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><?= $contact->getName() ?></li>
        </ul>
        <p class="card-text"><small class="text-muted"><?= $contact->getContact_id_uuid() ?></small></p>
    </div>
</div>