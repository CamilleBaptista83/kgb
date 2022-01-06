<tr>
    <th scope="row"><?= $mission->getMission_id_uuid() ?></th>
    <td><?= $mission->getTitle() ?></td>
    <td><?= $mission->getDescription() ?></td>
    <td><?= $mission->getCode_name() ?></td>
    <td><?= $mission->getStart() ?></td>
    <td><?php 
    if(!empty($mission->getEnd())){
        echo $mission->getEnd();
    }else{
        echo 'Non connue';
    }
     ?></td>
    <td><?= $mission->getMission_type_name() ?></td>
    <td><?= $mission->getCountry_name() ?></td>
    <td><?= $mission->getMission_statut_name() ?></td>
    <td><?= $mission->getSpeciality_name() ?></td>

    <td><a href="../kgb/actions/missions/updateMission.php?id=<?= $mission->getMission_id_uuid() ?>" class="btn btn-danger">Edit</a></td>
    <td><a href="../kgb/actions/missions/deleteMission.php?id=<?= $mission->getMission_id_uuid() ?>" class="btn btn-danger">Delete</a></td>
</tr>