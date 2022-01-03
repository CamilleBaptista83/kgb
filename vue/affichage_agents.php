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

        $specialities = $manager->getSpecialityById($agent->getAgent_id_uuid());

        foreach ($specialities as $speciality) {
            if (!$speciality->getSpe_name()) {
        ?>
                <a href="./createAgentSpecialities.php?id=<?= $agent->getAgent_id_uuid() ?>" class="btn btn-danger">Ajouter une Spécialités</a>
            <?php
            } else {
            ?>
                <p><?= $speciality->getSpe_name() ?></p>
        <?php
            }
        }
        ?>

    </td>

    <td><a href="./updateAgents.php?id=<?= $agent->getAgent_id_uuid() ?>" class="btn btn-danger">Edit</a></td>
    <td><a href="./deleteAgents.php?id=<?= $agent->getAgent_id_uuid() ?>" class="btn btn-danger">Delete</a></td>
</tr>