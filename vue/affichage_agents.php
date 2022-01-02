<tr>
    <th scope="row"><?= $agent->getAgent_id_uuid() ?></th>
    <td><?= $agent->getIdentification_code() ?></td>
    <td><?= $agent->getFirst_name() ?></td>
    <td><?= $agent->getLast_name() ?></td>
    <td><?= $agent->getBirth_date() ?></td>
    <td><?= $agent->getName() ?></td>

    <td>
        <?php
        $manager = new SpecialityManager();

        $specialities = $manager->getSpeciality($agent->getAgent_id_uuid());

        foreach ($specialities as $speciality) {
        ?>
            <span><?= $speciality->getSpe_name() ?></span>
        <?php
        }
        ?>
    </td>

    <td><a href="../kgb/updateAgents.php?id=<?= $agent->getAgent_id_uuid() ?>" class="btn btn-danger">Edit</a></td>
    <td><a href="../kgb/deleteAgent.php?id=<?= $agent->getAgent_id_uuid() ?>" class="btn btn-danger">Delete</a></td>
</tr>