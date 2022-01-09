<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?= $planque->getCode() ?></h5>
        <p class="card-text"> <span><?= $planque->getAdress() ?></p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><?= $planque->getName_country() ?></li>
            <li class="list-group-item"><?= $planque->getName_type() ?></li>
        </ul>
        <p class="card-text"><small class="text-muted"><?= $planque->getId() ?></small></p>
    </div>
</div>

<tr>
<th scope="row"></th>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>