<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>

        <?php
        while ($donnees = $agent->fetch()) {
        ?>

            <tr>
                <th scope="row"><?= htmlspecialchars($donnees['agent_id_uuid']) ?></th>
                <td><?= $donnees['identification_code']; ?></td>
                <td><?= $donnees['first_name']; ?></td>
                <td><?= $donnees['last_name']; ?></td>
                <td><?= $donnees['birth_date']; ?></td>
                <td><?= $donnees['name']; ?></td>
            </tr>

        <?php
        } // Fin de la boucle des billets
        $admin->closeCursor();
        ?>
    </tbody>
</table>