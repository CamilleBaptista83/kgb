<tr>
<th scope="row"><?= $contact->getContact_id_uuid() ?></th>
<td><?= $contact->getCode_name() ?></td>
<td><?= $contact->getFirst_name() ?></td>
<td><?= $contact->getLast_name() ?></td>
<td><?= $contact->getBirth_date() ?></td>
<td><?= $contact->getName() ?></td>
<td><a href="../kgb/actions/contacts/updateContact.php?id=<?= $contact->getContact_id_uuid() ?>" class="btn btn-danger">Edit</a></td>
<td><a href="../kgb/actions/contacts/deleteContact.php?id=<?= $contact->getContact_id_uuid() ?>" class="btn btn-danger">Delete</a></td>
</tr>