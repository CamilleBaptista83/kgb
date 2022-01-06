<tr>
<th scope="row"><?= $cible->getTarget_id_uuid() ?></th>
<td><?= $cible->getCode_name() ?></td>
<td><?= $cible->getFirst_name() ?></td>
<td><?= $cible->getLast_name() ?></td>
<td><?= $cible->getBirth_date() ?></td>
<td><?= $cible->getName() ?></td>
<td><a href="../kgb/actions/cibles/updateCibles.php?id=<?= $cible->getTarget_id_uuid() ?>" class="btn btn-danger">Edit</a></td>
<td><a href="../kgb/actions/cibles/deleteCibles.php?id=<?= $cible->getTarget_id_uuid() ?>" class="btn btn-danger">Delete</a></td>
</tr>