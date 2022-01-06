<tr>
<th scope="row"><?= $planque->getId() ?></th>
<td><?= $planque->getCode() ?></td>
<td><?= $planque->getAdress() ?></td>
<td><?= $planque->getName_country() ?></td>
<td><?= $planque->getName_type() ?></td>
<td><a href="../kgb/actions/planques/updatePlanques.php?id=<?= $planque->getId() ?>" class="btn btn-danger">Edit</a></td>
<td><a href="../kgb/actions/planques/deletePlanques.php?id=<?= $planque->getId() ?>" class="btn btn-danger">Delete</a></td>
</tr>